<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notice;
use App\Rate;
use App\ReferralWithdraw;
use App\Testimonial;
use App\Transection;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Storage;
use TCG\Voyager\Voyager;
use Mail;

class ClientController extends BaseController
{

    public function dashboard()
    {

        $notice = Notice::where('type', 'Client')->where('status', 2)->orderBy('created_at', 'desc')->first();
        $rates = Rate::where('is_active', 1)->orderBy('curency_name', 'asc')->get();
        return view('client.dashboard', compact('rates','notice','trans'));
    }

    public function buy()
    {
        $notice = Notice::where('type', 'buy')->where('status', 2)->orderBy('created_at', 'desc')->first();
        $rates = Rate::where('is_active', 1)->where('reserved','>', 0)->where('sell','!=', 0)->orderBy('curency_name', 'asc')->get();
        $sends = Rate::where('is_active', 1)->where('buy','=', 0)->where('sell','=', 0)->orderBy('curency_name', 'asc')->get();
        $rates_info = Rate::where('is_active', 1)->orderBy('curency_name', 'asc')->get();
        return view('client.buy', compact('notice', 'rates','sends','rates_info'));
    }

    public function sell()
    {
        $notice = Notice::where('type', 'sell')->where('status', 2)->orderBy('created_at', 'desc')->first();
        $rates = Rate::where('is_active', 1)->where('buy','!=', 0)->orderBy('curency_name', 'asc')->get();
        $receives = Rate::where('is_active', 1)->where('buy','=', 0)->where('sell','=', 0)->orderBy('curency_name', 'asc')->get();
        $rates_info = Rate::where('is_active', 1)->orderBy('curency_name', 'asc')->get();
        return view('client.sell', compact('notice', 'rates', 'receives','rates_info'));
    }

    public function exchange(Request $request)
    {
        try{

        
            $notice = Notice::where('type', 'exchange')->where('status', 2)->orderBy('created_at', 'desc')->first();
            // send 

            $sends = DB::table('currencies')->join('rates','rates.id','=','currencies.from_rate_id')
                    ->select('rates.id','rates.curency_name','rates.sell','rates.buy','rates.reserved')
                    ->where('reserved','>', 0)
                    ->where('is_active',1)
                    ->orderBy('curency_name', 'asc')
                    ->groupBy('currencies.from_rate_id')
                    ->get();

            $receives = $sends;

            // $receives = Rate::where('is_active', 1)->where('reserved','>', 0)
            // // ->where('buy','!=', 0)->where('sell','!=', 0)
            // ->orderBy('curency_name', 'asc')->get();
            $rates_info = Rate::where('is_active', 1)->orderBy('curency_name', 'asc')->get();

            $exchange_rates = DB::table('currencies')->get();

            return view('client.exchange', compact('notice', 'sends','receives','rates_info','exchange_rates'));

        }catch(\Exception $e){
            dd($e);
        }
    }

    /*
    * exchangeReceiverAjax
    */
    public function exchangeReceiverAjax(Request $request)
    {
        try{

       
        # code..
            $send_rate_id = $request->send_rate_id;

            $currencies = DB::table('currencies')->join('rates','rates.id','=','currencies.to_rate_id')
                ->select('rates.curency_name','rates.id','rates.reserved'
                ,'currencies.rate_value'
                ,'currencies.from_rate_id'
                ,'currencies.to_rate_id'
                )
                ->where('rates.reserved','>',0)
            ->where('from_rate_id',$send_rate_id)->get();

            return response()->json(['error'=>false,'currencies'=>$currencies]);
         }catch(\Exception $e) {

        }
    }

    public function exchangeTransection(Request $request)
    {
        try {
            $flag=0;
            $flag=$request->buy_status;

            $cash_in_reserved = Rate::find($request->cash_in);
            $cash_out_reserved = Rate::find($request->cash_out);

            $receive_ammount_hash = md5($request->received_amount);

            if ($receive_ammount_hash == $request->rsm) {

                $item = new Transection();

                if (isset($item)) {
                    DB::beginTransaction();
                    $item->user_id = Auth::user()->id;
                    $item->send = $request->send;

                    if($flag==1)
                    {
                        $item->send_amount = $request->received_amount;
                        $item->received_amount = $request->send_amount;

                        $cash_in_reserved->reserved = $cash_in_reserved->reserved + $request->received_amount;
                        $cash_out_reserved->reserved = $cash_out_reserved->reserved - $request->send_amount;
                    }
                    else
                    {
                        $item->send_amount = $request->send_amount;
                        $item->received_amount = $request->received_amount;

                        $cash_in_reserved->reserved = $cash_in_reserved->reserved + $request->send_amount;
                        $cash_out_reserved->reserved = $cash_out_reserved->reserved - $request->received_amount;


                    }

                    $item->sending_account = $request->sending_account_no;
                    $item->received = $request->received;
                    $item->account_no = $request->account_no;
                    $item->trans_id = $request->trx_id;

                    $item->status = 1;
                    $item->save();

                    $cash_in_reserved->save();
                    $cash_out_reserved->save();

                    DB::commit();
                }

                $name = Auth::user()->name;
                $email = Auth::user()->email;
                $subject = 'Transation Complete Confirmation';
                $content = $item;

                $data = ['name' => $name, 'email' => $email, 'subject' => $subject, 'content' => $content];

                Mail::send('email.email-transation', $data, function ($message) use ($subject,$email) {
                    $message->to($email)->subject($subject);
                });

                return redirect()->back()->with('success', 'Submit Successfully.');
            } else
                return redirect()->back()->with('error', 'Invalid.');

        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('warning', 'Something went wrong, Please try again.');
        }
    }

    public function transection(Request $request)
    {
        try {

            $flag=0;
            $flag=$request->buy_status;

            $cash_in_reserved = Rate::find($request->cash_in);
            $cash_out_reserved = Rate::find($request->cash_out);

            $receive_ammount_hash = md5($request->received_amount);

            if ($receive_ammount_hash == $request->rsm) {

                $item = new Transection();

                if (isset($item)) {
                    DB::beginTransaction();
                    $item->user_id = Auth::user()->id;
                    $item->send = $request->send;

                    if($flag==1)
                    {
                        $item->send_amount = $request->received_amount;
                        $item->received_amount = $request->send_amount;

                        $cash_in_reserved->reserved = $cash_in_reserved->reserved + $request->received_amount;
                        $cash_out_reserved->reserved = $cash_out_reserved->reserved - $request->send_amount;
                    }
                    else
                    {
                        $item->send_amount = $request->send_amount;
                        $item->received_amount = $request->received_amount;

                        $cash_in_reserved->reserved = $cash_in_reserved->reserved + $request->send_amount;
                        $cash_out_reserved->reserved = $cash_out_reserved->reserved - $request->received_amount;


                    }

                    $item->sending_account = $request->sending_account_no;
                    $item->received = $request->received;
                    $item->account_no = $request->account_no;
                    $item->trans_id = $request->trx_id;

                    $item->status = 1;
                    $item->save();

                    $cash_in_reserved->save();
                    $cash_out_reserved->save();

                    DB::commit();
                }
                return redirect()->back()->with('success', 'Submit Successfully.');
            } else
                return redirect()->back()->with('error', 'Invalid.');

        } catch (\Exception $e) {

            return redirect()->back()->with('warning', 'Something went wrong, Please try again.');
        }
    }


    public function history()
    {
        $trans = Transection::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('client.history', compact('trans'));
    }

    public function referral()
    {
        $referrals = User::where('referred_by', Auth::user()->affiliate_id)->where('is_verified', 'Yes')->orderBy('created_at', 'desc')->paginate(10);
        return view('client.referral', compact('referrals'));
    }

    public function messages()
    {
        $inbox_messages = Message::where('to', Auth::user()->id)
            ->orderBy('created_at', 'desc')->paginate(10);
        $sent_messages = Message::where('from', Auth::user()->id)
            ->orderBy('created_at', 'desc')->paginate(10);
        return view('client.messages', compact('inbox_messages', 'sent_messages'));
    }


    public function settings()
    {
        $profile_info = User::where('id', Auth::user()->id)->firstOrfail();

        return view('client.settings', compact('profile_info'));
    }

    public function signOut()
    {
        return view('public.index');
    }

    public function userInfoUpdate(Request $request)
    {

        try {
            $item = new User();
            if (!empty($request->id)) {
                $item = User::find($request->id);
            }
            if (isset($item)) {
                DB::beginTransaction();
                $item->name = $request->name;
                $item->address = $request->address;
                $item->mobile_1 = $request->mobile_1;
                $item->mobile_2 = $request->mobile_2;
                $item->city = $request->city;
                $item->gender = $request->gender;
                $item->nid = $request->nid;
                $item->email = $request->email;

                $nid_first_page = $request->file('nid_first_page');
                $nid_second_page = $request->file('nid_second_page');
                $avatar = $request->file('avatar');


                if (!empty($nid_first_page)) {

                    $path = 'users' . '/' . date('F') . date('Y');
                    $image_upload = Storage::disk(config('voyager.storage.disk'))->put($path, $nid_first_page);
//                        $image_upload = Storage::putFile('/public/users', $nid_first_page);

                    $item->nid_first_page = $image_upload;

                }

                if (!empty($nid_second_page)) {

                    $path = 'users' . '/' . date('F') . date('Y');
                    $image_upload = Storage::disk(config('voyager.storage.disk'))->put($path, $nid_second_page);

                    $item->nid_second_page = $image_upload;

                }

                if (!empty($avatar)) {

                    $path = 'users' . '/' . date('F') . date('Y');
                    $image_upload = Storage::disk(config('voyager.storage.disk'))->put($path, $avatar);

                    $item->avatar = $image_upload;

                }


                if (!empty($request->new_pass)) {
                    $item->password = bcrypt($request->new_pass);
                }

                if (!empty($nid_first_page) && !empty($nid_second_page)) {
                    $item->is_verified = 'Submitted';
                }

                $item->save();
                DB::commit();
            }
            return redirect()->back()->with('success', 'Save Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('warning', 'Something went wrong, Please try again.');
        }

    }


    public function sendMessage(Request $request)
    {
        try {
            $item = new Message();
            if (isset($item)) {
                DB::beginTransaction();
                $item->name = Auth::user()->name;
                $item->email = Auth::user()->email;

                $item->title = strip_tags($request->msg_title);
                $item->details = strip_tags($request->msg_details);

                $item->status = 'Unread';
                $item->from = Auth::user()->id;
                $item->save();
                DB::commit();
            }
            return redirect()->back()->with('success', 'Message send Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('warning', 'Something went wrong, Please try again.');
        }
    }

    public function messageShow(Request $request)
    {

        $message = Message::findorfail(Crypt::decrypt($request->message_id));

        if ($message->status = "Unread") {
            $message->status = "Read";
            $message->save();
        }

        return response()->json(['data_message' => $message]);
    }


    public function deleteMessage($id)
    {
        try {
            $item = Message::findOrFail($id);
            $item->delete();
            return redirect()->back()->with('success', 'Delete Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'Something went wrong, Please try again.');
        }
    }

    public function giveReview(Request $request)
    {
        try {

            $item = new Testimonial();

            if (!empty($request->id)) {
                $transection_item = Transection::findOrFail($request->id);
            }

            if (isset($item) && isset($transection_item)) {
                DB::beginTransaction();
                $item->client_name = Auth::user()->name;
                $item->image = Auth::user()->avatar;
                $item->title = strip_tags($request->review_title);
                $item->details = strip_tags($request->review_details);
                $item->transection_id = $request->id;
                $item->save();

                $transection_item->is_reviewed = 1;
                $transection_item->save();
                DB::commit();
            }
            return redirect()->back()->with('success', 'Review submit Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('warning', 'Something went wrong, Please try again.');
        }
    }


    public function referralWithdraw(Request $request)
    {
        try {

            $item = new ReferralWithdraw();

            if (!empty(Auth::user()->id)) {
                $user_item = User::findOrFail(Auth::user()->id);
            }

            if (isset($item) && isset($user_item)) {

                $withdraw_amount = $request->withdraw;
                $current_amount = $request->total;

                if ($withdraw_amount >= 1 && $withdraw_amount <= $current_amount) {
                    DB::beginTransaction();
                    $item->user_id = Auth::user()->id;
                    $item->withdraw = $request->withdraw;
                    $item->payment_method = $request->payment_method;
                    $item->account_no = $request->account_no;
                    $item->save();


                    $user_item->current_referral_amount = $current_amount - $withdraw_amount;
                    $user_item->save();

                    DB::commit();

                    return redirect()->back()->with('success', 'Request submit Successfully.');
                }

                return redirect()->back()->with('warning', 'Invalid Input.');
            }


        } catch (\Exception $e) {

            return redirect()->back()->with('warning', 'Something went wrong, Please try again.');
        }
    }
}
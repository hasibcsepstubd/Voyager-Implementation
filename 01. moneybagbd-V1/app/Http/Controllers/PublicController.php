<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Home;
use App\Message;
use App\Notice;
use App\Rate;
use App\Testimonial;
use App\Transection;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Mail;

class PublicController extends BaseController
{

    public function home()
    {
        // Database caching
//        $homes_info = Cache::remember('homes_info', 5, function () {
//            return DB::table('homes')->get();
//        });

//        Artisan::call("storage:link");

        $homes_info = Home::all();
        $rates = Rate::where('is_active',1)->orderBy('curency_name', 'asc')->get();
        $notices = Notice::where('type', 1)->where('status', 2)->orderBy('created_at', 'desc')->take(10)->get();
        $admin_notice = Notice::where('type', 2)->where('status', 2)->orderBy('created_at', 'desc')->first();
        $reviews = Testimonial::where('status', 2)->orderBy('created_at', 'desc')->take(10)->get();
        $faqs = Faq::where('status', 2)->get();

        return view('public.index', compact('notices', 'faqs', 'homes_info', 'rates', 'reviews', 'admin_notice'));
    }

    public function paymentProof()
    {
        $trans = Transection::orderBy('created_at', 'desc')->orderBy('status', 'asc')->limit(30)->get();

        return view('public.payment-proof', compact('trans'));
    }

    public function signIn()
    {
        return view('public.sign-in');
    }

    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function signUp(Request $request)
    {
        return view('auth.register');

    }

    public function forgetPassword(Request $request)
    {
        return view('public.forget-password');
    }

    public function resetPassword(Request $request)
    {
        return view('public.reset-password');
    }


    public function sendMessage(Request $request)
    {

        try {

            $name = $request->name;
            $email = $request->email;
            $subject = $request->subject;
            $content = $request->comment;


            Mail::send('email.email-send', ['name' => $name, 'email' => $email, 'subject' => $subject, 'content' => $content], function ($message) use ($subject) {
                $message->to('support@moneybagbd.com')->subject($subject);
            });

            return redirect()->back()->with('success', 'Message send Successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->with('warning', 'Something went wrong, Please try again.');
        }
    }


}
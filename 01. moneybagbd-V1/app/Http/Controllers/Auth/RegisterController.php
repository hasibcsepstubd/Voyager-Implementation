<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;  // change is maded to "registered" method by me

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
//            'referral_code' => 'required|number|max:11',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try {
            $confirmation_code = str_random(30);

            $email = $data['email'];

            Mail::send('email.email-verification', ['confirmation_code' => $confirmation_code], function ($message) use ($email) {
                $message->to($email)->subject('Confirm your email address');
            });

           return  User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'referred_by' => $data['referred_by'],
                'password' => bcrypt($data['password']),
                'affiliate_id' => str_random(6),
                'confirmation_code' => $confirmation_code,
            ]);


        } catch (\Exception $e) {

            return redirect()->back()->with('warning', 'Something went wrong, Please try again.');
        }

    }

    public function confirmUser($confirmation_code)
    {
        if (!$confirmation_code) {
            return redirect('/')->with('warning', 'Invalid Confirmation Code.');
        }

        $user = User::where('confirmation_code', $confirmation_code)->first();


        if (!$user) {
            return redirect('/')->with('warning', 'Your token is invalid');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

//        Flash::message('You have successfully verified your account.');

        return redirect('/public/login')->with('success', 'You have successfully verified your account.');
    }
}

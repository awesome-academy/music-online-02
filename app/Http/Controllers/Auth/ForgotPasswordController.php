<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Mail;
use App\Http\Requests\RequestResetPass;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getResetPass(){
        return view('auth.passwords.email');
    }

    public function postResetPass(Request $request){
        $email = $request->email;
        $checkUser = User::where('email', $email)->first();
        
        if (!$checkUser) {
            return redirect('forgot-pass')->with('notify', __('label.notify_mail_not_exist'));
        }

        $code = bcrypt(time().$email);
        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();
        $url = route('reset.pass', [
            'code' => $checkUser->code, 
            'email' => $email,
        ]);

        $data = [
            'route' => $url,
        ];
        
        Mail::send('email.reset_pass', $data, function($message) use ($email){
            $message->to($email, 'Reset password')->subject('Reset Password');
        });
       
        return redirect()->back()->with('notify', __('label.notify_sent_link'));
    }

    public function resetPass(){

        return view('auth.passwords.reset');
    }

    public function saveResetPass(RequestResetPass $req){
        $code = $req->code;
        $email = $req->email;
        $checkUser = User::where([
            'code' => $code,
            'email' => $email,
        ])->first();
        $checkUser->password = bcrypt($req->password);
        $checkUser->save();

        return redirect()->route('login')->with('notify', __('label.notify_change_pass_success'));
    }
}

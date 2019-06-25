<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $request->session()->put('username', $request->name);
            $data = User::where('name', $request->name)->get();
            session()->put('avatar', $data[0]->image);
            session()->put('user_id', $data[0]->id);
            session()->put('name', $request->name);
            session()->put('role_id', $data[0]->role_id);
            session()->put('info_user', $data);

            return redirect('/');
        } else {
            return redirect('login')->with('notify', 'Login failed');
        }
    }    
}

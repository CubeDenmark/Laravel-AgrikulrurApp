<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $input = $request->all();
       
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $users = User::where($this->username(), $request->email)->where('status', '1')->first();
        
        if ($users)
        {
            $this->guard()->attempt(
            $this->credentials($request), $request->boolean('remember'));

            if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
                {
                    if (auth()->user()->type == 'farmer') 
                    {
                        return redirect()->route('farmer.home');

                    }
                    else if (auth()->user()->type == 'bidder')
                    {
                        return redirect()->route('bidder.home');
                    }
                    else
                    {
                        return redirect()->route('admin.home');
                    }
                }else{
                    return redirect()->route('login')
                        ->with('error','Email-Address And Password Are Wrong.');
                }
        }
        else
        {
            return back()->with('error','No record found');
        }
                
            
    }
}
/*
//this is the login logic
        $users = User::where($this->username(), $request->email)->where('status', '1')->first();
     
            if($users) 
            {
                return $this->guard()->attempt(
                    $this->credentials($request), $request->boolean('remember')
                );
            }
            */
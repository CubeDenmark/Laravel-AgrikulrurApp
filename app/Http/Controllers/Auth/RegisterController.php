<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /*$data()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:11|unique:users',
            'user_type' => 'required|string|max:2',
            'password' => 'required|string|min:8|confirmed',

            'valImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'userProfile' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);*/
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:11'],
            //'user_type' => ['required', 'string', 'max:2'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'valImage' => ['required','image','mimes:jpeg,jpg,png,gif,svg','max:2048'],
            'userProfile' => ['required','image','mimes:jpeg,jpg,png,gif,svg','max:2048'],
        ]);
        
    }

    /*public function image_upload(Request $request)
    {
        $request->validate([
            'valImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'userProfile' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $valImage = 'valUser'.'.'.$request->valImage->extension();
        $userProfile = 'userProfile'.'.'.$request->userProfile->extension();

        $request->valImage->move(public_path('images'), $valImage);
        $request->userProfile->move(public_path('images/profiles'), $userProfile);

        /*return redirect()->back()->withSuccess('Upload image successful')
        ->with('valImage', $valImage)->with('userProfile', $userProfile);*
    }*/




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $valImage = 'valUser'.$data['name'].'.'.$data['valImage']->extension();
        $userProfile = 'userProfile'.$data['name'].'.'.$data['userProfile']->extension();

        $data['valImage']->move(public_path('images'), $valImage);
        $data['userProfile']->move(public_path('images/profiles'), $userProfile);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            //'user_type' => $data['user_type'],
            'status' => '0',
            'val_img' => $valImage,
            'profile_img' => $userProfile,
        ]);

       

        //return response()->json($data);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\image;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Services\ValidationService;
use Illuminate\Validation\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update_profile_image(Request $request)
    {
        if($request->hasFile("update_image"))
        {
            $request->validate([
                'update_image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:10240',
            ]);

            $userid = Auth::user()->id;
    
            $userProfileUpdate = 'userProfile'.$userid.'.'.$request['update_image']->extension();
    
            $request->update_image->move(public_path('images/profiles'), $userProfileUpdate);
            User::where('id', $userid)->update(['profile_img' => $userProfileUpdate]);
    
            return redirect()->back()->withSuccess('Upload image successful')
            ->with('userProfile', $userProfileUpdate);
        }
        else
        {
            return redirect()->back()->with('failed', 'Please provide an Image');
        }
        
    }












//Testing functions

    public function view_image(): View
    {
        return view('sampleImg');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function image_upload(Request $request)
    {
        $request->validate([
            'valImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'userProfile' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $valImage = 'valUser'.'.'.$request->valImage->extension();
        $userProfile = 'userProfile'.'.'.$request->userProfile->extension();

        $request->valImage->move(public_path('images'), $valImage);
        $request->userProfile->move(public_path('images/profiles'), $userProfile);

        return redirect()->back()->withSuccess('Upload image successful')
        ->with('valImage', $valImage)->with('userProfile', $userProfile);
    }

}

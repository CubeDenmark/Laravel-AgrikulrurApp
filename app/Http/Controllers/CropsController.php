<?php

namespace App\Http\Controllers;

use App\Models\crops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CropsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addcrop()
    {
        return view('add_crop');
    }
    public function newCrop(Request $request)
    {
        if($request->hasFile("crop_image"))
        {
            $request->validate([
                'crop_image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            $crop_name = $request->crop_name;
            $suggested_price = $request->suggested_price;
            $user = Auth::user();

            
    
            $cropImgLoc = 'crop_'.$crop_name.'.'.$request['crop_image']->extension();
    
            $request->crop_image->move(public_path('images/crops'), $cropImgLoc);

            $new_auction = crops::create([
                'crop_name' => $crop_name,
                'suggested_price' => $suggested_price,
                'user_id' => $user['id'],
                'crop_image' => $cropImgLoc,
                
            ]);

            return redirect()->back()->withSuccess('Upload image successful')
            ->with('success', 'Added new Crop '.$crop_name);
        }
        else
        {
            return redirect()->back()->with('failed', 'Please provide an Image');;
        }

    }
}

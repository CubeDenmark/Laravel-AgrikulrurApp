<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Models\crops;
use App\Models\User;
use Illuminate\Http\Request;

class AdminContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view("admin");
    }
    public function manageAuctions()
    {
        //select all action and view them
        $auctions = auctions::all();

        return view("manageAuctions", compact("auctions"));
    }
    public function rmAuction(Request $request)
    {
        //remove the auction
        $rmAuctions = auctions::where("auction_id", $request->auction_id)->delete();

        return redirect()->back()->with("success","Auction deleted");
    }
    public function manageUsers(Request $request)
    {
        $theseUsers = User::where('user_type', '2')->orWhere('user_type', '3')->get(); 
        $users = array();
        foreach ($theseUsers as $user) 
        {
            if($user->status == '1' && ($user->user_type == '2' || $user->user_type == '3'))
            {
                $users[] = $user;
            }
            //$user->delete();
        }

        return view("manageUsers", compact("users"));
    }
    public function banUser(Request $request)
    {
        //when admin banned the User, it will bring back the user status to 0 on the database
        // it can then be activated again on the Activate user page
        $banUser = User::where("id", $request->id)->update(['status' => '0']);

        return redirect()->back()->with("success","Banned User");
    }
    public function activateUsers(Request $request)
    {
        $theseUsers = User::where('user_type', '2')->orWhere('user_type', '3')->get(); 
        $users = array();
        foreach ($theseUsers as $user) 
        {
            if($user->status == '0' && ($user->user_type == '2' || $user->user_type == '3'))
            {
                $users[] = $user;
            }
            //$user->delete();
        }

        return view("activateUser", compact("users"))->with("success","User activated");
    }
    public function activate(Request $request)
    {
        //when the admin activate the user it will change the user status to 1 on the database
        $activateUser = User::where("id", $request->id)->update(['status' => '1']);

        return redirect()->back()->with("success","User Activated");
    }
    public function rejectUser(Request $request)
    {
        //when the admin rejects the request, the data will be delete on the database 
        //so that user can resubmit request
        $deleteUser = User::where("id", $request->id)->delete();

        return redirect()->back()->with("success","User rejection");
    }
    public function updateGuidelines()
    {
        $crops = crops::all();
        return view("updateGuidelines", compact("crops"))->with("success","all crops");
    }
    public function updatePriceForm()
    {
        $crops = crops::all();
        return view("updatePriceForm", compact("crops"))->with("success","all crops");
    }
    public function updatePrice(Request $request)
    {
        $i = 0;
        while ($i <= count($_REQUEST))
        {
            crops::where('crop_id', $i)
            ->update(['suggested_price' => $request->input($i)]);
            $i++;
        }

        // crops::where('id', Auth::user()->id)
        // ->update(['name' => $fname, 'email' => $email, 'phone' => $phone]);

        return back()->with('success', 'Updated successfully');

    }
    
}

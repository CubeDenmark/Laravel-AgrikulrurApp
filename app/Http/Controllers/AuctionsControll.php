<?php

namespace App\Http\Controllers;

use App\Events\end_auction;
use App\Events\notifier;
use App\Models\bids;
use App\Models\consNotif;
use App\Models\farmerNotif;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\auctions;
use App\Models\crops;
use App\Models\pending_transactions;
use App\Models\notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuctionsControll extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create_auction()
    {
        $crops = crops::all();

        return view('createauction', compact('crops'));
    }
    public function newAuction(Request $request)
    {
        if($request->hasFile("auction_cropImg"))
        {
            $request->validate([
                'crop_id' => 'required',
                'input_price' => 'required',
                'input_volume' => 'required',
                'auction_cropImg' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            $crop_id = $request->crop_id;
            $starting_price = $request->input_price;
            $crop_volume = $request->input_volume;
            $user = Auth::user();
            $dateNow = time();
    
            $cropImgLoc = 'auction_'.$dateNow.'_'.$crop_id.'.'.$request['auction_cropImg']->extension();
    
            $request->auction_cropImg->move(public_path('images/auctions'), $cropImgLoc);

            $new_auction = auctions::create([
                'crop_id' => $crop_id,
                'starting_price' => $starting_price,
                'crop_volume' => $crop_volume,
                'user_id' => $user['id'],
                'status' => 'active',
                'end_time' => Carbon::now()->addHours(6),
                'auctionCropImage' => $cropImgLoc,
            ]);

            return redirect()->back()->withSuccess('Upload image successful')
            ->with('success', 'New Auction has been added');
        }
        else
        {
            return redirect()->back()->with('failed', 'Please provide an Image for the Auction');;
        }

    }


    public function auctions(Request $request)
    {
        $type = $request->input('type');

        $cropName = crops::select('crop_name')
        ->where('crop_id', $type)
        ->first();

        $auctionData = auctions::select(
            'auctions.auction_id',
            'auctions.crop_id',
            'auctions.crop_volume',
            'auctions.starting_price',
            'users.name as user_id',
            'auctions.auctionCropImage',
            DB::raw('COALESCE(MAX(bids.bid_amount), auctions.starting_price) as latest_bid_price')
        )
            ->join('users', 'auctions.user_id', '=', 'users.id')
            ->leftJoin('bids', 'auctions.auction_id', '=', 'bids.auction_id')
            ->where('auctions.crop_id', $type)
            ->groupBy('auctions.auction_id', 'auctions.crop_id', 'auctions.crop_volume', 'auctions.starting_price', 'users.name', 'auctions.auctionCropImage')
            ->get();

            return view('auctionpage', compact('auctionData', 'cropName'));
        //return response()->json($arr[0]->bid_amount);
        //return response()->json($arr[0]->bid_amount);
    }
    public function guidelines()
    {
        //$cropinfo = crops::all();
        return view('guideFromDA'); //, compact('cropinfo')
    }
    public function notifications()
    {
  
       
        if(Auth::user()->type == "farmer")
        {
            $toThisUser = Auth::user()->id;
            $notif = farmerNotif::where('creator_id', $toThisUser)->get();
            $farmer_conpay = pending_transactions::where('creator_id', $toThisUser)->where('creator_status', 'not_paid')->get();
        
                return view('notifications', compact('notif', 'farmer_conpay'))->with('noti', 'autions fetched!');

        }
        if(Auth::user()->type == "bidder")
        {
            $toThisUser = Auth::user()->id;
            $notif = consNotif::where('bidder_id', $toThisUser)->get();
            $consumer_conpay = pending_transactions::where('bidder_id', $toThisUser)->where('creator_status', 'paid')->get();
            
                return view('notifications', compact('notif', 'consumer_conpay'))->with('noti', 'autions fetched!');
    
        }
   
    }
    public function congratulation(Request $request)
    {
        //$user = $request->input('id');
        $auction_id = $request->input('auction_id');
        return view('congratulation', compact('auction_id'));
    }
    public function checkout(Request $request)
    {
        $auction_id = $request->input('auction_id');
        $auctions = auctions::where('auction_id', $auction_id)->get();
        foreach($auctions as $auction)
        {
            $creator = $auction->user_id;
            $cropname = $auction->crop_id;
            $users = User::where('id', $creator)->get();
            $crops = crops::where('crop_id', $cropname)->get();
            $highestbid = bids::where('auction_id', $auction->auction_id)->get('bid_amount')->max();
            $volume =  $auction->crop_volume;
            $highest = $highestbid->bid_amount;
            $total = $highest * $volume;

            return view('checkout', compact('auctions', 'users', 'crops', 'total'));
        }
        
    }
    public function confirm_payment(Request $request)
    {
        $auction_id = $request->input('auction_id');
        $auctions = auctions::where('auction_id', $auction_id)->get();
        foreach($auctions as $auction)
        {
            $creator = $auction->user_id;
            $cropname = $auction->crop_id;
            $users = User::where('id', $creator)->get();
            $crops = crops::where('crop_id', $cropname)->get();
            $highestbid = bids::where('auction_id', $auction->auction_id)->get('bid_amount')->max();
            $volume =  $auction->crop_volume;
            $highest = $highestbid->bid_amount;
            $total = $highest * $volume;

            return view('ConfirmPayment', compact('auctions', 'users', 'crops', 'total'));
        }
        
    }
    public function bidder_payment(Request $request)
    {
        $auction_id = $request->input('auction_id');
        $auctions = auctions::where('auction_id', $auction_id)->get();
        foreach($auctions as $auction)
        {
            $creator = $auction->user_id;
            $auction = $auction->auction_id;
            //$winner_bid = bids::where('auction_id', $auction_id)->where(max('bid_amount'))->get('user_id');
            //$bidder = $winner_bid->user_id;
            $bidder = Auth::user()->id;
            $users = User::where('id', $creator)->get();

            $pend_payment = pending_transactions::create([
                'auction_id' => $auction_id,
                'creator_id' => $creator,
                'bidder_id' => $bidder,
                'creator_status' => 'not_paid',
                'bidder_status' => 'paid',
                'status' => 'pending',
            ]);
            $consumer_conpay = pending_transactions::where('bidder_id', Auth::user()->id)->where('creator_status', 'paid')->get();
            $notif = consNotif::where('bidder_id', Auth::user()->id)->get();

            return view('notifications', compact('notif', 'consumer_conpay'));
        }
        
    }
    public function checkout_farmer(Request $request)
    {
        $creator = Auth::user()->id;
        $auction = $request->input('auction_id');
        $winner = pending_transactions::where('auction_id', $auction)->first('bidder_id');
        pending_transactions::where('creator_id', $creator)->where('auction_id', $auction)
        ->update(['creator_status' => 'paid', 'status' => 'completed']);
        
        
        $users = User::where('id', $winner->bidder_id)->get();
        
        return view('cong_farmer', compact('users'));
    }
    public function finished(Request $request)
    {
        $auction = $request->input('auction_id');
        $farmer = pending_transactions::where('auction_id', $auction)->first('creator_id');
        $users = User::where('id', $farmer->creator_id)->get();
        
        return view('finish', compact('users'));
    }
    public function update_info(Request $request)
    {
        /*$request->validate([
            'fname'=>'required|unique:User',
            //'lname'=>'required|unique:User',
            'email'=>'required|email|unique:User',
            'phonenum'=>'required|min:11|max:11',
            //'address'=>'required'
        ]);*/
        //dd($request->all());
        $fname = $request->input('fname');
        $email = $request->input('email');
        $phone = $request->input('phone');

        User::where('id', Auth::user()->id)
        ->update(['name' => $fname, 'email' => $email, 'phone' => $phone]);

        return back()->with('success', 'Updated successfully');

        /*$user = new User();
        $user->fname = $request->input('fname');
        //$user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->phonenum = $request->input('phone');
        //$user->address = $request->address;
        $res = $user->save();
        if($res){
            return back()->with('success', 'Update successfully');
        }else{
            return back()->with('failed', 'Failed to Update T-T. Something went wrong');
        }*/
    }

    
    public function manual_close(Request $request)
    {
        $thisAuction_id = $request->input('auction_id');
        $openAuctions = auctions::where('auction_id', $thisAuction_id)->first();
        $close_auction = auctions::where('auction_id', $thisAuction_id)->update(['status' => 'closed']);
        
        $thesebids = bids::where('auction_id', $thisAuction_id)->get();
            
            foreach($thesebids as $bid)
            {
                $auction_id = $openAuctions->auction_id;
                $crop_id = $openAuctions->crop_id;
                $creator_id = $openAuctions->user_id;
                $bidder_id =  $bid->user_id;
                
                         
                /*farmerNotif::create([
                    'auction_id' => $auction_id,
                    'crop_id' => $crop_id,
                    'creator_id' => $creator_id,
                ]); 
                
                consNotif::create([
                    'auction_id' => $auction_id,
                    'crop_id' => $crop_id,
                    'bidder_id' => $bidder_id,
                ]);
     
                
            /*  notifications::create([
                    'auction_id' => $auction_id,
                    'crop_id' => $crop_id,
                    'creator_id' => $creator_id,
                    'bidder_id' => $bidder_id,
                ]); */
               /*event(new notifier($auction_id, $crop_id, $creator_id, $bidder_id ));
                event(new end_auction($auction_id, $crop_id, $creator_id, $bidder_id ));*/    
               
            }
            farmerNotif::create([
                'auction_id' => $auction_id,
                'crop_id' => $crop_id,
                'creator_id' => $creator_id,
            ]); 
            
            consNotif::create([
                'auction_id' => $auction_id,
                'crop_id' => $crop_id,
                'bidder_id' => $bidder_id,
            ]);
            event(new notifier($auction_id, $crop_id, $creator_id, $bidder_id ));
            event(new end_auction($auction_id, $crop_id, $creator_id, $bidder_id ));
        
        if($close_auction)
        {
            return back()->with('closed', 'Auction is now closed');
        }
        return back()->with('active', 'Failed to close');
    }


    public function update_base(Request $request)
    {
        $request->validate([
            'new_base'=>'required',
            //'auction_id'=>'required',
        ]);

        $new_bid = $request->input('new_base');
        $auction_id = $request->input('auction_id');
        $bids = bids::where('auction_id', $auction_id)->get('bid_amount')->max();
        if(empty($bids))
        {
            auctions::where('auction_id', $auction_id)->update(['starting_price' => $new_bid]);
            return back()->with('updated', 'Update bid successfully');     
        }
        else
        {
            return back()->with('failedUpdate', 'Your auction have bid/s already');
        }
        
    }








   /* public function registerUser(Request $request)
    {
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|unique:userdbs',
            'pass'=>'required|min:8|max:12',
            'conpass'=>'required',
            'phonenum'=>'required|min:11|max:11',
            'address'=>'required'
        ]);
        $user = new Userdbs();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->pass = $request->pass;
        $user->phonenum = $request->phonenum;
        $user->address = $request->address;
        $res = $user->save();
        if($res){
            return back()->with('success', 'You have registered successfully');
        }else{
            return back()->with('failed', 'Failed to register T-T. Something went wrong');
        }
    }*/
}

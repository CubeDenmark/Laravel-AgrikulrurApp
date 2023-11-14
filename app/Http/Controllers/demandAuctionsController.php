<?php

namespace App\Http\Controllers;

use App\Models\auctions;
use App\Models\bids;
use App\Models\crops;
use App\Models\demand_bids;
use App\Models\demandAuctions;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class demandAuctionsController extends Controller
{
    public function demandAuctions()
    {

        $auctionData = demandAuctions::select(
            'demand_auctions.auction_id',
            'demand_auctions.crop_name',
            'demand_auctions.crop_volume',
            'demand_auctions.starting_price',
            'demand_auctions.pick_up_date',
            'users.name as creator_id',
            DB::raw('COALESCE(MAX(demand_bids.bid_amount), demand_auctions.starting_price) as latest_bid_price')
        )
            ->join('users', 'demand_auctions.creator_id', '=', 'users.id')
            ->leftJoin('demand_bids', 'demand_auctions.auction_id', '=', 'demand_bids.auction_id')
            //->where('auctions.crop_id', $type)
            ->groupBy('demand_auctions.auction_id', 'demand_auctions.crop_name', 'demand_auctions.crop_volume', 'demand_auctions.starting_price', 'demand_auctions.pick_up_date', 'users.name')
            ->get();

            return view('demandAuctionListings', compact('auctionData'));
        //return response()->json($arr[0]->bid_amount);
        //return response()->json($arr[0]->bid_amount);

    }
    public function create_demAuction(Request $request)
    {
        return view('createDemandAuction');
    }
    public function new_demAuction(Request $request)
    {

        $request->validate([
            'crop_name' => 'required',
            'input_price' => 'required',
            'input_volume' => 'required',
            'pick_up_date' => 'required',
        ]);

        //$crop_id = $request->crop_id;
        //$starting_price = $request->input_price;
        //$crop_volume = $request->input_volume;
        $user = Auth::user();
        //$dateNow = time();

        $new_auction = demandAuctions::create([
            'crop_name' => $request->crop_name,
            'starting_price' =>  $request->input_price,
            'crop_volume' => $request->input_volume,
            'creator_id' => $user['id'],
            'status' => 'active',
            'pick_up_date' => $request->pick_up_date,
            'end_time' => Carbon::now()->addHours(6),
        ]);

        return redirect()->back()->withSuccess('Upload image successful')
        ->with('success', 'New Demand Auction has been added');
    }
    public function selectAuction(Request $request)
    {
        $on_auction = $request->input('auction_id');


        $auctionData = demandAuctions::select(
            'demand_auctions.auction_id',
            'demand_auctions.crop_volume',
            'demand_auctions.starting_price',
            'demand_auctions.pick_up_date',
            'demand_auctions.end_time',
            'demand_auctions.crop_name',
            'demand_auctions.starting_price',
            'demand_auctions.status',
            'demand_auctions.creator_id',
            'demand_bids.on_time',
            'users.name as creator_name',
            'users.profile_img',
            'demand_auctions.crop_name',
            'demand_bids.bid_amount',
            DB::raw('COALESCE(MAX(demand_bids.bid_amount), demand_auctions.starting_price) as latest_bid_price')
        )
            ->join('users', 'demand_auctions.creator_id', '=', 'users.id')
            ->leftJoin('demand_bids', 'demand_auctions.auction_id', '=', 'demand_bids.auction_id')
            ->where('demand_auctions.auction_id', $on_auction)
            ->groupBy(
                        'demand_auctions.auction_id', 
                        'demand_auctions.crop_volume', 
                        'demand_auctions.starting_price', 
                        'demand_auctions.pick_up_date', 
                        'demand_auctions.crop_name',
                        'demand_auctions.starting_price',
                        'demand_auctions.status',
                        'demand_auctions.creator_id',
                        'demand_bids.on_time',
                        'users.name', 
                        'users.profile_img',
                        'demand_auctions.crop_name', 
                        'demand_bids.bid_amount',
                        'demand_auctions.end_time',
                    )
            ->get();

            $bids = demand_bids::select('demand_bids.bid_id', 'users.name', 'demand_bids.bid_amount','users.profile_img', 'demand_bids.on_time')
            ->join('users', 'demand_bids.bidder_id', '=', 'users.id')
            ->where('demand_bids.auction_id', $on_auction)
            ->orderBy('bid_amount', 'asc')
            ->get();

            return view('demandBidding', compact('auctionData', 'bids'))->with('success', 'highest bid fetched');







        /*
        $bids = demand_bids::select(
            'demand_bids.bid_id', 
            'demand_bids.crop_name', 
            'users.name', 
            'demand_bids.bid_amount',
            'users.profile_img', 
            'demand_bids.on_time'
            )
        ->join('users', 'demand_bids.bidder_id', '=', 'users.id')
        ->where('demand_bids.auction_id', $on_auction)
        ->orderBy('bid_amount', 'desc')
        ->get();

        $auctions = demandAuctions::where('auction_id', $on_auction)->get();
        $highestbid = demand_bids::where('auction_id', $on_auction)->get('bid_amount')->max();
        foreach($auctions as $auction)
        {
            $creator = User::where('id', $auction->user_id)->get();
            $crop = crops::where('crop_id', $auction->crop_id)->first();
        }
        return view('demandBidding', compact('bids','auctions', 'highestbid', 'creator', 'crop'))->with('success', 'highest bid fetched');
        */
    }

    public function update_baseDemand(Request $request)
    {
        $request->validate([
            'new_base'=>'required',
            //'auction_id'=>'required',
        ]);

        $new_bid = $request->input('new_base');
        $auction_id = $request->input('auction_id');
        $bids = demand_bids::where('auction_id', $auction_id)->get('bid_amount')->max();
        if(empty($bids))
        {
            demandAuctions::where('auction_id', $auction_id)->update(['starting_price' => $new_bid]);
            return back()->with('updated', 'Update bid successfully');     
        }
        else
        {
            return back()->with('failedUpdate', 'Your auction have bid/s already');
        }
        
    }
}

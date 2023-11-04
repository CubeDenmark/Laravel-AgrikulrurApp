<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\bids;
 
class bidsControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bids_res()
    {
        $bids = bids::orderBy('bid_amount', 'ASC')->get();

        return view('bidding', compact('bids', 'status'));
    }
}


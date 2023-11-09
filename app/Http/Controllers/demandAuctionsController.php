<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demandAuctionsController extends Controller
{
    public function demandAuctions()
    {
        return view("demandAuctionListings");
    }
}

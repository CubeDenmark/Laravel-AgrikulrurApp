<?php

use App\Events\NewMessageEvent;
use App\Events\notifier;
use App\Models\auctions;
use App\Models\bids;
use App\Models\notifications;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('fetch:auctions', function () {

    $openAuctions = auctions::where('status', 'active')->get();
 

    foreach ($openAuctions as $auction) {

  
        $now = now()->toDateTimeString();
        
        if($auction->end_time <= $now)
        {
            notifications::create([
                'user_id' => $auction->user_id,
                'auction_id' => $auction->auction_id,
                'crop_id' => $auction->crop_id
            ]);
            auctions::where('end_time', '<=', $now)->update(['status' => 'closed']);

            $thesebids = bids::where('auction_id', $auction->auction_id)->get();
            
            foreach($thesebids as $bid)
            {
                event(new notifier(2, $bid->bid_amount, 2));
            }

           
            
        }

    }
    

})->purpose('Fetch all ended auctions on the database');

/*Oks

Artisan::command('fetch:auctions', function () {

    $openAuctions = auctions::where('status', 'active')->get();
    //$carbontime = Carbon::now();// 2023-09-19T11:05:35.901332Z
    //$now = now()->toDateTimeString();// 2023-09-19 11:06:31
    

    foreach ($openAuctions as $auction) {

        //end time = 2023-09-18 15:00:04

        //$date = Carbon::parse($auction->end_time->isPast());
        //$date = Carbon::parse('2022-01-01');// 2022-01-01T00:00:00.000000Z

        $now = now()->toDateTimeString();
        
        if($auction->end_time <= $now){
            event(new notifier(2, 4, 2));
        }

    }
    
    //return response()->json(['success' => true]);
    //event(new NewMessageEvent(14, 1, 1));
    
})->purpose('Fetch all ended auctions on the database');

*/






        //Working

        /*$date = Carbon::parse('2022-01-01');

        if ($date->isPast()) {
            event(new notifier(2, 4, 2));
        } else {
            echo 'The date is in the future.';
        }*/


//testing sample 



    //$todelete = auctions::where('created_at', Carbon::now())->delete();
    
    /*$currentDateTime = Carbon::now();
    
    $openAuctions = auctions::where('status', 'active')->get();
    
    foreach ($openAuctions as $auction) {
        $endTime = Carbon::parse($auction->created_at);
        //$endTime = Carbon::parse($auction->created_at);
    
        if ($endTime->isPast()) {
            // Mark the auction as closed
            $auction->update(['status' => 'closed']);
            
            // You can also announce the winner and perform other actions here.
        }
    }*/
    // end testing

    //test 2
    /*
    $activeAuctions = auctions::where('created_at', '<=', now()->toDateTimeString());

    foreach ($activeAuctions as $auction) {
        $auction = $auction->auction_id;
        $crop = $auction->crop_id;
        $creator = $auction->user_id;

        if($activeAuctions)
        {
            $activeAuctions->update(['status' => 'closed']);
            $bidders = bids::where('auction_id', $auction)->update(['bid_amount' => 0]);
    
            foreach ($bidders as $bidder) {
                $toUser = $bidder->user_id;
            }
    
            if($bidders)
            {
    
                event(new notifier($auction, $crop, $creator, $toUser));
                //return response()->json([$res->auction_id => true]);
    
            }             
        }
        else
        {
            //return response()->json(['Bid Not Sent' => true]);
        }
    }
    
*/
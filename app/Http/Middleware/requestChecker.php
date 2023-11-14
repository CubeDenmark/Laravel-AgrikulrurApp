<?php

namespace App\Http\Middleware;

use App\Models\notifications;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class requestChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    /*public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }*/
    public function handle($request, Closure $next): Response
    {
        foreach (Auth::user()->notifications as $notification)
        {
            if(Auth::user()->id == $notification->data['bidder_id'])
            {
                $authorized = true;
                
            }
            else
            {
                $authorized = false;
                break;
            }
        }

        if ($authorized)
         {
            // User is authorized
            // Proceed with the rest of your code
            return $next($request);
        } 
        else 
        {
            // User is not authorized
            abort(403, 'Unauthorized access');
        }
    
    }
}

/*

$notifData = notifications::where('notifiable_id', Auth::user()->id)->get('data');

foreach ($notifData as $notification) 
{
    if ($notification->auction_id == $auctionId && $notification->bidder_id == Auth::user()->id) 
    {
        $authorized = true;
    }
    else 
    {
        $authorized = false;
        break; // Break the loop as soon as a non-matching notification is found
    }
}
*/
<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageEvent;
use App\Events\PlaygroundEvent;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User, Illuminate\Contracts\Auth\Authenticatable;


class testMessageControl extends Controller
{
    public function testMessage(Request $request){

        $testmessage = $request->input('message');
        $user = auth()->user();

        $uid = $request->input('user_id');

        //event(new PlaygroundEvent($testmessage));
        event(new PlaygroundEvent($testmessage, $user, $uid));

        return response()->json([$testmessage => true]);
    }
}

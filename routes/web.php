<?php

use App\Events\ChatMessageEvent;
use App\Events\PlaygroundEvent;
use App\Http\Controllers\AdminContoller;
use App\Http\Controllers\bidsControl;
use App\Http\Controllers\CropsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuctionsControll;
use App\Http\Controllers\testMessageControl;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeEventController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/', function () {
//    return view('bidding');
//});
//Route::get('/send-bid' ,[MessageController::class , 'sendBid']);--------------
//Route::get('/bidding', [bidsControl::class, 'bids_res']);

/*Route::get('/first', function () {
    return view('first');
});
Route::get('/second', function () {
    return view('second');
});
*/
//Route::get('/send-message' ,[TeEventController::class , 'testingEvents']);
//Route::get('/send-message', 'App\Http\Controllers\MessageController@sendMessage');

//Route::get('/send-message' ,[MessageController::class , 'sendMessage']);--------------
//Route::post('/send-message', [MessageController::class , 'sendMessage']);

Route::get('/', function () {
    return view('index');
});
Route::get('/pending', function () {
    return view('pending');
});

Auth::routes();
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('home');
Route::post('/update_info' ,[AuctionsControll::class , 'update_info'])->name('update_info');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/crop-options', [App\Http\Controllers\HomeController::class, 'cropOption'])->name('home');

Route::get('/create_auction' ,[AuctionsControll::class , 'create_auction']);
Route::post('/newAuction' ,[AuctionsControll::class , 'newAuction'])->name('newAuction');

Route::post('/send-message' ,[MessageController::class , 'sendMessage']);
Route::get('/send-bid' ,[MessageController::class , 'sendBid']);

Route::get('/addcrop' ,[CropsController::class , 'addcrop']);
Route::post('/newCrop' ,[CropsController::class , 'newCrop'])->name('newCrop');

Route::get('/auctions' ,[AuctionsControll::class , 'auctions']);

Route::get('/guidelines' ,[AuctionsControll::class , 'guidelines']);
Route::get('/notifications' ,[AuctionsControll::class , 'notifications']);
Route::get('/congratulation' ,[AuctionsControll::class , 'congratulation']);
Route::get('/checkout' ,[AuctionsControll::class , 'checkout']);
Route::get('/confirm_payment' ,[AuctionsControll::class , 'confirm_payment']);
Route::get('/checkout_farmer' ,[AuctionsControll::class , 'checkout_farmer']);
Route::get('/bidder_payment' ,[AuctionsControll::class , 'bidder_payment']);
Route::get('/finished' ,[AuctionsControll::class , 'finished']);
Route::post('/update_profile_image' ,[ImageController::class ,'update_profile_image'])->name('update_profile_image');

//For Admin routes
Route::get('/admin' ,[AdminContoller::class , 'admin']);
Route::get('/manageAuctions' ,[AdminContoller::class , 'manageAuctions']);
Route::get('/rmAuction' ,[AdminContoller::class , 'rmAuction']);
Route::get('/manageUsers' ,[AdminContoller::class , 'manageUsers']);
Route::get('/banUser' ,[AdminContoller::class , 'banUser']);
Route::get('/activateUsers' ,[AdminContoller::class , 'activateUsers']);
Route::get('/activate' ,[AdminContoller::class , 'activate']);
Route::get('/rejectUser' ,[AdminContoller::class , 'rejectUser']);
Route::get('/updateGuidelines' ,[AdminContoller::class , 'updateGuidelines']);
Route::get('/updatePriceForm' ,[AdminContoller::class , 'updatePriceForm']);
Route::get('/updatePrice' ,[AdminContoller::class , 'updatePrice'])->name('updatePrice');


Route::controller(ImageController::class)->group(function(){
    Route::get('image_upload', 'view_image');
    Route::post('image_upload', 'image_upload')->name('image.store');
});


Route::get('/manual_close' ,[AuctionsControll::class , 'manual_close']);
/*Route::get('/playground', function () {
    event(new App\Events\ChatMessageEvent());

    return null;
});
*/

Route::get('/ws', function () {
    return view('websocket');
});

Route::post('/chat-message', function (\Illuminate\Http\Request $request) {
    event(new PlaygroundEvent($request->message, auth()->user()));
    return response()->json([$request->message => true]);
});

//Route::post('/chat-message', [testMessageControl::class, 'testMessage']);
//Route::get('/chat-message', [testMessageControl::class, 'testMessage']);

//testing routes

Route::get('/message-form', [MessageController::class , 'showForm']);//not needed, siguro hahaha
Route::post('/process-message', [MessageController::class , 'process'])->name('process.message');

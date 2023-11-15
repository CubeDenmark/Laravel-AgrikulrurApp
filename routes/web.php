<?php

use App\Events\ChatMessageEvent;
use App\Events\PlaygroundEvent;
use App\Http\Controllers\AdminContoller;
use App\Http\Controllers\bidsControl;
use App\Http\Controllers\CropsController;
use App\Http\Controllers\demandAuctionsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuctionsControll;
use App\Http\Controllers\testMessageControl;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeEventController;
use App\Http\Controllers\UserTypeController;
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



// routes/web.php

// routes/web.php

// routes/web.php

// routes/web.php

Route::get('/', function () {
    return view('index');
});

Route::get('/pending', function () {
    return view('pending');
});

Auth::routes();

// Middleware for shared routes of Farmer and Bidder
Route::middleware(['auth', 'user-access:farmer,bidder'])->group(function () {

    // Shared routes for both "farmer" and "bidder"
    Route::get('/farmerProfile', [App\Http\Controllers\HomeController::class, 'profile'])->name('farmer.home');
    Route::get('/consumerProfile', [App\Http\Controllers\HomeController::class, 'profile'])->name('bidder.home');
    Route::post('/update_info', [AuctionsControll::class, 'update_info'])->name('update_info');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/crop-options', [App\Http\Controllers\HomeController::class, 'cropOption'])->name('crop-options');
    Route::post('/update_info', [AuctionsControll::class, 'update_info'])->name('update_info');
    Route::get('/guidelines' ,[AuctionsControll::class , 'guidelines']);
    Route::get('/notifications' ,[AuctionsControll::class , 'notifications']);
    Route::get('/auctions' ,[AuctionsControll::class , 'auctions']);
    Route::post('/update_profile_image' ,[ImageController::class ,'update_profile_image'])->name('update_profile_image');
   
    // Consumer
    Route::get('/demandAuctions' ,[demandAuctionsController::class , 'demandAuctions']);
    Route::get('/selectAuction' ,[demandAuctionsController::class , 'selectAuction']);
});
// Middleware for shared routes of Farmer,Bidder,  and Admin
Route::middleware(['auth', 'user-access:farmer,bidder,admin'])->group(function () {

    // Shared routes for both "farmer", "bidder", and "admin"
    Route::get('/send-bid' ,[MessageController::class , 'sendBid']);
    
});

// Farmers Routes List
Route::middleware(['auth', 'user-access:farmer'])->group(function () {

    // Farmer-specific routes
    Route::get('/create_auction' ,[AuctionsControll::class , 'create_auction']);
    Route::post('/newAuction' ,[AuctionsControll::class , 'newAuction'])->name('newAuction');
    Route::get('/confirm_payment' ,[AuctionsControll::class , 'confirm_payment']);
    Route::get('/checkout_farmer' ,[AuctionsControll::class , 'checkout_farmer']);     
    
    Route::post('/update_base', [AuctionsControll::class ,'update_base'])->name('update_base');
    Route::get('/manual_close' ,[AuctionsControll::class , 'manual_close']);

    Route::post('/send_bidDemand' ,[MessageController::class , 'send_bidDemand']);
});

// Bidder Routes List
Route::middleware(['auth', 'user-access:bidder'])->group(function () {

    // Bidder-specific routes
    // Add other bidder-specific routes here
    Route::post('/send_bidSupply' ,[MessageController::class , 'send_bidSupply']);
    Route::get('/congratulation' ,[AuctionsControll::class , 'congratulation'])->name('congratulation');//->middleware('requestChecker');
    Route::get('/checkout' ,[AuctionsControll::class , 'checkout']); //->middleware('requestChecker');
    Route::get('/bidder_payment' ,[AuctionsControll::class , 'bidder_payment']);
    Route::get('/finished' ,[AuctionsControll::class , 'finished']);
    Route::get('/create_demAuction' ,[demandAuctionsController::class , 'create_demAuction']);
    Route::post('/new_demAuction' ,[demandAuctionsController::class , 'new_demAuction'])->name('new_demAuction');

    Route::post('/update_baseDemand', [demandAuctionsController::class ,'update_baseDemand'])->name('update_baseDemand');
    Route::get('/manual_closeDemand' ,[demandAuctionsController::class , 'manual_closeDemand']);
   

});

// Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Add admin-specific routes here

    Route::get('/admin' ,[AdminContoller::class , 'admin']);
    Route::get('/manageAuctions' ,[AdminContoller::class , 'manageAuctions']);
    Route::get('/rmAuction' ,[AdminContoller::class , 'rmAuction']);
    Route::get('/manageUsers' ,[AdminContoller::class , 'manageUsers'])->name('admin.home');
    Route::get('/banUser' ,[AdminContoller::class , 'banUser']);
    Route::get('/activateUsers' ,[AdminContoller::class , 'activateUsers']);
    Route::get('/activate' ,[AdminContoller::class , 'activate']);
    Route::get('/rejectUser' ,[AdminContoller::class , 'rejectUser']);
    Route::get('/updateGuidelines' ,[AdminContoller::class , 'updateGuidelines']);
    
    Route::get('/addcrop' ,[CropsController::class , 'addcrop']);
    Route::post('/newCrop' ,[CropsController::class , 'newCrop'])->name('newCrop');

    Route::get('/updatePriceForm' ,[AdminContoller::class , 'updatePriceForm']);
    Route::get('/updatePrice' ,[AdminContoller::class , 'updatePrice'])->name('updatePrice');
});






/*
Route::get('/', function () {
    return view('index');
});
Route::get('/pending', function () {
    return view('pending');
});

Auth::routes();

// Shared routes of Farmer and Bidder
Route::middleware(['auth', 'user-access:farmer'])->middleware(['auth', 'user-access:bidder'])->group(function () {

    Route::get('/farmerProfile', [App\Http\Controllers\HomeController::class, 'profile'])->name('farmer.home');
    Route::get('/consumerProfile', [App\Http\Controllers\HomeController::class, 'profile'])->name('bidder.home');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/crop-options', [App\Http\Controllers\HomeController::class, 'cropOption'])->name('crop-options');
    // Add other shared routes here

    Route::post('/update_info' ,[AuctionsControll::class , 'update_info'])->name('update_info');
    Route::get('/create_auction' ,[AuctionsControll::class , 'create_auction']);
    Route::post('/newAuction' ,[AuctionsControll::class , 'newAuction'])->name('newAuction');
    Route::post('/send-message' ,[MessageController::class , 'sendMessage']);
    Route::get('/send-bid' ,[MessageController::class , 'sendBid']);
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
    Route::post('/update_base', [AuctionsControll::class ,'update_base'])->name('update_base');
    Route::get('/manual_close' ,[AuctionsControll::class , 'manual_close']);

    // Consumer
    Route::get('/demandAuctions' ,[demandAuctionsController::class , 'demandAuctions']);
});

// Farmers Routes List
Route::middleware(['auth', 'user-access:farmer'])->group(function () {
    //Route::get('/farmerProfile', [App\Http\Controllers\HomeController::class, 'profile'])->name('farmer.home');
    // Add other farmer-specific routes here
});

// Bidder Routes List
Route::middleware(['auth', 'user-access:bidder'])->group(function () {
    //Route::get('/consumerProfile', [App\Http\Controllers\HomeController::class, 'profile'])->name('bidder.home');
    // Add other bidder-specific routes here
});

// Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Add admin-specific routes here

        //Route::get('/manageUsers', [UserTypeController::class, 'admin'])->name('admin.home');
        Route::get('/admin' ,[AdminContoller::class , 'admin']);
        Route::get('/manageAuctions' ,[AdminContoller::class , 'manageAuctions']);
        Route::get('/rmAuction' ,[AdminContoller::class , 'rmAuction']);
        Route::get('/manageUsers' ,[AdminContoller::class , 'manageUsers'])->name('admin.home');
        Route::get('/banUser' ,[AdminContoller::class , 'banUser']);
        Route::get('/activateUsers' ,[AdminContoller::class , 'activateUsers']);
        Route::get('/activate' ,[AdminContoller::class , 'activate']);
        Route::get('/rejectUser' ,[AdminContoller::class , 'rejectUser']);
        Route::get('/updateGuidelines' ,[AdminContoller::class , 'updateGuidelines']);
       
        Route::get('/addcrop' ,[CropsController::class , 'addcrop']);
        Route::post('/newCrop' ,[CropsController::class , 'newCrop'])->name('newCrop');
    
        Route::get('/updatePriceForm' ,[AdminContoller::class , 'updatePriceForm']);
        Route::get('/updatePrice' ,[AdminContoller::class , 'updatePrice'])->name('updatePrice');
    
});


*/













/*






Route::get('/', function () {
    return view('index');
});
Route::get('/pending', function () {
    return view('pending');
});

Auth::routes();


//Farmers Routes List
Route::middleware(['auth', 'user-access:farmer'])->group(function () {
   
    //Route::get('/profile', [UserTypeController::class, 'farmer'])->name('farmer.home');
    Route::get('/farmerProfile', [App\Http\Controllers\HomeController::class, 'profile'])->name('farmer.home');
    //Route::get('/create_auction' ,[AuctionsControll::class , 'create_auction'])->name('farmer.home');
    Route::post('/update_info' ,[AuctionsControll::class , 'update_info'])->name('update_info');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/crop-options', [App\Http\Controllers\HomeController::class, 'cropOption'])->name('home');
    Route::get('/create_auction' ,[AuctionsControll::class , 'create_auction']);
    Route::post('/newAuction' ,[AuctionsControll::class , 'newAuction'])->name('newAuction');
    Route::post('/send-message' ,[MessageController::class , 'sendMessage']);
    Route::get('/send-bid' ,[MessageController::class , 'sendBid']);
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
    Route::post('/update_base', [AuctionsControll::class ,'update_base'])->name('update_base');
    
    Route::get('/manual_close' ,[AuctionsControll::class , 'manual_close']);

    //Consumer
    Route::get('/demandAuctions' ,[demandAuctionsController::class , 'demandAuctions']);

            
});
   
//Bidder Routes List
Route::middleware(['auth', 'user-access:bidder'])->group(function () {
   
    //Route::get('/cropOptionPage', [UserTypeController::class, 'bidder'])->name('bidder.home');
    //Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('farmer.home');
    //Route::get('/demandAuctions' ,[demandAuctionsController::class , 'demandAuctions']);
    Route::get('/consumerProfile', [App\Http\Controllers\HomeController::class, 'profile'])->name('bidder.home');
    Route::post('/update_info' ,[AuctionsControll::class , 'update_info'])->name('update_info');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/crop-options', [App\Http\Controllers\HomeController::class, 'cropOption'])->name('home');
    Route::get('/create_auction' ,[AuctionsControll::class , 'create_auction']);
    Route::post('/newAuction' ,[AuctionsControll::class , 'newAuction'])->name('newAuction');
    Route::post('/send-message' ,[MessageController::class , 'sendMessage']);
    Route::get('/send-bid' ,[MessageController::class , 'sendBid']);
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
    Route::post('/update_base', [AuctionsControll::class ,'update_base'])->name('update_base');
    
    Route::get('/manual_close' ,[AuctionsControll::class , 'manual_close']);

    //Consumer
    Route::get('/demandAuctions' ,[demandAuctionsController::class , 'demandAuctions']);

});


   
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
    //Route::get('/manageUsers', [UserTypeController::class, 'admin'])->name('admin.home');
    Route::get('/admin' ,[AdminContoller::class , 'admin']);
    Route::get('/manageAuctions' ,[AdminContoller::class , 'manageAuctions']);
    Route::get('/rmAuction' ,[AdminContoller::class , 'rmAuction']);
    Route::get('/manageUsers' ,[AdminContoller::class , 'manageUsers'])->name('admin.home');
    Route::get('/banUser' ,[AdminContoller::class , 'banUser']);
    Route::get('/activateUsers' ,[AdminContoller::class , 'activateUsers']);
    Route::get('/activate' ,[AdminContoller::class , 'activate']);
    Route::get('/rejectUser' ,[AdminContoller::class , 'rejectUser']);
    Route::get('/updateGuidelines' ,[AdminContoller::class , 'updateGuidelines']);
   
    Route::get('/addcrop' ,[CropsController::class , 'addcrop']);
    Route::post('/newCrop' ,[CropsController::class , 'newCrop'])->name('newCrop');

    Route::get('/updatePriceForm' ,[AdminContoller::class , 'updatePriceForm']);
    Route::get('/updatePrice' ,[AdminContoller::class , 'updatePrice'])->name('updatePrice');

});


//Shared routes of Farmer and Bidder
Route::middleware(['auth', 'user-access:farmer, bidder'])->group(function () {
        
    Route::post('/update_info' ,[AuctionsControll::class , 'update_info'])->name('update_info');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/crop-options', [App\Http\Controllers\HomeController::class, 'cropOption'])->name('home');
    Route::get('/create_auction' ,[AuctionsControll::class , 'create_auction']);
    Route::post('/newAuction' ,[AuctionsControll::class , 'newAuction'])->name('newAuction');
    Route::post('/send-message' ,[MessageController::class , 'sendMessage']);
    Route::get('/send-bid' ,[MessageController::class , 'sendBid']);
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
    Route::post('/update_base', [AuctionsControll::class ,'update_base'])->name('update_base');
    
    Route::get('/manual_close' ,[AuctionsControll::class , 'manual_close']);

    //Consumer
    Route::get('/demandAuctions' ,[demandAuctionsController::class , 'demandAuctions']);

});


*/














/*
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
Route::post('/update_base', [AuctionsControll::class ,'update_base'])->name('update_base');


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
*/


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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auctions extends Model
{
    use HasFactory;

    protected $table = 'auctions';

    protected $fillable = [ 'crop_id', 
                            'starting_price', 
                            'crop_volume', 
                            'user_id',
                            'status', 
                            'end_time', 
                            'auctionCropImage'];
}

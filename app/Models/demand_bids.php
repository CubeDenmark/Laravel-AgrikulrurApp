<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demand_bids extends Model
{
    use HasFactory;

    protected $table = 'demand_bids';

    protected $fillable = ['bid_amount', 'bidder_id', 'auction_id', 'crop_name', 'on_time'];
}

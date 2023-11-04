<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bids extends Model
{
    use HasFactory;

    protected $table = 'bids';

    protected $fillable = ['bid_amount', 'user_id', 'auction_id', 'crop_type', 'on_time'];
}

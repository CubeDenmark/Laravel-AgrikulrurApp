<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificatio extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = ['auction_id', 'crop_id', 'creator_id', 'bidder_id'];
}

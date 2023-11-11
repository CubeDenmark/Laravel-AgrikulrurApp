<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demandAuctions extends Model
{
    use HasFactory;

    protected $table = 'demand_auctions';

    protected $fillable = [ 'crop_name', 
                            'starting_price', 
                            'crop_volume', 
                            'creator_id', 
                            'status', 
                            'pick_up_date', 
                            'end_time', 
                          ];
}

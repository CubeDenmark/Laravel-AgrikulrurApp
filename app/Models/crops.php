<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crops extends Model
{
    use HasFactory;
    protected $table = 'crops';

    protected $fillable = ['crop_name', 'suggested_price', 'user_id', 'crop_image'];

}

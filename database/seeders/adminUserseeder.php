<?php

namespace Database\Seeders;

use App\Models\auctions;
use App\Models\crops;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminUserseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Teddy Pascual', 
            'email' => 'kledted23@gmail.com',
            'password' => bcrypt('pass1234'),
            'phone' => '09121233333',
            'address' => 'Capas, Tarlac',
            'user_type' => '1',
            'status' => '1', 
            'val_img' => 'valTeddy Pascual.jpg',
            'profile_img' => 'userProfileTeddy Pascual.jpg',
        ]);
        $crop = crops::create([
            'crop_name' => 'Ampalaya', 
            'suggested_price' => 60,
            'user_id' => 1,
            'crop_image' => 'crop_Ampalaya.jpeg',
        ]);
        $new_auction = auctions::create([
            'crop_id' => 1, 
            'starting_price' => 61,
            'crop_volume' => 40,
            'user_id' => 2,
            'status' => 'active',
            'end_time' => date('Y-m-d H:i:s'),
            'auctionCropImage' => 'newimg.jpg',
        ]);
    }
}

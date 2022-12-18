<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Announcement::factory()->create([
            'content'=>'Dapatkan potongan harga sekarang! Gunakan code promo:',
            'promo_id'=>'1',
            'status'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        Announcement::factory()->create([
            'content'=>'Selamat hari natal! Nih code promo buat kamu:',
            'promo_id'=>'2',
            'status'=>'0',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}

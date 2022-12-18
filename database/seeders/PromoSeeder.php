<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promo::factory()->create([
            'code'=>'GET30',
            'type'=>'fixed',
            'fixed'=>'30000',
            'percentage'=>null,
            'max_discount'=>null,
            'status'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        Promo::factory()->create([
            'code'=>'OFF15',
            'type'=>'percentage',
            'fixed'=>null,
            'percentage'=>'15',
            'max_discount'=>'45000',
            'status'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}

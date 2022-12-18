<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::factory()->create([
            'name'=>'-',
            'logo'=>'-',
            'status'=>'1',
              

        ]);
        Brand::factory()->create([
            'name'=>'Lomira',
            'logo'=>'lomira.png',
            'status'=>'1',
              

        ]);
        Brand::factory()->create([
            'name'=>'JustMiss',
            'logo'=>'justmiss.jpg',
            'status'=>'1',
              

        ]);
        Brand::factory()->create([
            'name'=>'Follacure',
            'logo'=>'follacure.png',
            'status'=>'1',
              

        ]);
        Brand::factory()->create([
            'name'=>'Implora',
            'logo'=>'implora.png',
            'status'=>'1',
              

        ]);
        Brand::factory()->create([
            'name'=>'L`Oréal',
            'logo'=>'loreal.jpg',
            'status'=>'1',
              

        ]);
        Brand::factory()->create([
            'name'=>'matrix',
            'logo'=>'matrix.png',
            'status'=>'1',
              

        ]);
        Brand::factory()->create([
            'name'=>'Wardah',
            'logo'=>'wardah.jpg',
            'status'=>'1',
              

        ]);
    }
}

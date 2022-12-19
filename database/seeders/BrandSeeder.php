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
            'name'=>'Lomira',
            'logo'=>'lomira.png',
            
              

        ]);
        Brand::factory()->create([
            'name'=>'JustMiss',
            'logo'=>'justmiss.jpg',
            
              

        ]);
        Brand::factory()->create([
            'name'=>'Follacure',
            'logo'=>'follacure.png',
            
              

        ]);
        Brand::factory()->create([
            'name'=>'Implora',
            'logo'=>'implora.png',
            
              

        ]);
        Brand::factory()->create([
            'name'=>'L`Oréal',
            'logo'=>'loreal.jpg',
            
              

        ]);
        Brand::factory()->create([
            'name'=>'matrix',
            'logo'=>'matrix.png',
            
              

        ]);
        Brand::factory()->create([
            'name'=>'Wardah',
            'logo'=>'wardah.jpg',
            
              

        ]);
    }
}

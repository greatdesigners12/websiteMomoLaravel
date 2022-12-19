<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create([
                'category'=>'Aksesoris',
                
        ]);
        Category::factory()->create([
                'category'=>'Kosmetik',
                
        ]);
         Category::factory()->create([
                'category'=>'Aksesoris Mandi',
                
        ]);
        Category::factory()->create([
                'category'=>'Perlengkapan Bayi',
                
        ]);
        Category::factory()->create([
                'category'=>'Hijab',
                
        ]);
        Category::factory()->create([
                'category'=>'Tas',
                
        ]);
        Category::factory()->create([
                'category'=>'Dekorasi',
                
        ]);
    }
}

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
                'name'=>'Aksesoris',
                'status'=>'1'
        ]);
        Category::factory()->create([
                'name'=>'Kosmetik',
                'status'=>'1'
        ]);
         Category::factory()->create([
                'name'=>'Aksesoris Mandi',
                'status'=>'1'
        ]);
        Category::factory()->create([
                'name'=>'Perlengkapan Bayi',
                'status'=>'1'
        ]);
        Category::factory()->create([
                'name'=>'Hijab',
                'status'=>'1'
        ]);
        Category::factory()->create([
                'name'=>'Tas',
                'status'=>'1'
        ]);
        Category::factory()->create([
                'name'=>'Dekorasi',
                'status'=>'1'
        ]);
    }
}

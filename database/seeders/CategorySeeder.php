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
                'admin_id'=>'1',
                'status'=>'1'
        ]);
        Category::factory()->create([
                'name'=>'Kosmetik',
                'admin_id'=>'1',
                'status'=>'1'
        ]);
         Category::factory()->create([
                'name'=>'Aksesoris Mandi',
                'admin_id'=>'1',
                'status'=>'1'
        ]);
        Category::factory()->create([
                'name'=>'Perlengkapan Bayi',
                'admin_id'=>'1',
                'status'=>'1'
        ]);
        Category::factory()->create([
                'name'=>'Hijab',
                'admin_id'=>'1',
                'status'=>'1'
        ]);
        Category::factory()->create([
                'name'=>'Tas',
                'admin_id'=>'1',
                'status'=>'1'
        ]);
        Category::factory()->create([
                'name'=>'Dekorasi',
                'admin_id'=>'1',
                'status'=>'1'
        ]);
    }
}

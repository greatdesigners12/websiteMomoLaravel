<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email'=>'owner@momo.com',
            'password'=>Hash::make('Owner1234'),
            'role_id'=>'1',
            'phoneNumber'=>'+6282148442180',
            'token'=>'1',
            'status'=>'1',
            'last_login'=>date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        User::factory()->create([
            'email'=>'admin@momo.com',
            'password'=>Hash::make('Admin1234'),
            'role_id'=>'2',
            'phoneNumber'=>'+6282148442213',
            'token'=>'1',
            'status'=>'1',
            'last_login'=>date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        User::factory()->create([
            'email'=>'user@momo.com',
            'password'=>Hash::make('User1234'),
            'role_id'=>'3',
            'phoneNumber'=>'+628214844d123',
            'token'=>'1',
            'status'=>'1',
            'last_login'=>date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}

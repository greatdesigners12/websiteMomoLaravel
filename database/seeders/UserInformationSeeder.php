<?php

namespace Database\Seeders;

use App\Models\UserInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserInformation::factory()->create([
            'full_name'=>'Alexander Dharmawan',
            'gender'=>'m',
            'birth_date'=>'1980-11-02',
            'province'=>'Jawa Timur',
            'type'=>'Kota',
            'city'=>'Surabaya',
            'postal_code'=>'55700',
            'image_profile'=>null,
            'is_phone_verified'=>1,
            'is_email_verified'=>1,
            'token'=>null,
            'user_id'=>3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        UserInformation::factory()->create([
            'full_name'=>'Duniko Kwik',
            'gender'=>'p',
            'birth_date'=>'1995-06-04',
            'province'=>'DKI Jakarta',
            'type'=>'Kota',
            'city'=>'Jakarta',
            'postal_code'=>'55700',
            'image_profile'=>null,
            'is_phone_verified'=>1,
            'is_email_verified'=>1,
            'token'=>null,
            'user_id'=>4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}

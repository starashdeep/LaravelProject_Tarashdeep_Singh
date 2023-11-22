<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    User, Contect, Contectinformation
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'test',
            'email'=>'test@gmail.com',
            'password'=>bcrypt('password'),
        ]);
        Contect::create([
            'user_id'=>1,
            'phone_no'=>'fdggreggrd',
            'address'=>'Address_test',
        ]);
        Contectinformation::create([
            'contect_id'=>1,
            'pincode'=>'123344',
            'near_by'=>'xyz place',
            'extra_detail'=>'more information about address',
        ]);
    }
}

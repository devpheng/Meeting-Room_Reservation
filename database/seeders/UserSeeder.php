<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@shinhan.com.kh";
        $user->password = Hash::make("shinhan@2022");
        $user->save();
    }
}

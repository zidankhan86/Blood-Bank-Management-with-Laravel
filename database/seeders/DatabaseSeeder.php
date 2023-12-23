<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\admin\Shift;
use Illuminate\Support\Str;

use App\Models\admin\Classes;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\admin\Subject;
use Illuminate\Database\Seeder;
use App\Models\admin\SystemSetting;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */



    public function run(): void
    {




        $users = [
            ['name' => 'admin', 'email' => 'admin@mail.com', 'address'=>'uttara', 'password' => Hash::make('password'), 'user_type' => '1'],
            ['name' => 'donor', 'email' => 'donor@mail.com', 'password' => Hash::make('password'), 'user_type' => '2','address'=>'uttara'],
     
        ];


        User::insert($users);



 
    }
}

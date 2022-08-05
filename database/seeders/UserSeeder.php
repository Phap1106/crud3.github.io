<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            'name' =>'Admin',
            'level'=>0,
            'email'=>'admin@gmail.com',
            'password'=>'123456',
        ];

        User::create($data);

        $data = [
            'name' =>'Supper Admin',
            'level'=>1,
            'email'=>'supperadmin@gmail.com',
            'password'=>'123456',
        ];
        User::create($data);

    }
}

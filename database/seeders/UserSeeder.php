<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $data = [
            'name' => 'Truong','email' => 'caot43069@gmail.com', 'password' => Hash::make('123'),//tao mat khau la 123 va ma hoa bang Hash
        ];

        DB::table('users')->insert($data);
    }
}
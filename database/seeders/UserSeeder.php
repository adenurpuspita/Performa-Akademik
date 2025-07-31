<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin Utama',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin123'),
                'level' => 'Admin',
            ],
            [
                'nama' => 'Guru Satu',
                'email' => 'guru1@mail.com',
                'password' => Hash::make('guru123'),
                'level' => 'Guru',
            ],
            [
                'nama' => 'Guru Dua',
                'email' => 'guru2@mail.com',
                'password' => Hash::make('guru456'),
                'level' => 'Guru',
            ],
            [
                'nama' => 'Guru Tiga',
                'email' => 'guru3@mail.com',
                'password' => Hash::make('guru789'),
                'level' => 'Guru',
            ]
        ]);
    }
}

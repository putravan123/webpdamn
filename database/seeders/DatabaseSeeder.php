<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' =>1,
                'name' => 'admin'
            ],
            [
                'id' =>2,
                'name' => 'karyawan'
            ],
        ]);
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'karyawan',
                'email' => 'karyawan@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => 2,
            ],
        ]);
    }
}

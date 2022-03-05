<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'no_hp' => '000000000000',
            'alamat' => 'Semarang',
            'username' => 'superadmin',
            'password' => Hash::make('superadmin'),
            'role' => '1'
        ]);
    }
}

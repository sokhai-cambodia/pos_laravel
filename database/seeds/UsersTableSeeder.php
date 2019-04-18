<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'last_name' => 'admin',
            'first_name' => 'admin',
            'gender' => 'male',
            'dob' => '1996-01-01',
            'phone' => '0123456789',
            'role_id' => 1,
            'is_active' => 1,
            'created_by' => 1,
            'username' => 'admin',
            'password' => Hash::make('admin@123'),
        ]);
    }
}

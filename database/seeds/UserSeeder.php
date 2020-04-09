<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'sjeng',
            'email' => 'sjeng@gmail.com',
            'role' => 0,
            'password' => Hash::make('12345678')
        ]);
    }
}

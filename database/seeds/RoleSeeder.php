<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
           'id' => 0,
            'name' => 'user'
        ]);

        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'admin'
        ]);
    }
}

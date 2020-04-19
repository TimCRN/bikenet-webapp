<?php

use Illuminate\Database\Seeder;

class BikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('bikes')->insert([
        //     'name' => 'John Deere'
        // ]);

        factory(App\Bike::class, 50)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class CampusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('campuses')->insert([
        [
          'id' => 1,
          'name' => 'Amritapuri',
        ],
        [
          'id' => 2,
          'name' => 'Ettimadai',
        ],
        [
          'id' => 3,
          'name' => 'Kochi',
        ],
        [
          'id' => 4,
          'name' => 'Bangalore',
        ]
      ]);
    }
}

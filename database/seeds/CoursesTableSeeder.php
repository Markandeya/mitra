<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('courses')->insert([
        [
          'id' => 1,
          'name' => 'BCA',
        ],
        [
          'id' => 2,
          'name' => 'MCA',
        ],
        [
          'id' => 3,
          'name' => 'MECH',
        ],
        [
          'id' => 4,
          'name' => 'EEE',
        ]
      ]);
    }
}

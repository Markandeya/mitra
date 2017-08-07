<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('branches')->insert([
        [
          'id' => 1,
          'name' => 'CSA',
        ],
        [
          'id' => 2,
          'name' => 'Mechanical',
        ],
        [
          'id' => 3,
          'name' => 'EEE',
        ]
      ]);
    }
}

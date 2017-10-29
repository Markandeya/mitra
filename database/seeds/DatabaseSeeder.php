<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(CampusesTableSeeder::class);
      $this->call(BranchesTableSeeder::class);
      $this->call(CoursesTableSeeder::class);
    }
}

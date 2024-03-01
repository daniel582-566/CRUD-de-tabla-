<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $this->call(permissionsTableSeeder::class);
         $this->call(userSeeder::class);
         $this->call(projectSeeder::class);
         $this->call(rolSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class projectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Project::class,30)->create();



      //Manualmnte
      DB::table('projects')->insert([
           'title' => 'mi primer proyecto',
           'description' => 'el primer proyecto con laravel, esta es mi descripcion',
           'created_at' => '2019-11-24 18:00:07',
           'url' => 'laurl.com-primer',
           'updated_at' => '2019-12-26 18:00:07',
       ]);

    }
}

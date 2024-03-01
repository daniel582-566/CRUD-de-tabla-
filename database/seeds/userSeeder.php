<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;



class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // usuario 1
      DB::table('users')->insert([
           'name' => 'carlos prato',
           'email' => 'carlos@gmail.com',
           'password' => bcrypt('123456'),
           'edad' => '27',
           'created_at' => '2019-11-23 18:00:07',
           'email_verified_at' => '2019-11-25 18:00:07',
           'updated_at' => '2019-11-25 18:00:07',
       ]);

        // si borro estos usuarios debo borrar en rolSeeder la asignacion de roles
        factory(App\User::class,10)->create();   // 10 usuarios de ejemplo
    }
}

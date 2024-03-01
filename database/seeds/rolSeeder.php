<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class rolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      //Debe haber un ROL ADMIN POR DEFECTO.
      //Crear ROL con Acceso completo  PAara empezar.
       Role::create([
         'name' => 'Admin',
         'slug' => 'admin',
         'special' => 'all-access',
         'description' => 'Administrador con Acceso Total',
       ]);

    //crear Rol por DEFECTO
      $invitado =  Role::create([
        'name' => 'Invitado',
        'slug' => 'invitado',
        'special' => null,
        'description' => 'Usuarios Recien Registrado',
      ]);

       $invitado->givePermissionTo([
           'users.index',
           'users.show',
           'roles.index',
           'roles.show',
           'roles.create',
           'projects.index',
           'projects.show',
           'projects.edit',
           'projects.create',
       ]);

     //Carlos Prato acceso total
         User::find(1)->assignRoles('admin');
     // asignarle rol a todos los creados por factory
         User::find(2)->assignRoles('invitado');
         User::find(3)->assignRoles('invitado');
         User::find(4)->assignRoles('invitado');
         User::find(5)->assignRoles('invitado');
         User::find(6)->assignRoles('invitado');
         User::find(7)->assignRoles('invitado');
         User::find(8)->assignRoles('invitado');
         User::find(9)->assignRoles('invitado');
         User::find(10)->assignRoles('invitado');
         User::find(11)->assignRoles('invitado');
    }
}

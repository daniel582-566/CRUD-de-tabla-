<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class permissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// el permiso EDIT agarran las rutas edit y update; el permiso CREATE agarra las rutas create y store


//Usuarios.  No se Agrega CREAR Porque la modalidad es que CADA usuario debe Registrarse Cada uno.
        Permission::create([
          'name' => 'Observar los Usuarios',  // name es solo  informativo igual que description
          'slug' => 'users.index',            // nombre de la RUTA!!!
          'description' => 'Lista y navega todos los Usuarios del Sistema',
        ]);
        Permission::create([
          'name' => 'detallar cada Usuario',
          'slug' => 'users.show',
          'description' => 'Ver en Detalle cualquier usuario del Sistema',
        ]);
        Permission::create([
          'name' => 'Edicion de usuarios',
          'slug' => 'users.edit',
          'description' => 'Editar Cualquier usuario del Sistema',
        ]);
        Permission::create([
          'name' => 'Eliminar usuarios',
          'slug' => 'users.destroy',
          'description' => 'Eliminar Cualquier usuario del Sistema',
        ]);

  // ROLES.
        Permission::create([
          'name' => 'Observar los Roles',
          'slug' => 'roles.index',
          'description' => 'Listar y navegar todos los Roles del Sistema',
        ]);
        Permission::create([
          'name' => 'detallar cada Rol',
          'slug' => 'roles.show',
          'description' => 'Ver en Detalle cualquier usuario del Sistema'
        ]);
        Permission::create([
          'name' => 'Edicion de Roles',
          'slug' => 'roles.edit',
          'description' => 'Editar Cualquier Rol del Sistema',
        ]);
        Permission::create([
          'name' => 'Eliminar Roles',
          'slug' => 'roles.destroy',
          'description' => 'Eliminar Cualquier Rol del Sistema',
        ]);
        Permission::create([
          'name' => 'Crear Roles',
          'slug' => 'roles.create',
          'description' => 'Crear Cualquier Rol del Sistema',
        ]);


  // Proyectos.
        Permission::create([
          'name' => 'Observar los Proyectos',
          'slug' => 'projects.index',
          'description' => 'Listar y navegar todos los Proyectos del Sistema',
        ]);
        Permission::create([
          'name' => 'detallar cada Proyecto',
          'slug' => 'projects.show',
          'description' => 'Ver en Detalle cualquier usuario del Sistema'
        ]);
        Permission::create([
          'name' => 'Edicion de Proyectos',
          'slug' => 'projects.edit',
          'description' => 'Editar Cualquier Proyecto del Sistema',
        ]);
        Permission::create([
          'name' => 'Eliminar Proyectos',
          'slug' => 'projects.destroy',
          'description' => 'Eliminar Cualquier Proyecto del Sistema',
        ]);
        Permission::create([
          'name' => 'Crear Proyectos',
          'slug' => 'projects.create',
          'description' => 'Crear Cualquier Proyecto del Sistema',
        ]);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Http\Requests\saveRolRequest;
use Illuminate\Support\Facades\Log;

class rolController extends Controller
{

      public function __construct()
      {

        $this->middleware('auth');  // necesita autenticacion para todos los metodos.
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.show')->only('show');
        $this->middleware('can:roles.create')->only('create','store');
        $this->middleware('can:roles.edit')->only('edit','update');
        $this->middleware('can:roles.desroy')->only('desroy');

      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
      $roles = Role::orderBy('created_at','DESC')->paginate(10);   // no puedo usar el mismo nombre $roles para variables callback como destroy o updata

      return view('Roles.index',compact('roles'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permisos = Permission::get();
      return view('Roles.create',['roles' => new Role],compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(saveRolRequest $request)
     {
          $rolCreado = Role::create( $request->validated() );
          // Log::info($request->get('list-roles'));  //  $prueba2 = array( 'roles.destroy' );
           $rolCreado->syncPermissions($request->get('list-permisos'));

      return redirect()->route('roles.index')->with('MensajeStatus', 'Rol Almacenado');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $roles = Role::findOrfail($id);     // no puedo usar el mismo nombre $roles para variables callback como destroy o updata
      return view('Roles.show',['roles' => $roles]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $role = Role::findOrfail($id);
          //esta variable solo se usa en la vista ayudar a marcar los checkbox de permisos en el rol
          $currenPermisos =  $role -> permissions;
          $permisos = Permission::get();

      //condiciones para ayudar a marcar todos o ningun checkbox al cargar la pagina edit.
          if (strcmp($role->special, "all-access") == 0) {
            $currenPermisos = $permisos;
          }
          if (strcmp($role->special, "no-access") == 0) {
            $currenPermisos = null;
          }
      //Log::info($currenPermisos);
      //Log::info($permisos);

     return view('Roles.edit', compact('role','permisos','currenPermisos') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, saveRolRequest $request)
    {
         $role->update(  $request->validated() );  // update role basic (name,slug, description)

     //condiciones para almacenar correctamente lo permisos.
         if($request->get('customRadio') != null){//si radio existe, solo asigne radio y no se meta con la sincronizacion de permisos
             $role->special = $request->get('customRadio');
             $role->save();
         }else{  // si radio es vacio, special es null y sincronice los permisos (si los hay)
               if($request->get('list-permisos') != null){
                   $role->syncPermissions($request->get('list-permisos'));
               }
              $role->special = NULL;
              $role->save();
         }

      return redirect()->route('roles.show',['role' => $role])->with('MensajeStatus', 'Rol Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
      $role->delete();  //pendiente con el nombre de la variable $roles no funcionada no se porque
      return redirect()->route('roles.index')->with('MensajeStatus' , 'Rol Eliminado');
    }
}

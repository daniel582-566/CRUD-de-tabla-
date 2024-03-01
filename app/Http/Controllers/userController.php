<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\saveUserRequest;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Validation\Rule;
      use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\Gate;



class userController extends Controller
{

  public function __construct()
  {
    // EJERCICIO $this->middleware('edad')->only('destroy'); //solo los mayores de edad pueden Eliminar

//Primero autorizados? definir accesos libre-invitados
    $this->middleware('auth'); // invitados solo pueden ver
//luego. definir los permisos
    $this->middleware('can:users.index')->only('index');
    $this->middleware('can:users.show')->only('show');
    // $this->middleware('can:users.create')->only('create','store');  usuario no crea usuaros, Se hace por el modulo de Registro
    $this->middleware('can:users.edit')->only('edit','update');
    $this->middleware('can:users.desroy')->only('desroy');

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::orderBy('created_at','DESC')->paginate(10);   // no puedo usar el mismo nombre $users para variables callback como destroy o updata

     return view('User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //  return view('users.create',['user' => new User]);  usuario no crea usuaros, Se hace por el modulo de Registro

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //  usuario no crea usuaros, Se hace por el modulo de Registro
    //  Project:: create( $request->validated() );
    //  return redirect()->route('users.index')->with('MensajeStatus', 'Usuario Almacenado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $users = User::findOrfail($id);     // no puedo usar el mismo nombre $users para variables callback como destroy o updata
      $currenRoles = $users->roles;
    //  Log::info($users->roles);

      return view('User.show',['user' => $users],['currenRoles' => $currenRoles]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        $currenRoles = $user->roles;
        $roles = Role::get();

      return view('User.edit', compact('user','roles','currenRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, saveUserRequest $request)  //no puedo  usar "$users" no se porque
    {  //cada usuario se debe poder editar asi mismom no los demass?
        $user->update(  $request->validated() );  // update usuario
        $user->syncRoles($request->get('list-roles'));  // update role de usuario ver documentacion chinobi

        return redirect()->route('users.show',['user' => $user])->with('MensajeStatus', 'Usuario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)  ////no puedo  usar "$users" no se porque
    {

      $user->delete();  //pendiente con el nombre de la variable $users no funcionada no se porque
    //  Project::destroy($id);
      return redirect()->route('users.index')->with('MensajeStatus' , 'Usuario Eliminado');
    }
}

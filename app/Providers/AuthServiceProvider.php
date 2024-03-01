<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       //ESTOS EJEMPLOS SON POSIBLES SI DEFINO ROLE en la TABLA DE usuarios. quedo obsoleto tras usar paquete CHENOBI
       //isADMIN tiene rastros en ProjectController SHOW. y views/projects/index.blade.php

                            /* @can ('solo-admin-show-project-3', $projectsItem->id)
                                  <li>  <a href="">  </a></li>
                             @else
                                @guest
                                  @if ($projectsItem->id == 3)
                                    <li> Prohibido</li>
                                  @endif
                                   <li>  <a href="">  </a></li>
                                @else
                                  <li>Prohibido</li>
                                @endguest
                           @endcan

      Gate::define('isAdmin',function ($user,$project){return $user->role == "3";});  // Solo admin pueden editar
      Log::info(auth());

        Gate::define('solo-admin-show-project-3',function ($user,$projectId){   //solo admin puede ver project 3
            if ( $user->role != "3" && $projectId == "3") {
                  return false; // call denies redireccionar
            }
               return true;
         });  */
    }
}

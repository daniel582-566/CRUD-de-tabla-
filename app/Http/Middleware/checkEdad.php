<?php

namespace App\Http\Middleware;

use Closure;

class checkEdad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      //meddleware personalizado
      if (intval($request->user()->edad) <= 18) {
      // No se puede obtener elcuerpo del mensaje "rescurso" porque esta encryptado  implode( ", ", $request->all())
      //solo se puede obtener el id del recurso que esta en la url()

        return redirect()->route("projects.index")->with("MensajeStatus","Usuario Menor de Edad No Permitido Eliminar");

      }
      return $next($request);

    }
}

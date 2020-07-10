<?php

namespace App\Http\Middleware;

use Closure;

class checkPatientData
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
        $user = $request->user() ;
        if ($user && $user->hasRole('patient') &&  is_null($user->typeable_id)) {
            return redirect('/profile/edit');
        }

        return $next($request);
    }
}

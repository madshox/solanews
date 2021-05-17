<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if($user){
            if(!$user->isAdmin()) {
                session()->flash('danger', 'У вас не достаточно прав');
                return redirect()->route('index');
            }
        }else {
            session()->flash('warning', 'Требуется авторизация');
            return redirect()->route('index');
        }

        return $next($request);
    }
}

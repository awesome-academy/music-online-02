<?php

namespace App\Http\Middleware;

use Closure;

class Locale
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
        $lang = \Session::get('language', config('app.locale')); //lay lang, neu k co lay o config
        \App::setlocale($lang);

        return $next($request);
    }
}

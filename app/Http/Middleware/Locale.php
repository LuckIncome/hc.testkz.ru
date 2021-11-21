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
        $current = session()->get('locale');

        if (in_array($current, config('voyager.multilingual.locales'))) {
            $locale = $current;
        } else {
            $locale = config('voyager.multilingual.default');
            session()->put('locale', $locale);
        }

        app()->setLocale($locale);
        \Carbon\Carbon::setLocale($locale);

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class payingCustomer
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
        if ($request->user() && ! $request->user()->subscribed('cashiers')) {
            // This user is not a paying customer...
            return redirect('subscribe');
        }

        return $next($request);
    }
}


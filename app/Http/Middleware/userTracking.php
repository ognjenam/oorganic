<?php

namespace App\Http\Middleware;

use Closure;


class userTracking
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

      $user = session() -> has('user') ? session() -> get('user') -> username : 'Guest';
      $page = url() -> current();
      \Log::info('\t' . $user . '\t'. $page . '\tDate:' . '\t' . date('Y-m-d H:i:s') . '\t' . 'IP adress: ' . '\t'. \Request::ip()."\\n");
      return $next($request);
    }
}

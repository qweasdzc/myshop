<?php

namespace App\Http\Middleware;

use Closure;

class Goods
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
        // $now=strtotime("now");
        // // dd($now);
        //   $start=strtotime("9:00:00");
        //   $end=strtotime('12:00:00');
        //      // dd($start.'<br>'.$now.'</br>'.$end);
        //  if($start>$now || $now>$end){
        //        return redirect('/goods/list');
        //  }
         // echo "zhangyingjie";
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class checkSwearing
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
        $swear = $request->get("content");
        $swearWords = ['hate', 'idiot', 'stupid'];
        foreach($swearWords as $word){
            if (strpos($swear, $word) !== false) {
                return response(view("comments.forbidden-comment"));
            }
        }
        return $next($request);
    }
}

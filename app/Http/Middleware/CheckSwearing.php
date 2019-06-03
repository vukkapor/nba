<?php

namespace App\Http\Middleware;

use Closure;

class CheckSwearing
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
        $content = $request->get("content");
        $swearWords = ['hate', 'idiot', 'stupid'];
        foreach($swearWords as $word){
            if (strpos($content, $word) !== false) {
                return response(view("comments.forbidden-comment"));
            }
        }

        return $next($request);
    }
}

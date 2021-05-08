<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JobSaveRequest
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
        $new_input['file'] = $request->file;
        $new_input['item'] = json_decode(request()->item, true);
        $request->replace($new_input);
        return $next($request);
    }
}

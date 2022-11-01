<?php

namespace App\Http\Middleware;

use App\Models\Token;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class has_token
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = Token::count();
        if($token == 0 )
        {
            $token = Token::create([
                'token' => '$2y$10$T2yzviuy7cYIbTEECRVm7uwQp4Oq6WPhvkQJ54tReTyk8EMwKym46',
            ]);
        }
        $tokenValid = DB::table('tokens')->where('token', $request->header('Authorization'))->exists();
        if (!$tokenValid) {
            return response()->json('Unauthorized', 401);
        }

        return $next($request);
    }
}

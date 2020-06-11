<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DynamicDatabaseConnection
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
        $user = Auth::user();
        if(!is_null($user)){
            $connection = json_decode($user->account->connection);
            $db = "z".$user->environment."".$connection->db_name."_".$user->account_id;

            Config::set('database.connections.dynamic.database', $db);
            DB::purge('dynamic');
            //DB::reconnect('dynamic');

            return $next($request);
        } else {
            return response()->json(["error"=>"Non authorized"],401);
        }

    }
}

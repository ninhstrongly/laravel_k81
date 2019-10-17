<?php

namespace App\Http\Middleware;
use App\Model\{Users,Role};
use Closure;
use DB;
use Illuminate\Support\Facades\Auth;
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$per = null)
    {   
        $ListRoleOrUser = Users::find(Auth()->id())->roles()->select('role.permission')->pluck('permission')->toarray();
        foreach($ListRoleOrUser as $row){
            $arr = json_decode($row);
            if (in_array($per,$arr)) {
                return $next($request);
            }
        } 
        return abort(401);
    }
}


<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Facades\Route;

class CheckPrivilege
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
        $group_id = Session::get('group_id');
            
        $count_privilege = Group::find($group_id)->privilege()->count();
        
        if ($count_privilege > 0) {

            $data_privilege = Group::find($group_id)->privilege()->get();

            foreach ($data_privilege as $priv) {

                $list_privilege[] = $priv->name . '_' . strtolower($priv->type);

                if (!in_array($priv->name, $list_privilege)) {
                    $list_privilege[] = $priv->name;
                }
            }

            Session::forget('privilege');

            $request->session()->put('privilege', $list_privilege);
        }
        else{

            return redirect('/signin');
        }

        $route_name = Route::currentRouteName();

        //return response($route_name);

        if (in_array($route_name, $list_privilege)) {
                
            return $next($request);
        }
        else{

            //return $next($request);
            //return response($route_name);
            return redirect('/signout_process');
        }    
    }
}

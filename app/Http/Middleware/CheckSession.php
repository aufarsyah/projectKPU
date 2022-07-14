<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class CheckSession
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
        $email = Session::get('email');

        //return response($email);

        if (empty($email)) {

            //dd(session()->all());
            return redirect('/signin');
        
        } else {

            //refresh privilege
            $user_id = Session::get('user_id');
            $group_id = Session::get('group_id');

            $data_user = User::select(
                            'users.*', 
                            'group.name as group_name')
                        ->join('group', 'group.id', '=', 'group_id')
                        ->where('users.id', '=', $user_id)->first();

            $user_id = $data_user->id;
            $username = $data_user->username;
            $email = $data_user->email;
            $employee_number = $data_user->employee_number;
            $first_name = $data_user->first_name;
            $last_name = $data_user->last_name;
            $group_id = $data_user->group_id;
            $group_name = $data_user->group_name;

            session([
                    'user_id'           => $user_id,
                    'group_id'          => $group_id,
                    'group_name'        => $group_name,
                    'first_name'        => $first_name,
                    'last_name'         => $last_name,
                    'email'             => $email,
                    'username'          => $username,
                    'employee_number'   => $employee_number
                ]);
                
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

                return $next($request);  
            }
            else{

                return redirect('/signin');
            }
        }
    }
}

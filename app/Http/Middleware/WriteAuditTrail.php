<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Route;

class WriteAuditTrail
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
        //return $next($request);

        $response = $next($request);
        // $response->headers->remove('Cache-Control');
        // $response->headers->remove('Content-Type');
        // $response->headers->remove('Date');
        // $response->header('Cache-Control', 'no-cache, must-revalidate');

        $method   = $request->method();
        $path     = $request->path();
        $arr_path = explode('/', $path);
        $object   = $arr_path[0];

        $activity = $method . ' ' . $path;
        $details    = '';

        if (Session::has('username')) {
            
            $username = Session::get('username');

            if ($request->isMethod('get')) {
                
                $details = 'Access ' . $object . ' menu';
            }
            else{

                $data = $request->all();

                foreach ($data as $key => $value) {
                    
                    if ($key != '_method' && $key != '_token') {
                        
                        $details .= $key . ' : ' . $value . '<br>';
                    }
                }

            }

            if ($request->isMethod('get') && count($arr_path) > 1) {
                // do nothing
            }
            else{
                
                $create_data = AuditTrail::create([
                    'username' => $username,
                    'activity' => $activity,
                    'details'  => $details
                ]);
            }
                
        }

        return $response;
    }
}

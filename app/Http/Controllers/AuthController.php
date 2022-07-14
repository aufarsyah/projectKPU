<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Group;
use App\Models\Privilege;
use App\Models\TranPrivilegeGroup;
use App\Models\AuditTrail;
use Session;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function show_token() {
        echo csrf_token(); 
    }

    public function signin_page(Request $request)
    {
        //$request->session()->flush();

    	return view('signin');
    }

    public function signup_page()
    {
        return view('signup');
    }

    public function signout_process(Request $request)
    {
        $request->session()->flush();

        return redirect('/signin');
    }

    public function signin_process(Request $request)
    {
        // $email = $request->email;
    	$user_login_data = $request->user_login_data;
    	$password = $request->password;

    	$check_data = User::where('employee_number', $user_login_data)->orWhere('username', $user_login_data)->exists();

    	if ($check_data == 1) {
    		
    		$data_user = User::select(
                            'users.*', 
                            'group.name as group_name')
                        ->join('group', 'group.id', '=', 'group_id')
                        ->where('employee_number', $user_login_data)
                        ->orWhere('username', $user_login_data)
                        ->first();

            $password_hashed = $data_user->password;
            $user_id = $data_user->id;
            $email = $data_user->email;
            $employee_number = $data_user->employee_number;
            $first_name = $data_user->first_name;
            $last_name = $data_user->last_name;
            $group_id = $data_user->group_id;
    		$group_name = $data_user->group_name;

    		$check = Hash::check($password, $password_hashed);

    		if ($check) {

                $check_privilege = Group::find($group_id)->privilege()->count();

                if ($check_privilege > 0) {

                    $data_privilege = Group::find($group_id)->privilege()->get();

                    foreach ($data_privilege as $priv) {

                        $list_privilege[] = $priv->name . '_' . strtolower($priv->type);

                        if (!in_array($priv->name, $list_privilege)) {
                            $list_privilege[] = $priv->name;
                        }
                    }
                }
                // else{

                //     return redirect('/signin');
                // }

                session([
                    'user_id'           => $data_user->id,
                    'group_id'          => $group_id,
                    'group_name'        => $group_name,
                    'first_name'        => $data_user->first_name,
                    'last_name'         => $data_user->last_name,
                    'email'             => $data_user->email,
                    'username'          => $data_user->username,
                    'employee_number'   => $data_user->employee_number,
                    'privilege'         => $list_privilege
                ]);

                $audit_trail = AuditTrail::create([
                    'username' => $data_user->username,
                    'activity' => 'Sign in',
                    'details' => 'Sign in success'
                ]);

    			$data['result'] = 'success';
                $data['message'] = 'Sign-in success! Redirecting...';

                return response($data);

    		} else {

                $audit_trail = AuditTrail::create([
                    'username' => $data_user->username,
                    'activity' => 'Sign in',
                    'details' => 'Sign in failed, wrong email or password'
                ]);

    			$data['result'] = 'failed';
                $data['message'] = 'Wrong email or password!';

                return response($data);
    		}

    	} else {

            $audit_trail = AuditTrail::create([
                'username' => $user_login_data,
                'activity' => 'Sign in',
                'details' => 'Sign in failed, user not found'
            ]);
    		
    		$data['result'] = 'failed';
            $data['message'] = 'Wrong email or password!';

            return response($data);
    	}

    	$data['result'] = 'failed';
        $data['message'] = 'Wrong email or password!';

        return response($data);
    }

    public function signup_process(Request $request)
    {
        $employee_number    = $request->employee_number;
        $first_name         = $request->first_name;
        $last_name          = $request->last_name;
        $email              = $request->email;
        $phone              = $request->phone;
        $birth_of_date      = $request->birth_of_date;
        $address            = $request->address;
        $area_id            = $request->area_id;
        $division_id        = $request->division_id;
        $password           = $request->password;
        $message            = '';

        $check_data = User::where('email', $email)->exists();

        if ($check_data > 0) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Email already registered!';

            // return redirect('/signup')->with($message);

        } else {

            $group_data = Group::where('name', 'Employee')->first();
            $group_id = $group_data->id;

            $insert_user = User::create([
                'employee_number'   => $employee_number,
                'first_name'        => $first_name,
                'last_name'         => $last_name,
                'email'             => $email,
                'phone'             => $phone,
                'birth_of_date'     => $birth_of_date,
                'address'           => $address,
                'area_id'           => $area_id,
                'division_id'       => $division_id,
                'group_id'          => $group_id,
                'password'          => Hash::make($password)
            ]);

            if ($insert_user) {

                $data['result'] = 'success';
                $data['message'] = 'Congrats! Data has been created in the database!';
            }
            else{

                $data['result'] = 'failed';
                $data['message'] = 'Something when wrong, please contact administrator';

            }
        }

        return response($data);
    }
}

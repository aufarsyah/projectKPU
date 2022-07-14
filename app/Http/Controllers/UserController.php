<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function option($id)
    {
        $data_user = User::find($id);

        $group_name = $data_user->group->name;

        if ($group_name == 'Superadmin') {
            
            $data_user = User::select('id','first_name','last_name','email')->where('id', '<>', $id)->get();

            // $data_absen = Attendance::load('user');
            // $data_absen = Attendance::All()->load('user');
            // $data_absen = Attendance::All()->fresh('user');
            //$data_absen = Attendance::All();
        }
        else {

            $data_user = User::find($id)->get();
        }

        return response($data_user);
    }

    public function show($id)
    {

        //$data_user = User::find($id);

        //$group_name = $data_user->group->name;

        if ($id == 'all') {
            
            $data_user = User::select(
                            'users.*', 
                            'group.name as group_name')
                        ->join('group', 'group.id', '=', 'group_id')->get();

            // $data_absen = Attendance::load('user');
            // $data_absen = Attendance::All()->load('user');
            // $data_absen = Attendance::All()->fresh('user');
            //$data_absen = Attendance::All();
        }
        else {

            $data_user = User::select(
                            'users.*', 
                            'group.name as group_name')
                        ->join('group', 'group.id', '=', 'group_id')
                        ->where('users.id', '=', $id)->get();
        }

        return response($data_user);
    }

    public function store(Request $request)
    {
        $employee_number = $request->employee_number;
        $username        = $request->username;
        $first_name      = $request->first_name;
        $last_name       = $request->last_name;
        $email           = $request->email;
        $phone           = $request->phone;
        $birth_of_date   = $request->birth_of_date;
        $address         = $request->address;
        $group_id        = $request->group_id;
        $password        = $request->password;
        $message         = '';

        $check_data = User::where('email', $email)->exists();
        $check_data_2 = User::where('employee_number', $employee_number)->exists();
        $check_data_3 = User::where('username', $username)->exists();

        
        if ($check_data > 0) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Email already registered!';

            // return redirect('/signup')->with($message);

        } else if ($check_data_2 > 0) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Employee number already exists!';

            // return redirect('/signup')->with($message);

        } else if ($check_data_3 > 0) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Username already exists!';

            // return redirect('/signup')->with($message);

        } else {

            $create_data = User::create([
                'employee_number'   => $employee_number,
                'username'          => $username,
                'first_name'        => $first_name,
                'last_name'         => $last_name,
                'email'             => $email,
                'phone'             => $phone,
                'birth_of_date'     => $birth_of_date,
                'address'           => $address,
                'group_id'          => $group_id,
                'password'          => Hash::make($password)
            ]);

            if ($create_data) {

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

    public function update(Request $request, $id)
    {
        $first_name     = $request->first_name;
        $last_name      = $request->last_name;
        $email          = $request->email;
        $phone          = $request->phone;
        $birth_of_date  = $request->birth_of_date;
        $address        = $request->address;
        $group_id       = $request->group_id;
        $password       = $request->password;
        $message        = '';

        $check_data = User::where('email', $email)->exists();

        if ($check_data > 1) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Email already exists!';

        } else {

            if ($password == '' || $password == null) {
                
                $update_data = User::where('id', $id)->update([
                    'first_name'    => $first_name,
                    'last_name'     => $last_name,
                    'email'         => $email,
                    'phone'         => $phone,
                    'birth_of_date' => $birth_of_date,
                    'address'       => $address,
                    'group_id'      => $group_id
                ]);
            }
            else{

                $update_data = User::where('id', $id)->update([
                    'first_name'    => $first_name,
                    'last_name'     => $last_name,
                    'email'         => $email,
                    'phone'         => $phone,
                    'birth_of_date' => $birth_of_date,
                    'address'       => $address,
                    'group_id'      => $group_id,
                    'password'      => Hash::make($password)
                ]);
            }

            if ($update_data) {

                $data['result'] = 'success';
                $data['message'] = 'Congrats! Data has been updated in the database!';
            }
            else{

                $data['result'] = 'failed';
                $data['message'] = 'Something when wrong, please contact administrator';

            }
        }

        return response($data);
    }

    public function destroy($id)
    {
        $delete_data = User::find($id)->delete();

        if ($delete_data) {

            $data['result'] = 'success';
            $data['message'] = 'Congrats! Data has been deleted from the database!';
        }
        else{

            $data['result'] = 'failed';
            $data['message'] = 'Something when wrong, please contact administrator';

        }

        return response($data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\TranPrivilegeGroup;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('group');
    }

    public function option($id)
    {
    
        if ($id == 'all') {
            
            $data_group = Group::select('id','name')->get();
        }
        else {

            $data_group = User::find($id)->get();
        }

        return response($data_group);
    }

    public function show($id)
    {
        if ($id == 'all') {
            
            $data_group = Group::get();
        }
        else if ($id == 'signup') {
            
            $data_group = Group::where('name', '<>', 'Superadmin')->get();
        }
        else{

            $data_group = Group::find($id)->get();
        }

        return response($data_group);
    }

    public function store(Request $request)
    {
        $name            = $request->name;
        $description     = $request->description;
        $message         = '';

        if (strlen($request->privilege) > 0) {
            
            $privilege = explode(',', $request->privilege);
        }
        else{

            $privilege = null;
        }

        $check_data = Group::where('name', $name)->exists();
        
        if ($check_data > 0) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Group name already exists!';

            // return redirect('/signup')->with($message);

        } else {

            $create_data = Group::create([
                'name'          => $name,
                'description'   => $description
            ]);

            $create_data->save();
            $group_id = $create_data->id;

            if (!empty($privilege)) {
                
                foreach ($privilege as $key => $value) {
                    
                    $create_data = TranPrivilegeGroup::create([
                        'group_id'      => $group_id,
                        'privilege_id'  => $value
                    ]);
                }
            }

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
        $name            = $request->name;
        $description     = $request->description;
        $privilege       = explode(',', $request->privilege);
        $message        = '';

        $session_group_id = $request->session()->get('group_id');

        $check_data = Group::where('name', $name)->exists();

        if ($check_data > 1) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Group name already exists!';

        } else {

            $update_process = Group::where('id', $id)->update([
                    'name'          => $name,
                    'description'   => $description
                ]);

            $update_process = TranPrivilegeGroup::where('group_id', $id)->delete();

            if (!empty($privilege)) {
                
                foreach ($privilege as $key => $value) {
                    
                    $update_data = TranPrivilegeGroup::create([
                        'group_id'      => $id,
                        'privilege_id'  => $value
                    ]);
                }
            }

            if ($update_process) {

                if ($session_group_id == $id) {
                    session(['group_name' => $name]);
                }

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
        $delete_data = TranPrivilegeGroup::where('group_id', $id)->delete();

        $delete_data = Group::find($id)->delete();

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

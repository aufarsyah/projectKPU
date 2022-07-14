<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Privilege;
use App\Models\TranPrivilegeGroup;

class PrivilegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('area');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == 'all') {
            
            $data_privilege = Privilege::get();
        }
        else{

            $data_privilege = Privilege::select('privilege.*')
            ->join('tran_privilege_group', 'tran_privilege_group.privilege_id', '=', 'id')
            ->join('group', 'group.id', '=', 'tran_privilege_group.group_id')
            ->where('group_id', '=', $id)
            ->get();
        }

        return response($data_privilege);
    }

    public function option($id)
    {
        if ($id == 'all') {
            
            $data_privilege = Privilege::select('id', 'name', 'label', 'type')->get();
        }
        else{

            $data_privilege = TranPrivilegeGroup::select('group_id', 'privilege_id')->where('group_id', '=', $id)->get();
        }

        return response($data_privilege);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}

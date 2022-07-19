<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PPWP2019;
use App\Models\Provinsi;
use App\Models\KabKota;

class GrafikPPWPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grafik_ppwp');
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
        
    }

    public function data_provinsi(Request $request)
    {
        $provinsi_name  = $request->provinsi_name;
        $message        = '';

        try {

            $get_data = PPWP2019::select('nama_kab', 'nomor_01', 'nomor_02')->where('nama_prov', $provinsi_name)->get();
            
            if (!empty($get_data)) {

                $data['result'] = 'success';
                $data['data'] = $get_data;
            }
            else{

                $data['result'] = 'failed';
                $data['message'] = 'Data empty';

            }
            
        } catch (Exception $e) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Something when wrong, please contact administrator';
        }


        return response($data);
    }

    public function data_kabkota(Request $request)
    {
        $provinsi_name  = $request->provinsi_name;
        $kabkota_name  = $request->kabkota_name;
        $message        = '';

        try {

            $get_data = PPWP2019::select('nama_kab', 'nomor_01', 'nomor_02')
                        ->where('nama_prov', $provinsi_name)
                        ->where('nama_kab', $kabkota_name)->get();
            
            if (!empty($get_data)) {

                $data['result'] = 'success';
                $data['data'] = $get_data;
            }
            else{

                $data['result'] = 'failed';
                $data['message'] = 'Data empty';

            }
            
        } catch (Exception $e) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Something when wrong, please contact administrator';
        }


        return response($data);
    }

    public function option_provinsi($nama)
    {
        if ($nama == 'all') {
            
            $select_data = PPWP2019::distinct()->get(['nama_prov']);
        }
        else {

            $select_data = PPWP2019::distinct()->get(['nama_prov'])->where('nama_prov', '=', $nama);
        }

        return response($select_data);
    }

    public function option_kabkota($nama)
    {
        if ($nama == 'all') {
            
            $select_data = PPWP2019::distinct()->get(['nama_kab']);
        }
        else {

            $select_data = PPWP2019::select('nama_kab')->where('nama_prov', '=', $nama)->get();
        }

        return response($select_data);
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
        $institution_id = $request->institution_id;
        $sensors_id     = $request->sensors_id;
        $serial_number  = $request->serial_number;
        $expired_date   = $request->expired_date;
        $message        = '';

        try {

            $data_db = TranInstitutionSensors::find($id);
            
            $check_data = TranInstitutionSensors::where('institution_id', $institution_id)
                            ->where('sensors_id', $sensors_id)
                            ->where('serial_number', $serial_number)
                            ->where('expired_date', $expired_date)
                            ->exists();

            if ($check_data > 0) {
                
                $data['result'] = 'failed';
                $data['message'] = 'Data already exists!';

                return response($data);
            }

            $update_data = TranInstitutionSensors::where('id', $id)->update([
                'institution_id'    => $institution_id,
                'sensors_id'        => $sensors_id,
                'serial_number'     => $serial_number,
                'expired_date'      => $expired_date
            ]);

            if ($update_data) {

                $data['result'] = 'success';
                $data['message'] = 'Congrats! Data has been updated in the database!';
            }
            else{
                
                $data['result'] = 'success';
                $data['message'] = 'Success, but there is no changes!';
            }

            return response($data);

        } catch (Exception $e) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Something when wrong, please contact administrator';
            $data['error'] = $e;

            return response($data);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = TranInstitutionSensors::find($id)->delete();

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

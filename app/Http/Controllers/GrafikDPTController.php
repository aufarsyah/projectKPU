<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\DKIJakarta;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\TPS;

class GrafikDPTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grafik_dpt');
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
        $institution_id = $request->institution_id;
        $sensors_id     = $request->sensors_id;
        $serial_number  = $request->serial_number;
        $expired_date   = $request->expired_date;
        $message        = '';

        try {

            $check_data = TranInstitutionSensors::where('institution_id', $institution_id)
                            ->where('sensors_id', $sensors_id)
                            ->where('serial_number', $serial_number)
                            ->where('expired_date', $expired_date)
                            ->exists();
            
            if ($check_data > 0) {
                
                $data['result'] = 'failed';
                $data['message'] = 'Data already exists!';

            } else {

                $create_data = TranInstitutionSensors::create([
                    'institution_id'    => $institution_id,
                    'sensors_id'        => $sensors_id,
                    'serial_number'     => $serial_number,
                    'expired_date'      => $expired_date
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
            
        } catch (Exception $e) {
            
            $data['result'] = 'failed';
            $data['message'] = 'Something when wrong, please contact administrator';
        }


        return response($data);
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
            
            $select_data = TranInstitutionSensors::select(
                            'tran_institution_sensors.*', 
                            'institution.name as institution_name', 
                            'institution.location as institution_location', 
                            'institution.coordinate as coordinate', 
                            'sensors.name as sensors_name')
                        ->join('institution', 'institution.id', '=', 'institution_id')
                        ->join('sensors', 'sensors.id', '=', 'sensors_id')->get();
        }
        else{

            $select_data = TranInstitutionSensors::select(
                            'tran_institution_sensors.*', 
                            'institution.name as institution_name', 
                            'institution.location as institution_location', 
                            'institution.coordinate as coordinate', 
                            'sensors.name as sensors_name')
                        ->join('institution', 'institution.id', '=', 'institution_id')
                        ->join('sensors', 'sensors.id', '=', 'sensors_id')
                        ->where('institution_type_id', $id)
                        ->get();
        }

        return response($select_data);
    }

    public function data_gender(Request $request)
    {
        $level_select   = $request->level_select;
        $provinsi_name  = $request->provinsi_name;
        $kabkota_name   = $request->kabkota_name;
        $kecamatan_name = $request->kecamatan_name;
        $kelurahan_name = $request->kelurahan_name;
        $tps_name       = $request->tps_name;
        $message        = '';

        try {

            if ($level_select == 'provinsi') {
                
                if ($provinsi_name == 'Semua') {
                    
                    $get_data_total = DKIJakarta::count();

                    $get_data_man = DKIJakarta::where('jenis_kelamin', 'L')->count();
                }
                else{

                    $get_data_total = DKIJakarta::where('pro', $provinsi_name)->count();

                    $get_data_man = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('jenis_kelamin', 'L')
                                    ->count();
                }
            }
            else if ($level_select == 'kabkota') {
                
                if ($kabkota_name == 'Semua') {
                    
                    $get_data_total = DKIJakarta::where('pro', $provinsi_name)->count();

                    $get_data_man = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('jenis_kelamin', 'L')
                                    ->count();
                }
                else{

                    $get_data_total = DKIJakarta::where('pro', $provinsi_name)->where('kab', $kabkota_name)->count();

                    $get_data_man = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('jenis_kelamin', 'L')
                                    ->count();
                }
            }
            else if ($level_select == 'kecamatan') {
                
                if ($kecamatan_name == 'Semua') {
                    
                    $get_data_total = DKIJakarta::where('pro', $provinsi_name)->where('kab', $kabkota_name)->count();

                    $get_data_man = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('jenis_kelamin', 'L')
                                    ->count();
                }
                else{

                    $get_data_total = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('kec', $kecamatan_name)
                                    ->count();

                    $get_data_man = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('kec', $kecamatan_name)
                                    ->where('jenis_kelamin', 'L')
                                    ->count();
                }
            }
            else if ($level_select == 'kelurahan') {
                
                if ($kelurahan_name == 'Semua') {
                    
                    $get_data_total = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('kec', $kecamatan_name)
                                    ->count();

                    $get_data_man = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('kec', $kecamatan_name)
                                    ->where('jenis_kelamin', 'L')
                                    ->count();
                }
                else{

                    $get_data_total = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('kec', $kecamatan_name)
                                    ->where('kel', $kelurahan_name)
                                    ->count();

                    $get_data_man = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('kec', $kecamatan_name)
                                    ->where('kel', $kelurahan_name)
                                    ->where('jenis_kelamin', 'L')
                                    ->count();
                }
            }
            else if ($level_select == 'tps') {
                
                if ($tps_name == 'Semua') {
                    
                    $get_data_total = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('kec', $kecamatan_name)
                                    ->where('kel', $kelurahan_name)
                                    ->count();

                    $get_data_man = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('kec', $kecamatan_name)
                                    ->where('kel', $kelurahan_name)
                                    ->where('jenis_kelamin', 'L')
                                    ->count();
                }
                else{

                    $get_data_total = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('kec', $kecamatan_name)
                                    ->where('kel', $kelurahan_name)
                                    ->where('tps', $tps_name)
                                    ->count();

                    $get_data_man = DKIJakarta::where('pro', $provinsi_name)
                                    ->where('kab', $kabkota_name)
                                    ->where('kec', $kecamatan_name)
                                    ->where('kel', $kelurahan_name)
                                    ->where('tps', $tps_name)
                                    ->where('jenis_kelamin', 'L')
                                    ->count();
                }
            }
            
            if ($get_data_total > 0) {

                $get_data_woman = $get_data_total-$get_data_man;

                $data['result'] = 'success';
                $data['data_total'] = $get_data_total;
                $data['data_man'] = $get_data_man;
                $data['data_woman'] = $get_data_woman;
                $data['message'] = 'Congrats! Data has been created in the database!';
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

    public function option_provinsi($id)
    {
        if ($id == 'all') {
            
            $select_data = Provinsi::select('id','name')->get();
        }
        else {

            $select_data = Provinsi::select('id','name')->where('id', '=', $id)->get();
        }

        return response($select_data);
    }

    public function option_kabkota($id)
    {
        if ($id == 'all') {
            
            $select_data = KabKota::select('id','name')->get();
        }
        else {

            $select_data = KabKota::select('id','name')->where('provinsi_id', '=', $id)->get();
        }

        return response($select_data);
    }

    public function option_kecamatan($id)
    {
        if ($id == 'all') {
            
            $select_data = Kecamatan::select('id','name')->get();
        }
        else {

            $select_data = Kecamatan::select('id','name')->where('kabkota_id', '=', $id)->get();
        }

        return response($select_data);
    }

    public function option_kelurahan($id)
    {
        if ($id == 'all') {
            
            $select_data = Kelurahan::select('id','name')->get();
        }
        else {

            $select_data = Kelurahan::select('id','name')->where('kecamatan_id', '=', $id)->get();
        }

        return response($select_data);
    }

    public function option_tps($id)
    {
        if ($id == 'all') {
            
            $select_data = TPS::select('id','name')->get();
        }
        else {

            $select_data = TPS::select('id','name')->where('kelurahan_id', '=', $id)->get();
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

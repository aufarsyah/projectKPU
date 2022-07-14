<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keperluan;
use Illuminate\Support\Facades\Hash;

class PredefinedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //inserting keperluan
        $data_keperluan = [
        [
            "nama" => 'Dinas Luar'
        ],
        [
            "nama" => 'Haji / Umroh'
        ],
        [
            "nama" => 'Keperluan Lain'
        ]];   

        Keperluan::insert($data_keperluan);   
    }
}

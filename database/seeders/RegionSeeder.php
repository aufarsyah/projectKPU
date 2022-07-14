<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DKIJakarta;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\TPS;
use Illuminate\Support\Facades\Hash;

class RegionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//insert data provinsi
		$data_provinsi = DKIJakarta::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			$insert = Provinsi::insert([
				[
					"code" => $value['kd_pro'],
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = DKIJakarta::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			$insert = KabKota::insert([
				[
					"code" => $value['kd_kab'],
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = DKIJakarta::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			$insert = Kecamatan::insert([
				[
					"code" => $value['kd_kec'],
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = DKIJakarta::distinct()->get(['kec', 'kel']);
		foreach ($data_kelurahan as $key => $value) {
			
			$kecamatan_id = Kecamatan::where('name', $value['kec'])->first()->id;

			$insert = Kelurahan::insert([
				[
					"name" => $value['kel'],
					"kecamatan_id" => $kecamatan_id,
				]
			]);
		}

		//insert data tps
		$data_tps = DKIJakarta::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}
		
	}
}

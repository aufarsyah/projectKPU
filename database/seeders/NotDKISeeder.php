<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BALI;
use App\Models\BANTEN;
use App\Models\BENGKULU;
use App\Models\DIY;
use App\Models\GORONTALO;
use App\Models\JAMBI;
use App\Models\JAWA_BARAT;
use App\Models\JAWA_TENGAH;
use App\Models\JAWA_TIMUR;
use App\Models\KALIMANTAN_BARAT;
use App\Models\KALIMANTAN_SELATAN;
use App\Models\KALIMANTAN_TENGAH;
use App\Models\KALIMANTAN_TIMUR;
use App\Models\KALIMANTAN_UTARA;
use App\Models\KEP_BANGKA_BELITUNG;
use App\Models\KEP_RIAU;
use App\Models\LAMPUNG;
use App\Models\MALUKU;
use App\Models\MALUKU_UTARA;
use App\Models\NTB;
use App\Models\NTT;
use App\Models\PAPUA_BARAT;
use App\Models\RIAU;
use App\Models\SULAWESI_BARAT;
use App\Models\SULAWESI_SELATAN;
use App\Models\SULAWESI_TENGAH;
use App\Models\Provinsi;
use App\Models\KabKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\TPS;
use Illuminate\Support\Facades\Hash;

class NotDKISeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//BALI
		//insert data provinsi
		$data_provinsi = BALI::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = BALI::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = BALI::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = BALI::distinct()->get(['kec', 'kel']);
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
		$data_tps = BALI::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//BANTEN
		//insert data provinsi
		$data_provinsi = BANTEN::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = BANTEN::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = BANTEN::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = BANTEN::distinct()->get(['kec', 'kel']);
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
		$data_tps = BANTEN::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//BENGKULU
		//insert data provinsi
		$data_provinsi = BENGKULU::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = BENGKULU::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = BENGKULU::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = BENGKULU::distinct()->get(['kec', 'kel']);
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
		$data_tps = BENGKULU::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//DIY
		//insert data provinsi
		$data_provinsi = DIY::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = DIY::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = DIY::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = DIY::distinct()->get(['kec', 'kel']);
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
		$data_tps = DIY::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//GORONTALO
		//insert data provinsi
		$data_provinsi = GORONTALO::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = GORONTALO::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = GORONTALO::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = GORONTALO::distinct()->get(['kec', 'kel']);
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
		$data_tps = GORONTALO::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//JAMBI
		//insert data provinsi
		$data_provinsi = JAMBI::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = JAMBI::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = JAMBI::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = JAMBI::distinct()->get(['kec', 'kel']);
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
		$data_tps = JAMBI::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//JAWA_BARAT
		//insert data provinsi
		$data_provinsi = JAWA_BARAT::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = JAWA_BARAT::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = JAWA_BARAT::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = JAWA_BARAT::distinct()->get(['kec', 'kel']);
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
		$data_tps = JAWA_BARAT::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//JAWA_TENGAH
		//insert data provinsi
		$data_provinsi = JAWA_TENGAH::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = JAWA_TENGAH::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = JAWA_TENGAH::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = JAWA_TENGAH::distinct()->get(['kec', 'kel']);
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
		$data_tps = JAWA_TENGAH::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//JAWA_TIMUR
		//insert data provinsi
		$data_provinsi = JAWA_TIMUR::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = JAWA_TIMUR::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = JAWA_TIMUR::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = JAWA_TIMUR::distinct()->get(['kec', 'kel']);
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
		$data_tps = JAWA_TIMUR::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//KALIMANTAN_BARAT
		//insert data provinsi
		$data_provinsi = KALIMANTAN_BARAT::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = KALIMANTAN_BARAT::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = KALIMANTAN_BARAT::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = KALIMANTAN_BARAT::distinct()->get(['kec', 'kel']);
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
		$data_tps = KALIMANTAN_BARAT::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//KALIMANTAN_SELATAN
		//insert data provinsi
		$data_provinsi = KALIMANTAN_SELATAN::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = KALIMANTAN_SELATAN::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = KALIMANTAN_SELATAN::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = KALIMANTAN_SELATAN::distinct()->get(['kec', 'kel']);
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
		$data_tps = KALIMANTAN_SELATAN::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//KALIMANTAN_TENGAH
		//insert data provinsi
		$data_provinsi = KALIMANTAN_TENGAH::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = KALIMANTAN_TENGAH::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = KALIMANTAN_TENGAH::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = KALIMANTAN_TENGAH::distinct()->get(['kec', 'kel']);
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
		$data_tps = KALIMANTAN_TENGAH::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//KALIMANTAN_TIMUR
		//insert data provinsi
		$data_provinsi = KALIMANTAN_TIMUR::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = KALIMANTAN_TIMUR::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = KALIMANTAN_TIMUR::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = KALIMANTAN_TIMUR::distinct()->get(['kec', 'kel']);
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
		$data_tps = KALIMANTAN_TIMUR::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//KALIMANTAN_UTARA
		//insert data provinsi
		$data_provinsi = KALIMANTAN_UTARA::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = KALIMANTAN_UTARA::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = KALIMANTAN_UTARA::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = KALIMANTAN_UTARA::distinct()->get(['kec', 'kel']);
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
		$data_tps = KALIMANTAN_UTARA::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//KEP_BANGKA_BELITUNG
		//insert data provinsi
		$data_provinsi = KEP_BANGKA_BELITUNG::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = KEP_BANGKA_BELITUNG::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = KEP_BANGKA_BELITUNG::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = KEP_BANGKA_BELITUNG::distinct()->get(['kec', 'kel']);
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
		$data_tps = KEP_BANGKA_BELITUNG::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//KEP_RIAU
		//insert data provinsi
		$data_provinsi = KEP_RIAU::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = KEP_RIAU::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = KEP_RIAU::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = KEP_RIAU::distinct()->get(['kec', 'kel']);
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
		$data_tps = KEP_RIAU::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//LAMPUNG
		//insert data provinsi
		$data_provinsi = LAMPUNG::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = LAMPUNG::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = LAMPUNG::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = LAMPUNG::distinct()->get(['kec', 'kel']);
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
		$data_tps = LAMPUNG::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//MALUKU
		//insert data provinsi
		$data_provinsi = MALUKU::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = MALUKU::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = MALUKU::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = MALUKU::distinct()->get(['kec', 'kel']);
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
		$data_tps = MALUKU::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//MALUKU_UTARA
		//insert data provinsi
		$data_provinsi = MALUKU_UTARA::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = MALUKU_UTARA::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = MALUKU_UTARA::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = MALUKU_UTARA::distinct()->get(['kec', 'kel']);
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
		$data_tps = MALUKU_UTARA::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//NTB
		//insert data provinsi
		$data_provinsi = NTB::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = NTB::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = NTB::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = NTB::distinct()->get(['kec', 'kel']);
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
		$data_tps = NTB::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//NTT
		//insert data provinsi
		$data_provinsi = NTT::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = NTT::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = NTT::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = NTT::distinct()->get(['kec', 'kel']);
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
		$data_tps = NTT::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//PAPUA_BARAT
		//insert data provinsi
		$data_provinsi = PAPUA_BARAT::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = PAPUA_BARAT::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = PAPUA_BARAT::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = PAPUA_BARAT::distinct()->get(['kec', 'kel']);
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
		$data_tps = PAPUA_BARAT::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//RIAU
		//insert data provinsi
		$data_provinsi = RIAU::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = RIAU::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = RIAU::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = RIAU::distinct()->get(['kec', 'kel']);
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
		$data_tps = RIAU::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//SULAWESI_BARAT
		//insert data provinsi
		$data_provinsi = SULAWESI_BARAT::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = SULAWESI_BARAT::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = SULAWESI_BARAT::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = SULAWESI_BARAT::distinct()->get(['kec', 'kel']);
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
		$data_tps = SULAWESI_BARAT::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//SULAWESI_SELATAN
		//insert data provinsi
		$data_provinsi = SULAWESI_SELATAN::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = SULAWESI_SELATAN::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = SULAWESI_SELATAN::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = SULAWESI_SELATAN::distinct()->get(['kec', 'kel']);
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
		$data_tps = SULAWESI_SELATAN::distinct()->get(['kel', 'tps']);
		foreach ($data_tps as $key => $value) {
			
			$kelurahan_id = Kelurahan::where('name', $value['kel'])->first()->id;

			$insert = TPS::insert([
				[
					"name" => $value['tps'],
					"kelurahan_id" => $kelurahan_id,
				]
			]);
		}

		//SULAWESI_TENGAH
		//insert data provinsi
		$data_provinsi = SULAWESI_TENGAH::distinct()->get(['kd_pro', 'pro']);
		foreach ($data_provinsi as $key => $value) {
			
			if(is_null($value['kd_pro'])) $code = '-';
			else $code = $value['kd_pro'];

			$insert = Provinsi::insert([
				[
					"code" => $code,
					"name" => $value['pro']
				]
			]);
		}

		//insert data kabkota
		$data_kabkota = SULAWESI_TENGAH::distinct()->get(['pro', 'kd_kab', 'kab']);
		foreach ($data_kabkota as $key => $value) {
			
			$provinsi_id = Provinsi::where('name', $value['pro'])->first()->id;

			if(is_null($value['kd_kab'])) $code = '-';
			else $code = $value['kd_kab'];

			$insert = KabKota::insert([
				[
					"code" => $code,
					"name" => $value['kab'],
					"provinsi_id" => $provinsi_id,
				]
			]);
		}

		//insert data kecamatan
		$data_kecamatan = SULAWESI_TENGAH::distinct()->get(['kab', 'kd_kec', 'kec']);
		foreach ($data_kecamatan as $key => $value) {
			
			$kabkota_id = KabKota::where('name', $value['kab'])->first()->id;

			if(is_null($value['kd_kec'])) $code = '-';
			else $code = $value['kd_kec'];

			$insert = Kecamatan::insert([
				[
					"code" => $code,
					"name" => $value['kec'],
					"kabkota_id" => $kabkota_id,
				]
			]);
		}

		//insert data kelurahan
		$data_kelurahan = SULAWESI_TENGAH::distinct()->get(['kec', 'kel']);
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
		$data_tps = SULAWESI_TENGAH::distinct()->get(['kel', 'tps']);
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

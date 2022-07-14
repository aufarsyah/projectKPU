<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BANTEN extends Model
{
    use HasFactory;

    public $table = "BANTEN";

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nkk',
        'nik',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'kawin',
        'jenis_kelamin',
        'alamat',
        'rt',
        'rw',
        'difabel',
        'keterangan',
        'sumberdata',
        'tps',
        'kel_id',
        'kd_pro',
        'pro',
        'kd_kab',
        'kab',
        'kd_kec',
        'kec',
        'kel'
    ];
}

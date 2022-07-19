<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPWP2019 extends Model
{
    use HasFactory;

    public $table = "ppwp_2019";

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $casts = [
        'nomor_01' => 'integer',
        'nomor_02' => 'integer',
    ];

    protected $fillable = [
        'nama_prov',
        'nama_kab',
        'nomor_01',
        'nomor_02'
    ];
}

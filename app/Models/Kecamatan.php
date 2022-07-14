<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelurahan;
use App\Models\KabKota;

class Kecamatan extends Model
{
    use HasFactory;

    public $table = "kecamatan";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'kabkota_id',
    ];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function kabkota()
    {
        return $this->belongsTo(KabKota::class);
    }
}

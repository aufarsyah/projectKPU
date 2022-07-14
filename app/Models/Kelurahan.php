<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TPS;
use App\Models\Kecamatan;

class Kelurahan extends Model
{
    use HasFactory;

    public $table = "kelurahan";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'kecamatan_id',
    ];

    public function tps()
    {
        return $this->hasMany(TPS::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}

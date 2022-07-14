<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kecamatan;

class TPS extends Model
{
    use HasFactory;

    public $table = "TPS";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'kelurahan_id',
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}

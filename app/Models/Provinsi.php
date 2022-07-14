<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KabKota;

class Provinsi extends Model
{
    use HasFactory;

    public $table = "provinsi";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];

    public function kabkota()
    {
        return $this->hasMany(KabKota::class);
    }
}

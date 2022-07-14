<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Privilege extends Model
{
    use HasFactory;

    public $table = "privilege";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'type',
        'description',
    ];

    public function group()
    {
        return $this->belongsToMany(Group::class, 'tran_privilege_group');
    }
}

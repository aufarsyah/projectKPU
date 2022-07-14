<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Privilege;

class Group extends Model
{
    use HasFactory;

    public $table = "group";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function privilege()
    {
        return $this->belongsToMany(Privilege::class, 'tran_privilege_group');
    }
}

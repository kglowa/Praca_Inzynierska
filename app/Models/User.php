<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\HasRolesAndPermissions;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, hasRolesandPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
        'password',
        'departments_id',
        'positions_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function equipments(){
        return $this->hasMany(Equipment::class,'user_id','id');
    }
    public function departments(){

        return $this->belongsTo(Department::class,'departments_id','id');

    }
    public function positions(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(Position::class,'positions_id','id');

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'city',
        'location',
        'number',

    ];

    public function users(){
        return $this->hasMany(User::class,"departments_id","id");
    }
}

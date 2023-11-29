<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type',
    ];
    public function equipments(){
        return $this->hasMany(Equipment::class,"category_id","id");
    }
}

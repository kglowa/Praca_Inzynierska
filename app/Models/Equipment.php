<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mark',
        'model',
        'SerialNumber',
        'type',
        'user_id',
        'category_id'
    ];
    public function users(){

        return $this->belongsTo(User::class,'user_id','id');

    }
    public function categories(){

        return $this->belongsTo(Category::class,'category_id','id');

    }
}

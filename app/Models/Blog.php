<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    use HasFactory;
    public function categories(){
        return $this->belongsTo(category::class,'categoryId','id');
    }
    public function positions(){
        return $this->hasMany(Position::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    use HasFactory;
    public function blogs(){
        return $this->BelongsTo(Blog::class,'blogId','id');
    }
}

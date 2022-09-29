<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PDO;

class category extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    use HasFactory;
    public function blogs(){
        return $this->hasMany(Blog::class);
    }
    
}

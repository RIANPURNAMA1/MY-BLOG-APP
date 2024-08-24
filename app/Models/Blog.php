<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];
     // Post dimiliki oleh satu user
     public function user()
     {
         return $this->belongsTo(User::class);
     }
 
     // Post memiliki banyak komentar
     public function comments()
     {
         return $this->hasMany(Comment::class);
     }
}

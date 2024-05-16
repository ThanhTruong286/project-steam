<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developers extends Model
{
    use HasFactory;
    protected $table = 'developers';
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}

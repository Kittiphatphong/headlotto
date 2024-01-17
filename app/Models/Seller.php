<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable=['seller_id','name','phone','address'];

    public function sells(){
        return $this->hasMany(Sell::class,'seller_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categori;

class produc extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'categori_id',
        'ganbar'
    ];
 public function categoris()
 {
    return $this -> belongsTo(categori::class,'categori_id');
 }
}

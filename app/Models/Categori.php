<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\produc;

class Categori extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'gambar'
    ];
    public function producs()
    {
        return $this->hasMany(produc::class);
    }
}

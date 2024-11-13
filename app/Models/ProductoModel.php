<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    use HasFactory;
    protected $table="producto";
    protected $fillable=[
        "nombre","descripcion",
        "imagen","precio"
    ];

    protected $primaryKey="idProducto";
    public $timestamps=false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CompraModel extends Model
{
    use HasFactory;
    protected $table="compra";
    protected $fillable=[
        "nombre_producto","imagen",
        "precio","fechahora"
    ];

    protected $primaryKey="idcompra";
    public $timestamps=false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'orders';
    protected $fillable = [
        'codigo_cliente',
        'codigo_produto',
        'data_criacao'
    ];
    protected $dates = ['deleted_at'];
}

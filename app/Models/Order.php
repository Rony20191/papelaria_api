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
        'data_criacao'
    ];
    protected $dates = ['deleted_at'];
    protected $hidden = ['pivot'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'codigo_pedido', 'codigo_produto');
    }
    public function client()
    {
        return $this->belongsTo(Client::class,'codigo_cliente', 'id');
    }
}

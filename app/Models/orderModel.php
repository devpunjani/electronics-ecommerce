<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderModel extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $primaryKey="orderId";
    protected $fillable=[
        'userId',
        'productId',
        'orderDate',
        'address',
        'amount',
        'status'
    ];

    public function products(){
       return  $this->belongsTo(productModel::class,"productId","productId");
    }
}

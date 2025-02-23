<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlistModel extends Model
{
    use HasFactory;
    protected $table="wishlist";
    protected $primaryKey="wishlistId";
    protected $fillable=[
        'wishlistId',
        'userID',
        'productId'
    ];

    public function product(){
        return $this->hasOne(productModel::class,"productId","productId");
     }
}

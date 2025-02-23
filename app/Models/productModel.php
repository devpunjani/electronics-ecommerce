<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;

    protected $table="products";
    protected $primaryKey="productId";
    protected $fillable=[
        'categoryId',
        'name',
        'imagePath',
        'description',
        'price'
    ];

    public function category(){
       return  $this->belongsTo(categoryModel::class,"categoryId","categoryId");
    }
}

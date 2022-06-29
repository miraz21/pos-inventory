<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     protected $fillable = [
        'category_id',
        'productname_id',
        'price',
        'discount',
        'quantity',
        'companyname_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

      public function productname()
    {
        return $this->belongsTo(ProductName::class);
    }

      public function companyname()
    {
        return $this->belongsTo(CompanyName::class);
    }

        public function returnproduct()
    {
        return $this->belongsTo(ReturnProduct::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySale extends Model
{
    use HasFactory;

        protected $fillable = [
        'saleman_id',
        'product_id',
        'sale_amount',
        'due_amount',
        'quantity',
        'date',
        ];

    public function saleman()
    {
        return $this->belongsTo(SaleMan::class);
    }


     public function product()
    {
        return $this->belongsTo(Product::class);
    }



    //   public function brandname()
    // {
    //     return $this->belongsTo(BrandName::class);
    // }

    //      public function productcategory()
    // {
    //     return $this->belongsTo(ProductCategory::class);
    // }


}

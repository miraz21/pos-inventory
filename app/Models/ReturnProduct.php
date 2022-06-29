<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    use HasFactory;

       protected $fillable = [
        'saleman_id',
        'product_id',
        'quantity',
        'date',
        ];

   public function product()
    {
        return $this->belongsTo(Product::class);
    }

      public function saleman()
    {
        return $this->belongsTo(SaleMan::class);
    }

}

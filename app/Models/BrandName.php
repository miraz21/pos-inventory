<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandName extends Model
{
    use HasFactory;

     protected $fillable = [
      'title',
    ];

      public function dailysale()
    {
        return $this->hasMany(DailySale::class);
    }
}

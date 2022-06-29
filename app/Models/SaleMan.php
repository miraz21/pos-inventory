<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleMan extends Model
{
    use HasFactory;

        protected $fillable = [
             'name',
        ];

    public function dailysale()
    {
        return $this->hasMany(DailySale::class);
    }
}

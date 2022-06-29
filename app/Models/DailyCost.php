<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyCost extends Model
{
    use HasFactory;

             protected $fillable = [
              'marketing_id',
              'transfer',
              'oil',
              'lunch',
              'date',
            ];

    public function marketing()
    {
        return $this->belongsTo(Marketing::class);
    }
}

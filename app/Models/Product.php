<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

   
    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'quantity',
        
    ];

   
    protected $casts = [
        'price' => 'decimal:2',
    ];

  
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }


}

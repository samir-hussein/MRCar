<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'mark',
        'model',
        'color',
        'year',
        'tirm',
        'interior',
        'body',
        'price',
        'transmission',
        'seller_id',
        'desc',
        'img',
        'approved'
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}

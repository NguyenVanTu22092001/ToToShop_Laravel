<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $table = 'carts';
    protected $fillable=[
        'name', 'price', 'quantity', 'product_id', 'customer_id', 'collection_id', 'category_id'
    ];
    protected $primary='id';
}

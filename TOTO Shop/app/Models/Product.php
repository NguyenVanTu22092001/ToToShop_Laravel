<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'product';
    protected $fillable=[
        'title','slug', 'description','quantity', 'price', 'saleoff', 'category_id','collection_id','image', 'status'
    ];
    protected $primary='id';

    public function category_product(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    public function collection_product(){
        return $this->belongsTo('App\Models\Collection', 'collection_id');
    }
}

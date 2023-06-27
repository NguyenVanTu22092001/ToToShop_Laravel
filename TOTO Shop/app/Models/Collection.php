<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'collection';
    protected $fillable=[
        'title','slug', 'description', 'image', 'status'
    ];
    protected $primary='id';

    public function product_collection(){
        return $this->hasMany('App\Models\Product', 'collection_id', 'id');
    }
}

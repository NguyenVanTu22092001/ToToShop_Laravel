<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'slide';
    protected $fillable=[
        'title', 'description', 'image', 'status'
    ];
    protected $primary='id';
}

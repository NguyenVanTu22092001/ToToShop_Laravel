<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $table = 'contacts';
    protected $fillable=[
        'name', 'email', 'phone','subject', 'message', 'customer_id'
    ];
    protected $primary='id';
}

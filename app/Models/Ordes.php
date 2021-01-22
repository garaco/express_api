<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordes extends Model
{
    public $timestamps = false;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'direction_init', 
        'comment_init', 
        'location_init', 
        'direction_final', 
        'comment_final', 
        'location_final',
        'status', 
        'payment',
        'id_user'
    ];
}

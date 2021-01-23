<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    public $timestamps = false;
    protected $table = 'market';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_market', 
        'list',
        'payment',
        'direction',
        'location',
        'status',
        'id_user'
    ];
}

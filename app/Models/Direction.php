<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    public $timestamps = false;
    protected $table = 'direction';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user', 
        'direction',
        'location',
    ];
}

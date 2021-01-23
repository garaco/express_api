<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public $timestamps = false;
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = [
        'services', 
        'comment',
        'payment',
        'status',
        'id_user'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $timestamps = false;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'phone', 
        'email', 
        'name', 
        'surname', 
        'direction', 
        'location', 
        'token'
    ];
}

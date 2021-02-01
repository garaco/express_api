<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenModel extends Model
{
    public $timestamps = false;
    protected $table = 'user_firebase';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user', 
        'token_firebase'
    ];
}

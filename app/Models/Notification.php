<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $timestamps = false;
    protected $table = 'notificaction';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title', 
        'message',
        'id_user',
        'leido',
        'type'
    ];
}

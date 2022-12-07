<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role
{
    use HasApiTokens, Notifiable;

    protected $table = 'role'; 
    protected $primaryKey = 'id_role';
    public $timestamps = false;
}

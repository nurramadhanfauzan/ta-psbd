<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Element
{
    use HasApiTokens, Notifiable;

    protected $table = 'Element'; 
    protected $primaryKey = 'id_element';
    public $timestamps = false;
}

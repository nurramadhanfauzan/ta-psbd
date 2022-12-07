<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Hero
{
    use HasApiTokens, Notifiable;

    protected $table = 'hero'; 
    protected $primaryKey = 'id_hero';
    public $timestamps = false;
}

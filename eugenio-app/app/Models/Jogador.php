<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'Jogador';
    protected $primaryKey = 'PK_Jogador';
    public $timestamps = false;
}

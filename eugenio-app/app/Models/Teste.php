<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    protected $table = 'Teste';
    protected $primaryKey = 'PK_Teste';
    public $timestamps = false;
    
    public function jogador()
    {
        return $this->belongsTo(Jogador::class, 'FK_Jogador', 'PK_Jogador');
    }
    
    public function sessao()
    {
        return $this->belongsTo(Sessao::class, 'FK_Sessao', 'PK_Sessao');
    }
}
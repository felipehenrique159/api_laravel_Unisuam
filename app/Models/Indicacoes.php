<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicacoes extends Model
{
    use HasFactory;

    protected $connection ='pgsql';
    protected $table = "indicacoes";
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'status_id'
    ];

    public function getStatus()
    {
        return $this->hasOne(StatusIndicacao::class,'id','status_id');
    }

    

}

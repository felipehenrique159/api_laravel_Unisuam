<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusIndicacao extends Model
{
    use HasFactory;

    protected $connection ='pgsql';
    protected $table = "status_indicacao";
    public $timestamps = false;

    protected $fillable = [
        'descricao'
    ];


}

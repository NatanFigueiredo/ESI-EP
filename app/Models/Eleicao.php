<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleicao extends Model
{
    protected $fillable = ['data_inicio','data_fim','titulo','flag_status'];
}

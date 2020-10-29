<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapa extends Model
{
    protected $fillable = ['eleicao','nome','cargo','votos','flag_status'];
}

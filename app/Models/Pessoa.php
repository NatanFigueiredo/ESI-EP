<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nomecivil','nomesocial','rg','cpf','funcao','data_nasc','email','celular','flag_status'];
}

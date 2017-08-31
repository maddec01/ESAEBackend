<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'Eventos';
    protected $primaryKey = 'idEvento';
    protected $fillable = array('titleEvento', 'descricaoEvento', 'diaEvento');
    public $timestamps = true;
}

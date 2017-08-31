<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;

class Aviso extends Model
{
    protected $table = 'Avisos';
    protected $primaryKey = 'idAviso';
    protected $fillable = array('titleAviso', 'cursoAviso', 'textAviso');
    public $timestamps = true;
    
    public function cursoAviso() {
        return $this->belongsTo('App\Curso', 'idCurso');
    }
}

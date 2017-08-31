<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'Cursos';
    protected $primaryKey = 'idCurso';
    protected $fillable = array('nameCurso', 'tipoCurso', 'responsavelCurso', 'descricaoCurso');
    public $timestamps = true;
}

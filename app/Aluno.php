<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;

class Aluno extends Model
{
    protected $table = 'Alunos';
    protected $primaryKey = 'idAluno';
    protected $fillable = array('nameAluno', 'numeroAluno', 'cursoAluno', 'passwordAluno');
    public $timestamps = true;
    
    public function cursoAluno() {
        return $this->belongsTo('App\Curso', 'idCurso');
    }
}

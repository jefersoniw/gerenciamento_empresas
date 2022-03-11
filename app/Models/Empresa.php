<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'emp_empresa';

    protected $fillable = [
        'emp_nom_empresa',
        'emp_dti_atividade',
        'emp_dtf_atividade',
        'emp_especial'
    ];

    public function documento()
    {
        return $this->hasMany(Documento::class, 'doc_id_emp', 'id');
    }

    public function endereco()
    {
        return $this->hasMany(Endereco::class, 'end_id_emp', 'id');
    }
}

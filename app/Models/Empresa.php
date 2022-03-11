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
}

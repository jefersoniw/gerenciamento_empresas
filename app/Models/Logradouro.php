<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logradouro extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'log_logradouro';
    public $timestamps = false;

    protected $fillable = [
        'log_nom_logradouro',
        'log_num_cep',
        'log_id_bai'
    ];

    public function endereco()
    {
        return $this->hasMany(Endereco::class, 'end_id_log', 'id');
    }

    public function bairro()
    {
        return $this->belongsTo(Bairro::class, 'log_id_bai', 'id');
    }
}

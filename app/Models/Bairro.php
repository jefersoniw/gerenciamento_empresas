<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bairro extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bai_bairro';
    public $timestamps = false;

    protected $fillable = [
        'bai_nom_bairro'
    ];

    public function logradouro()
    {
        return $this->hasMany(Logradouro::class, 'log_id_bai', 'id');
    }
}

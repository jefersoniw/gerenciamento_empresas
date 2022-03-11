<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'end_endereco';
    public $timestamps = false;

    protected $fillable = [
        'end_num_numero',
        'end_nom_complemento',
        'end_num_lat',
        'end_num_log',
        'end_id_log',
        'end_id_emp'
    ];
}

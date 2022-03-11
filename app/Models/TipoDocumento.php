<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDocumento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tdo_tipo_documento';
    public $timestamps = false;

    protected $fillable = [
        'tdo_nom_tipo_documento'
    ];
}

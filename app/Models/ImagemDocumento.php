<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagemDocumento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'imd_imagem_documento';
    public $timestamps = false;
    protected $fillable = [
        'imd_nom_arquivo',
        'imd_arquivo',
        'imd_id_doc'
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'imd_id_doc', 'id');
    }
}

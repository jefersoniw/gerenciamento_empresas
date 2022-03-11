<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'doc_documento';
    protected $fillable = [
        'doc_num_documento',
        'doc_dat_cadastro',
        'doc_id_tdo',
        'doc_id_emp'
    ];

    public function imagem()
    {
        return $this->hasMany(ImagemDocumento::class, 'imd_id_doc', 'id');
    }
}

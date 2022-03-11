<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImdImagemDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imd_imagem_documento', function (Blueprint $table) {
            $table->id();
            $table->string('imd_nom_arquivo', 2000);
            $table->string('imd_arquivo');
            $table->foreignId('imd_id_doc')->constrained('doc_documento')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imd_imagem_documento');
    }
}

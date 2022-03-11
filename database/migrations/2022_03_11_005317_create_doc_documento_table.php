<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_documento', function (Blueprint $table) {
            $table->id();
            $table->string('doc_num_documento', 30);
            $table->date('doc_dat_cadastro');
            $table->foreignId('doc_id_tdo')->constrained('tdo_tipo_documento')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('doc_id_emp')->constrained('emp_empresa')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_documento');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogradourosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_logradouro', function (Blueprint $table) {
            $table->id();
            $table->string('log_nom_logradouro', 1000);
            $table->string('log_num_cep', 12);
            $table->foreignId('log_id_bai')->constrained('bai_bairro')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('log_logradouro');
    }
}

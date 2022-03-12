<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('end_endereco', function (Blueprint $table) {
            $table->id();
            $table->integer('end_num_numero');
            $table->string('end_nom_complemento', 500);
            $table->decimal('end_num_lat', 18, 12)->nullable();
            $table->decimal('end_num_long', 18, 12)->nullable();
            $table->foreignId('end_id_log')->constrained('log_logradouro')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('end_id_emp')->constrained('emp_empresa')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('end_endereco');
    }
}

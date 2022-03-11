<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_empresa', function (Blueprint $table) {
            $table->id();
            $table->string('emp_nom_empresa', 200)->unique();
            $table->date('emp_dti_atividade');
            $table->date('emp_dtf_atividade')->nullable();
            $table->boolean('emp_especial');
            $table->timestamps();
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
        Schema::dropIfExists('emp_empresa');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_academic_data', function (Blueprint $table) {
         
               $table->id();
                $table->string('nombres', 100);
                $table->string('apellidos', 100)->nullable();
                $table->date('fecha_nacimiento');
                $table->integer('cedula')->unique();
                $table->string('nro_telefonico', 50);
                $table->string('file_cedula', 200);
                $table->enum('profesion', ['Medico Cirujano', 'Licenciado en enfermeria', 'TSU en enfermeria', 'Licenciatura en Fisioterapia', 'Odontología', 'Medicina Veterinaria']);
                $table->string('file_titulo', 200)->nullable();
                $table->string('file_registro_prof', 200)->nullable();
                $table->string('file_cert_ozono', 200)->nullable();
                $table->string('file_notas_ozono', 200)->nullable();
                $table->string('file_pensum', 200)->nullable();
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
        Schema::dropIfExists('personal_academic_data');
    }
};

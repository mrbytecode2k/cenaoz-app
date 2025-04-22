<form action="{{ route('academic.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="profesion">Selecciona tu profesión:</label><br>
        
        <input type="checkbox" name="profesion[]" value="Medico Cirujano" id="medico_cirujano">
        <label for="medico_cirujano">Medico Cirujano</label><br>

        <input type="checkbox" name="profesion[]" value="Licenciado en enfermeria" id="licenciado_en_enfermeria">
        <label for="licenciado_en_enfermeria">Licenciado en enfermería</label><br>

        <input type="checkbox" name="profesion[]" value="TSU en enfermeria" id="tsu_en_enfermeria">
        <label for="tsu_en_enfermeria">TSU en enfermería</label><br>

        <input type="checkbox" name="profesion[]" value="Licenciatura en Fisioterapia" id="licenciatura_en_fisioterapia">
        <label for="licenciatura_en_fisioterapia">Licenciatura en Fisioterapia</label><br>

        <input type="checkbox" name="profesion[]" value="Odontología" id="odontologia">
        <label for="odontologia">Odontología</label><br>

        <input type="checkbox" name="profesion[]" value="Medicina Veterinaria" id="medicina_veterinaria">
        <label for="medicina_veterinaria">Medicina Veterinaria</label><br>
    </div>
    
    <div>
        <label for="file_titulo">Título de Pregrado (JPG, PDF, DOC):</label>
        <input type="file" name="file_titulo" id="file_titulo" required>
    </div>
    <div>
        <label for="file_registro_prof">Registro Profesional (JPG, PDF, DOC):</label>
        <input type="file" name="file_registro_prof" id="file_registro_prof" required>
    </div>
    <div>
        <label for="file_cert_ozono">Certificado de Ozonoterapia (JPG, PDF, DOC):</label>
        <input type="file" name="file_cert_ozono" id="file_cert_ozono" required>
    </div>
    <div>
        <label for="file_notas_ozono">Notas del Certificado de Ozonoterapia (Opcional) (JPG, PDF, DOC):</label>
        <input type="file" name="file_notas_ozono" id="file_notas_ozono">
    </div>
    <div>
        <label for="file_pensum">Pensum Académico (Opcional) (JPG, PDF, DOC):</label>
        <input type="file" name="file_pensum" id="file_pensum">
    </div>
    <button type="submit">Guardar Datos Académicos</button>
</form>
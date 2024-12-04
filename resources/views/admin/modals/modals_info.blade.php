<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Asignar fecha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario con dos inputs -->
                <form method="POST" action="{{ route('update.status.appointment') }}" id="form-appointment">

                    @csrf
                    <h6>Datos de dueño</h6>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="email" name="email" readonly>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="owner" name="owner" readonly>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="phone" name="phone" readonly>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="color" name="color" readonly>
                    </div>
                    <h6>Datos de mascota</h6>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="pets" name="pets" readonly>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="especie" name="especie" readonly>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="raza" name="raza" readonly>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="peso" name="peso" readonly>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="color" name="color" readonly>
                    </div>
                    <h6>Motivo de la cita</h6>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="id_appointment" name="id_appointment"
                            readonly>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control cleanable" id="consultation" name="consultation"
                            readonly>
                    </div>
                    <div class="modal-footer">
                        <!-- Botón de enviar -->
                        <button type="submit" class="btn btn-success" id="submitBtn">Actualizar el estado de la
                            cita</button>
                        <!-- Botón para cerrar el modal -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('submitBtn').addEventListener('click', function(event) {
        // Prevenir el envío del formulario al hacer clic
        event.preventDefault();

        // Selecciona todos los elementos con la clase 'cleanable'
        var fields = document.querySelectorAll('.cleanable');

        // Recorre cada campo de texto
        fields.forEach(function(field) {
            var text = field.value;
            // Limpia el texto eliminando lo que está antes del primer ':'
            var cleanedText = text.split(":")[1] ? text.split(":")[1].trim() : "";
            field.value = cleanedText; // Actualiza el valor del campo
        });

        // Desactiva el botón después de hacer clic
        const btnSubmit = document.getElementById('submitBtn');
        btnSubmit.disabled = true;

        // Enviar el formulario después de limpiar los campos (si es necesario)
        document.getElementById('form-appointment').submit();
        console.log('click');
    });
</script>

<!-- FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet" />

<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

<link rel="stylesheet" href="{{ asset('asset_admin/css/calendar.css') }}" />

<div id="calendarjs" style="width: 100%;"></div>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Asignar fecha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario con dos inputs -->
                <form method="POST" action="{{ route('admin.appointment.submit') }}" id="form-calendar">
                    @csrf
                    <div class="mb-3">
                        <label for="input2" class="form-label">Número de cita:</label>
                        <input type="text" class="form-control" id="id_appointment" name="id_appointment"
                            value="{{ $formData['id_appointment'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input2" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $formData['email'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input2" class="form-label">Dueño responsable:</label>
                        <input type="text" class="form-control" id="owner" name="owner"
                            value="{{ $formData['owner'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input2" class="form-label">Nombre de mascota:</label>
                        <input type="text" class="form-control" id="pets" name="pets"
                            value="{{ $formData['pets'] }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input2" class="form-label">Fecha y hora de inicio:</label>
                        <input type="text" class="form-control" id="startDate" name="startDate" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="input3" class="form-label">Fecha y hora de finalización:</label>
                        <input type="text" class="form-control" id="finalDate" name="finalDate" readonly>
                    </div>
                    <div class="modal-footer">
                        <!-- Botón de enviar -->
                        <button type="submit" class="btn btn-success" id="submitBtn">Guardar</button>
                        <!-- Botón para cerrar el modal -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let calendar;
    document.addEventListener('DOMContentLoaded', function() {

        const today = new Date(); // Toma le fecha actual
        const todayString = today.toISOString().split('T')[0]; // Esto da 'YYYY-MM-DD'
        console.log(todayString);

        if (calendar) {
            calendar.destroy(); // Destruye la instancia anterior
            return; // Si ya está inicializado, no hacer nada
        }

        if (!FullCalendar) {
            console.error("FullCalendar no se cargó correctamente.");
            return;
        }
        console.log("Calendario está a punto de inicializarse"); // Verifica si se ejecuta
        // Solo inicializamos y renderizamos el calendario una vez que se abre el modal
        const calendarEl = document.getElementById('calendarjs');

        if (!calendarEl) {
            console.error("No se encontró el contenedor del calendario.");
            return;
        }

        calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',
            initialView: 'timeGridWeek',
            slotMinTime: '08:00:00', // rango inicial de tiempo que mostrará el calendario
            slotMaxTime: '17:00:00', // rango inicial de tiempo que mostrará el calendario
            selectConstraint: {
                start: '08:00:00', // Hora de inicio permitida para la selección
                end: '17:00:00', // Hora de fin permitida para la selección
                duration: '01:00:00' // Duración máxima de la selección (30 minutos)
            },
            hiddenDays: [6, 0], // días que se ocultarán
            slotLabelInterval: '00:30:00', // Mostrar etiquetas cada hora para mayor claridad
            eventOverlap: false, // Evitar solapamientos
            selectMirror: true, // Previsualizar selección al arrastrar
            allDaySlot: false, // Para no mostrar la fila de todo el día
            expandRows: true, // Para expandir todas las filas en tal caso no ocupe toda la altur
            nowIndicator: true,
            unselectAuto: false, // Evita que se borre la selección si toco otra parte de la página web
            selectOverlap: false, // Evita que se pueda seleccionar periodos de tiempo ocupados
            eventLongPressDelay: 0, // Eliminar el retraso para arrastrar el evento
            selectLongPressDelay: 0, // Eliminar el retraso para seleccionar una fecha
            validRange: {
                start: todayString, // Fecha de inicio año, mes, dia
                end: '2024-12-31' // Fecha de fin
            },
            events: @json($events),
            eventColor: '#403192', // Fondo morado para todos los eventos
            eventTextColor: 'white', // Texto morado para todos los eventos
            selectable: true, // Permite seleccionar una franja horaria
            slotLabelFormat: { // Formato para las horas en las ranuras
                hour: '2-digit', // Mostrar horas con 2 dígitos (ej: 08, 09)
                minute: '2-digit', // Mostrar minutos con 2 dígitos (ej: 00, 30)
                meridiem: 'short' // AM/PM
            },
            eventTimeFormat: { // Formato de hora para los eventos (12 horas)
                hour: '2-digit',
                minute: '2-digit',
                meridiem: 'short' // AM/PM
            },
            select: function(info) {
                // 4 slots, cada uno de 30 minutos, lo que da un total de 4 * 30 * 60 * 1000 = 7200000 milisegundos (4 * 30 minutos).
                const maxDurationMs = 4 * 30 * 60 * 1000;

                // Calcular la duración seleccionada en milisegundos
                const durationMs = info.end - info.start;

                if (durationMs > maxDurationMs) {
                    alert(
                        'Solo puedes seleccionar un máximo de 4 slots consecutivos.'
                    );
                    calendar.unselect(); // Revertir la selección
                    return;
                }
                // Función para formatear fechas
                const formatDate = (date) => {
                    return date.getFullYear() + '-' +
                        String(date.getMonth() + 1).padStart(2, '0') + '-' +
                        String(date.getDate()).padStart(2, '0') + ' ' +
                        String(date.getHours()).padStart(2, '0') + ':' +
                        String(date.getMinutes()).padStart(2, '0') + ':' +
                        String(date.getSeconds()).padStart(2, '0');
                };

                // Formatear inicio y fin
                const formattedStartDate = formatDate(info
                    .start); // No es necesario convertir info.start a Date
                const formattedEndDate = formatDate(info.end);

                $('#myModal').modal(
                    'show'); // Esto ayuda a que se vea el modal cuando haga la selección

                // Esto lo que hace es asignar lo fecha inicial y final después de su selección
                document.querySelector('#startDate').value = formattedStartDate;
                document.querySelector('#finalDate').value = formattedEndDate;

            }
        });
        calendar.render(); // Renderizar el calendario
    });

    document.getElementById('submitBtn').addEventListener('click', function(event) {// Boton de enviar datos
        
        // Prevenir el envío del formulario al hacer clic
        event.preventDefault();

        const btnSubmit = document.getElementById('submitBtn');
        btnSubmit.disabled = true;

        // Formulario
        document.getElementById('form-calendar').submit();
        console.log('click');
    });
</script>

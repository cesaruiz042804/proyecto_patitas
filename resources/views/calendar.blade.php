<link rel="stylesheet" href="{{ asset('asset_css/calendar.css') }}">

<div id="openModal">
    <label for="">click para seleccionar fecha y hora</label>
</div>
<div class="modal-overlay" id="modalOverlay">
    <div class="modal">
        <button class="close-btn" id="closeModal">&times;</button>
        <div id='calendar' class="calendar"></div>
        <span>click y arrasta para seleccionar la cita</span>
        <span>Solo puedes seleccionar tiempo de 30 - 60 minutos</span>
        <span>Habrán citas las cuales ya estarán agendadas por otros usuarios</span>
        <input type="hidden" name="event" id="event" readonly>
        <div class="data-time">
            <label for="time_start">Inicio de la cita:</label>
            <input type="text" name="time_start2" id="time_start2" readonly>
        </div>
        <div class="data-time">
            <label for="time_end">Finalización de la cita:</label>
            <input type="text" name="time_end2" id="time_end2" readonly>
        </div>
    </div>
</div>

<script src="{{ asset('asset_js/calendar.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openModalBtn = document.getElementById('openModal');
        const closeModalBtn = document.getElementById('closeModal');
        const modalOverlay = document.getElementById('modalOverlay');
        let calendar; // Declaramos la variable para el calendario fuera del evento de clic

        // Abrir modal y renderizar el calendario
        openModalBtn.addEventListener('click', () => {
            modalOverlay.classList.add('active');

            // Solo inicializamos y renderizamos el calendario una vez que se abre el modal
            if (!calendar) {
                const calendarEl = document.getElementById('calendar');
                calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'es',
                    initialView: 'timeGridWeek',
                    slotMinTime: '08:00:00', // rango inicial de tiempo que mostrará el calendario
                    slotMaxTime: '17:00:00', // rango inicial de tiempo que mostrará el calendario
                    hiddenDays: [6, 0], // días que se ocultarán
                    slotLabelInterval: '01:00:00', // Mostrar etiquetas cada hora para mayor claridad
                    eventOverlap: false, // Evitar solapamientos
                    selectMirror: true, // Previsualizar selección al arrastrar
                    validRange: {
                        start: '2024-11-21', // Fecha de inicio año, mes, dia
                        end: '2024-12-31' // Fecha de fin
                    },
                    events: @json($events),
                    eventColor: '#403192', // Fondo morado para todos los eventos
                    eventTextColor: 'white', // Texto morado para todos los eventos
                    selectable: true, // Permite seleccionar una franja horaria
                    slotLabelFormat: { // Formato para las horas
                        hour: '2-digit', // Mostrar horas con 2 dígitos (ej: 08, 09)
                        minute: '2-digit', // Mostrar minutos con 2 dígitos (ej: 00)
                        meridiem: 'short' // Opcional si quieres incluir AM/PM (en español no es necesario)
                    },
                    select: function(info) {
                        // Duración máxima permitida (en milisegundos): 2 slots de 30 minutos cada uno
                        const maxDurationMs = 2 * 30 * 60 *
                            1000; // 30 minutos por slot, 2 slots

                        // Calcular la duración seleccionada en milisegundos
                        const durationMs = info.end - info.start;

                        if (durationMs > maxDurationMs) {
                            alert(
                                'Solo puedes seleccionar un máximo de dos slots consecutivos.'
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

                        // Mostrar alerta con las fechas formateadas
                        alert('Fecha y hora seleccionadas:\n' +
                            'Inicio: ' + formattedStartDate + '\n' +
                            'Fin: ' + formattedEndDate);

                        document.querySelector('#event').value = 'cita';
                        document.querySelector('#time_start2').value = formattedStartDate;
                        document.querySelector('#time_end2').value = formattedEndDate;
                        document.querySelector('#time_start1').value = formattedStartDate;
                        document.querySelector('#time_end1').value = formattedEndDate;

                    }

                });
                calendar.render(); // Renderizar el calendario
            }
        });

        // Cerrar modal
        closeModalBtn.addEventListener('click', () => {
            modalOverlay.classList.remove('active');
        });

        // Cerrar modal al hacer clic fuera de él
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                modalOverlay.classList.remove('active');
            }
        });
    });
</script>

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.11.15/main.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
@endpush
@stack('scripts')

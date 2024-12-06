<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="myModalLabel">Datos de producto seleccionado</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               <!-- Formulario con dos inputs -->
               <form method="POST" action="{{ route('admin.cart.delete.product') }}" id="form-appointment">
                   @csrf
                   <h6>Producto</h6>
                   <div class="mb-2">
                       <input type="hidden" class="form-control cleanable" id="id" name="id">
                   </div>
                   <div class="modal-footer">
                       <!-- Botón de enviar -->
                       <button type="submit" class="btn btn-success" id="submitBtn">Eliminar producto</button>
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

       // Desactiva el botón después de hacer clic
       const btnSubmit = document.getElementById('submitBtn');
       btnSubmit.disabled = true;

       // Enviar el formulario después de limpiar los campos (si es necesario)
       document.getElementById('form-appointment').submit();
       console.log('click');
   });
</script>

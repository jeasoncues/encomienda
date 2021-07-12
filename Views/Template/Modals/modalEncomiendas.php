<!-- Modal -->
<div class="modal fade" id="modalFormEncomienda" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Encomienda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- formulario -->
      <div class="modal-body">
      <div class="tile">
            <div class="tile-body">
              <form id="formEncomienda" name="formEncomienda" class="form-horizontal">
                <input type="hidden" id="idEncomienda" name="idEncomienda" value="">
                <p class="text-danger"> Todos los campos son obligatorios</p>

                <div class="row">
                <div class="form-group col-md-8">
                    <label for="listClientes">Clientes</label>
                    <select class="form-control" id="listClientes" name="listClientes" data-live-search="true">
                    </select>
                </div>

                <div class="form-group col-md-4">
                <label  class="text-danger">Nuevo Cliente*</label><br>
                <a href="<?= base_url(); ?>/clientes">
                  <button class="btn btn-secondary" type="button"><i class="fas fa-plus-circle"></i> Agregar</button>
                </a>
                </div>
               </div>
               

               <div class="form-row">
                 <div class="form-group col-md-6">
                    <label for="txtDestinatario">Destinatario</label>
                    <input class="form-control" id="txtDestinatario" name="txtDestinatario" type="text">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="listEstado">Estado</label>
                    <select class="form-control" selectpicker id="listEstado" name="listEstado">
                      <option value="1">Preparada</option>
                      <option value="2">Entregada</option>
                      <option value="3">Cancelada</option>
                    </select>
                  </div>
               </div>

               <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtDestino">Destino</label>
                    <input class="form-control" id="txtDestino" name="txtDestino" type="text" >
                  </div>
            
                  <div class="form-group col-md-6">
                    <label for="listPlaca">Placa</label>
                    <select class="form-control" id="listPlaca" name="listPlaca" data-live-search="true">
                    </select>
                  </div>
               </div>


               
               <div class="form-row">
                 <div class="form-group col-md-6">
                    <label for="listTipoPago">Tipo Pago</label>
                    <select class="form-control" data-live-search="true" id="listTipoPago"  name="listTipoPago">
                      <option value="1">Efectivo</option>
                      <option value="2">Tarjeta</option>
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="txtMonto">Monto</label>
                    <input class="form-control" id="txtMonto" name="txtMonto" type="number" placeholder="S/.">
                  </div>
                
                 </div>
                  
               <div class="form-row">
                 <div class="form-group col-md-6">
                    <label for="control-label">Paquete</label>
                    <textarea class="form-control" id="txtdescripcion" name="txtdescripcion"  placeholder="Descripción del paquete"></textarea>
                 </div>

                 <div class="form-group col-md-6">
                 <label for="txtTipoPaquete">Tipo Paquete</label>
                 <input class="form-control" id="txtTipoPaquete" name="txtTipoPaquete" type="text" placeholder="Fragil / Pesado">
                 </div>
               </div>

             

                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>

              </form>
            </div>
         
          </div>
      </div>
    
    </div>
  </div>
</div>




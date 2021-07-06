<!-- Modal -->
<div class="modal fade" id="modalFormVehiculo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Vehiculo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- formulario -->
      <div class="modal-body">
      <div class="tile">
            <div class="tile-body">
              <form id="formVehiculo" name="formVehiculo">
                <input type="hidden" id="idVehiculo" name="idVehiculo" value="">
               
               <div class="row">
                <div class="form-group col-md-8">
                    <label for="listConductor">Conductores</label>
                    <select class="form-control" id="listConductor" name="listConductor" data-live-search="true">
                    </select>
                </div>

                <div class="form-group col-md-4">
                <label  class="text-danger">Nuevo Conductor*</label>
                <a href="<?= base_url(); ?>/usuarios">
                  <button class="btn btn-secondary" type="button"><i class="fas fa-plus-circle"></i> Agregar</button>
                </a>
                </div>
               </div>
             
                  <div class="form-group">
                    <label class="control-label">Placa</label>
                    <input class="form-control" id="txtPlaca" name="txtPlaca" type="text" placeholder="Ejm: 1737-5D" >
                 </div>

                
                <div class="form-group">
                    <label for="exampleSelect1">Estado</label>
                    <select class="form-control" id="listEstado" name="listEstado" >
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
                  </div>

                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="titleBtn">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>

              </form>
            </div>
         
          </div>
      </div>
    
    </div>
  </div>
</div>


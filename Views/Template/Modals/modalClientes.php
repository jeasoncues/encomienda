<!-- Modal -->
<div class="modal fade" id="modalFormCliente" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- formulario -->
      <div class="modal-body">
      <div class="tile">
            <div class="tile-body">
              <form id="formCliente" name="formCliente" class="form-horizontal">
                <input type="hidden" id="idUsuario" name="idUsuario" value="">
                <p class="text-danger"> Todos los campos son obligatorios</p>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtDni">DNI</label>
                    <input class="form-control" id="txtDni" name="txtDni" type="number">
                  </div>
                </div>
               

               <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtNombre">Nombre</label>
                    <input class="form-control" id="txtNombre" name="txtNombre" type="text">
                  </div>
            
                  <div class="form-group col-md-6">
                    <label for="txtApellidos">Apellidos</label>
                    <input class="form-control" id="txtApellidos" name="txtApellidos" type="text"></input>
                  </div>
               </div>

               <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtTelefono">Telefono</label>
                    <input class="form-control" id="txtTelefono" name="txtTelefono" type="number" >
                  </div>
            
                  <div class="form-group col-md-6">
                    <label for="txtEmail">Email</label>
                    <input class="form-control" id="txtEmail" name="txtEmail" type="email" ></input>
                  </div>
               </div>



               <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtPassword">Contrase??a</label>
                    <input class="form-control" id="txtPassword" name="txtPassword" type="password">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="txtDireccion">Direcci??n</label>
                    <input class="form-control" id="txtDireccion" name="txtDireccion" type="text">
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

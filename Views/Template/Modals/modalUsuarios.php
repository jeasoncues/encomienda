<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- formulario -->
      <div class="modal-body">
      <div class="tile">
            <div class="tile-body">
              <form id="formUsuario" name="formUsuario" class="form-horizontal">
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
                    <label for="listRolid">Tipo usuario</label>
                    <select class="form-control" data-live-search="true" id="listRolid"  name="listRolid"></select>
                  </div>
            
                  <div class="form-group col-md-6">
                    <label for="listEstado">Estado</label>
                    <select class="form-control" selectpicker id="listEstado" name="listEstado">
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
                  </div>
               </div>

               <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtPassword">Contraseña</label>
                    <input class="form-control" id="txtPassword" name="txtPassword" type="password">
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


<!-- MODAL VER USUARIO -->
<!-- Modal -->
<div class="modal fade" id="modalVerUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-view">
        <h5 class="modal-title" id="titleModal">Datos del Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
      <div class="tile">
            <div class="tile-body">
               
               <!-- TABLA PARA MOSTRAR DATOS DEL USUARIO -->
               <table class="table table-bordered">
               <tbody>
                  <tr>
                    <td>DNI:</td>
                    <td id="celDni">74237028</td>
                  </tr>
                  <tr>
                    <td>Nombres:</td>
                    <td id="celNombre">Jeason Arturo</td>
                  </tr>
                  <tr>
                    <td>Apellidos:</td>
                    <td id="celApellidos">Cueva Espinoza</td>
                  </tr>
                  <tr>
                    <td>Telefono:</td>
                    <td id="celTelefono">999134381</td>
                  </tr>
                  <tr>
                    <td>Email: </td>
                    <td id="celEmail">jeasoncues@gmail.com</td>
                  </tr>
                  <tr>
                    <td>Tipo Usuario:</td>
                    <td id="celTipoUsuario">Administrador</td>
                  </tr>
                  <tr>
                    <td>Estado:</td>
                    <td id="celEstado">Activo</td>
                  </tr>
                  <tr>
                    <td>Fecha registro:</td>
                    <td id="celFechaRegistro">Administrador</td>
                  </tr>
               </tbody>
               </table>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
         
          </div>
      </div>
    
    </div>
  </div>
</div>
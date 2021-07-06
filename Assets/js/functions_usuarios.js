var tableUsuarios;


document.addEventListener('DOMContentLoaded',function(){


    tableUsuarios = $('#tableUsuarios').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        //RUTA PARA CONSUMIR EL METODO QUE SE ENCUENTRA EN EL CONTROLADOR (BACKEND)
        "ajax":{
            "url": " "+base_url+"/Usuarios/getUsuarios",
            "dataSrc":""
        },
        // COLUMNAS DE MI TABLA ROLES DE LA BD
        "columns": [
            {"data":"idpersona"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"email_user"},
            {"data":"telefono"},
            {"data":"nombrerol"},
            {"data":"estado"},
            {"data":"options"} 
        ],
        
        'dom': 'lBfrtip',
        'buttons': [
         {
            "extend": "excelHtml5", 
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr": "Exportar a Excel",
            "className": "btn btn-success",
            "exportOptions": {
                //indicamos las columnas que vamos a exportar
                "columns":  [0, 1, 2, 3,4,5,6]

            }
         },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr": "Exportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": {
                "columns": [0,1,2,3,4,5,6]
            }
         }
        ],
        "resonsieve":"true", // RESPONSIVE (MOVIL)
        "bDestroy": true,
        "iDisplayLength": 10, // MUESTRE LOS PRIMEROS 10 REGISTROS
        "order":[[0,"asc"]]
    });

  
    //NUEVO USUARIO
    var formUsuario =  document.querySelector('#formUsuario');
    formUsuario.onsubmit = function(e){
       e.preventDefault();

       //capturamos valores de los id ("cajas de texto, select")
       var strDni =  document.querySelector('#txtDni').value;
       var strNombre =  document.querySelector('#txtNombre').value;
       var strApellido =  document.querySelector('#txtApellidos').value;
       var intTelefono = document.querySelector('#txtTelefono').value;
       var strEmail = document.querySelector('#txtEmail').value;
       var intTipousuario = document.querySelector('#listRolid').value;
       var strPassword = document.querySelector('#txtPassword').value; //no validamos porque se puede generar automaticamente

       if(strDni == '' || strNombre == '' || strApellido == '' || intTelefono == '' || strEmail == '' || intTipousuario == ''){
           swal("Atencion","Todos los campos son obligatorios","error");
           return false;
       }

       var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
       var ajaxUrl = base_url+'/Usuarios/setUsuario';
       var formData =  new FormData(formUsuario);   
       request.open("POST",ajaxUrl,true);
       request.send(formData);


       request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200)
           {
               var objData =  JSON.parse(request.responseText);

               if(objData.status)
               {
                  $('#modalFormUsuario').modal("hide");
                  formUsuario.reset();
                  swal("Usuario", objData.msg, "success");
                  tableUsuarios.api().ajax.reload(function(){
                     fntRolesUsuarios();
                     fntViewUsuario();  
                  })

               }else{
                   swal("Atencion",objData.msg, "error");
               }
           }
       }

    }

}, false);


$('#tableUsuarios').DataTable();

window.addEventListener('load',function(){
   fntRolesUsuarios();
//    fntViewUsuario();
},false);


function fntRolesUsuarios(){
    var ajaxUrl = base_url+'/Roles/getSelectRoles';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true); 
    request.send();

    request.onreadystatechange = function() {
         
        if(request.readyState == 4 &&  request.status == 200)
        {
            document.querySelector('#listRolid').innerHTML = request.responseText;  //obtener todos los roles
            document.querySelector('#listRolid').value = 1; //mostrar primer rol
            $('#listRolid').selectpicker('render');
        }
    }
}

function fntViewUsuario(idpersona)
{
   

           var idpersona = idpersona;
           var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
           var ajaxUrl = base_url+'/Usuarios/getUsuario/'+idpersona;
           request.open("GET",ajaxUrl,true);
           request.send();


           request.onreadystatechange = function(){

              if(request.readyState == 4 && request.status == 200){

                var objData = JSON.parse(request.responseText);

                if(objData.status)
                {   
                    //SI EL ESTADO ES IGUAL A 1 MOSTRAMOS ACTIVO, CASO CONTRARIO INACTIVO.
                    var estadoUsuario = objData.data.estado == 1 ? 
                    '<span class="badge badge-success">Activo</span>' : 
                    '<span class="badge badge-danger">Inactivo</span>';

                    document.querySelector("#celDni").innerHTML = objData.data.dni;
                    document.querySelector("#celNombre").innerHTML = objData.data.nombres;
                    document.querySelector("#celApellidos").innerHTML = objData.data.apellidos;
                    document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                    document.querySelector("#celEmail").innerHTML = objData.data.email_user;
                    document.querySelector("#celTipoUsuario").innerHTML = objData.data.nombrerol;
                    document.querySelector("#celEstado").innerHTML = estadoUsuario;
                    document.querySelector("#celFechaRegistro").innerHTML = objData.data.fechaRegistro;
                    $('#modalVerUsuario').modal('show');
                }else{
                    swal("Error",objData.msg, "error");
                }
              }
           }
}


function openModal(){

    document.querySelector('#idUsuario').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-success");
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#formUsuario').reset();
    $('#modalFormUsuario').modal('show');
}


function fntEditUsuario(idpersona){

    document.querySelector('#titleModal').innerHTML = "Actualizar Usuario";
    document.querySelector('.modal-header').classList.replace("headerRegister","headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-success","btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";
 

    var idpersona = idpersona;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Usuarios/getUsuario/'+idpersona;
    
    request.open("GET",ajaxUrl,true);
    request.send();


    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200)
        {
            var objData =  JSON.parse(request.responseText);
    
         
            if(objData.status)
            {
                document.querySelector('#idUsuario').value = objData.data.idpersona;
                document.querySelector('#txtDni').value = objData.data.dni;
                document.querySelector('#txtNombre').value = objData.data.nombres;
                document.querySelector('#txtApellidos').value = objData.data.apellidos;
                document.querySelector('#txtTelefono').value = objData.data.telefono;
                document.querySelector('#txtEmail').value = objData.data.email_user;
                document.querySelector('#listRolid').value = objData.data.idrol;
                $('#listRolid').selectpicker('render');
                if(objData.data.estado == 1)
                {
                    
                var optionSelect = '<option value="1" selected class="notblock">Activo</option>';
                                                    
                }else {
                    var optionSelect = '<option value="2" selected class="notblock">Inactivo</option>';
                }
                
                var htmlSelect = ` ${optionSelect} 
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            `;
                document.querySelector('#listEstado').innerHTML = htmlSelect;
                $('#modalFormUsuario').modal('show');
    
            }else{
                swal("Atencion",objData.msg,"error");
            }
        }
    }
    

}


function fntDelUsuario(idpersona){

    var idpersona = idpersona;

    swal({
          title: "Eliminar Usuario",
          text: "¿Desea eliminar usuario?",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, Eliminar",
          cancelButtonText: "No, Cancelar",
          closeOnConfirm: false,
          closeOnCancel: true,
        }, function(isConfirm){

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Usuarios/delUsuario';
            var strData = "idpersona="+idpersona;

            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);


            request.onreadystatechange = function(){

                if(request.readyState == 4 && request.status == 200)
                {
                    var objData = JSON.parse(request.responseText);

                    if(objData.status){
                        swal("Eliminar", objData.msg, "success");
                        tableUsuarios.api().ajax.reload();
                    }else{
                        swal("Atencion",objData.msg,"error");
                    }
                }
            }

        })
}


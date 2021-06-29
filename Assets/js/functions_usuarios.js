var tableUsuarios;


document.addEventListener('DOMContentLoaded',function(){
  
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

    }

}, false);


$('#tableUsuarios').DataTable();

window.addEventListener('load',function(){
   fntRolesUsuarios();
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


function openModal(){

    document.querySelector('#idUsuario').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-success");
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#formUsuario').reset();
    $('#modalFormUsuario').modal('show');
}


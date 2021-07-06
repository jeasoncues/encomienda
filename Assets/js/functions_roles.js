var tableRoles; 

//evento al momento que cargue el dom => html
document.addEventListener('DOMContentLoaded', function(){
  
    tableRoles = $('#tableRoles').dataTable( {
            "aProcessing":true,
            "aServerSide":true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            //RUTA PARA CONSUMIR EL METODO QUE SE ENCUENTRA EN EL CONTROLADOR (BACKEND)
            "ajax":{
                "url": " "+base_url+"/Roles/getRoles",
                "dataSrc":""
            },
            // COLUMNAS DE MI TABLA ROLES DE LA BD
            "columns": [
                {"data":"idrol"},
                {"data":"nombrerol"},
                {"data":"descripcion"},
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
                    "columns":  [0, 1, 2, 3]

                }
			 },{
				"extend": "pdfHtml5",
				"text": "<i class='fas fa-file-pdf'></i> PDF",
				"titleAttr": "Exportar a PDF",
				"className": "btn btn-danger",
                "exportOptions": {
                    "columns": [0,1,2,3]
                }
			 }
	        ],
            "resonsieve":"true", // RESPONSIVE (MOVIL)
            "bDestroy": true,
            "iDisplayLength": 10, // MUESTRE LOS PRIMEROS 10 REGISTROS
            "order":[[0,"asc"]]
        });


        //NUEVO ROL
        var formRol =  document.querySelector("#formRol");

        formRol.onsubmit = function(e) {
            e.preventDefault(); //evitar recargar la pagina

            var intIdRol = document.querySelector("#idRol").value;
            var strNombre =  document.querySelector("#txtNombre").value;
            var strDescripcion =  document.querySelector("#txtdescripcion").value;
            var listEstado = document.querySelector("#listEstado").value;

            if(strNombre == '' || strDescripcion == '' || listEstado == '') {
                swal("Atencion","Todos los campos son obligatorios","error");
                return false; //detiene el proceso
            }
            
            //validacion para que acepte en todos los navegadores
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            //variable para la ruta del metodo de insertar rol
            var ajaxUrl =  base_url+'/Roles/setRol';

            var formData =  new FormData(formRol);

            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange =  function(){
                if(request.readyState == 4 &&  request.status == 200){

                    var objData = JSON.parse(request.responseText); //convertimos a objeto la informacion 

                    if(objData.status){
                        $('#modalFormRol').modal('hide'); //cerramos modal
                        formRol.reset(); //reseteamos las cajas de texto
                        swal('Roles de Usuario', objData.msg, "success");
                        //recargamos la tabla
                        tableRoles.api().ajax.reload(); 
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        }

});

$('#tablaRoles').DataTable();


//Abrir formulario de nuevo rol
var btnOpenModal =  document.querySelector('#btnOpenModal');

btnOpenModal.addEventListener('click',function(){
    
    document.querySelector('#idRol').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-success");
    document.querySelector('#titleBtn').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
    document.querySelector('#formRol').reset();
    $('#modalFormRol').modal('show');
})

// function openModal(){


//     //hacemos uso de jquery abriendo el modal especificando el id del modal.
//     $('#modalFormRol').modal('show');
// }


//SE EJECUTA AL MOMENTO DE CARGA LA PAGINA
window.addEventListener('load',function(){
//    fntPermisosRol();    
//    fntDelRol();
//    fntEditRol();
 },false);

function fntEditRol(idrol){

    
             
            document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
            document.querySelector('.modal-header').classList.replace("headerRegister","headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-success","btn-info");
            document.querySelector('#titleBtn').innerHTML = "Actualizar";
            
            //obtener el atributo rl del controlador para editar
            var idrol = idrol;
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Roles/getRol/'+idrol; //url

            request.open("GET",ajaxUrl,true);
            request.send();

            request.onreadystatechange = function() {
                if(request.readyState == 4 && request.status == 200)
                {
                    var objData =  JSON.parse(request.responseText);

                    if(objData.status)
                    {
                        document.querySelector('#idRol').value = objData.data.idrol;
                        document.querySelector('#txtNombre').value = objData.data.nombrerol;
                        document.querySelector('#txtdescripcion').value = objData.data.descripcion;

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
                        
                        $('#modalFormRol').modal('show');

                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
         }
 }
            

function fntDelRol(idrol) {

    
            var idrol = idrol;

            swal({
                title: "Eliminar Rol",
                text: "¿Desea eliminar el rol?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, Eliminar",
                cancelButtonText: "No, Cancelar",
                closeOnConfirm: false,
                closeOnCancel: true,
            }, function (isConfirm){
                
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url+'/Roles/delRol';
                var strData = "idrol="+idrol;

                request.open("POST",ajaxUrl,true);
                request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                request.send(strData);

                request.onreadystatechange = function() {
                   
                    if(request.readyState == 4 && request.status == 200) 
                    {
                        var objData =  JSON.parse(request.responseText);

                        if(objData.status){
                            swal("Eliminar", objData.msg, "success");
                            tableRoles.api().ajax.reload(function(){
                                fntEditRol();
                                fntDelRol();
                                fntPermisosRol();
                            });
                        }else{
                            swal("Atencion",objData.msg,"error");
                        }
                    }
                     
                }

              })
}


function fntPermisosRol(idrol){

             var idrol =  idrol;
             var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
             var ajaxUrl = base_url+'/Permisos/getPermisos/'+idrol;

             request.open("GET",ajaxUrl,true);
             request.send();

             request.onreadystatechange = function() {

                if(request.readyState == 4 && request.status == 200){
                     document.querySelector('.contentAjax').innerHTML = request.responseText;
                     $('.modalPermisos').modal('show');
                     document.querySelector('#formPermisos').addEventListener('submit',fntSavePermisos,false);
                   
                }
             }
}


function fntSavePermisos(evnet){
  
    evnet.preventDefault();
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Permisos/setPermisos';
    var formElemet =  document.querySelector('#formPermisos');
    var formData =  new FormData(formElemet);

    request.open("POST",ajaxUrl,true);
    request.send(formData);

    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                swal("Permisos Usuario", objData.msg,"success");
            }else{
                swal("Error",objData.msg, "error");
            }

        
        }
    }


}
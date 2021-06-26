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
            "resonsieve":"true", // RESPONSIVE (MOVIL)
            "bDestroy": true,
            "iDisplayLength": 10, // MUESTRE LOS PRIMEROS 10 REGISTROS
            "order":[[0,"asc"]]
        });


        //NUEVO ROL
        var formRol =  document.querySelector("#formRol");

        formRol.onsubmit = function(e) {
            e.preventDefault(); //evitar recargar la pagina

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
                        tableRoles.api().ajax.reload(function(){

                        });
                    }else{
                        swal("Error", objData.msg, "error");
                    }
                }
            }
        }

});

$('#tablaRoles').DataTable();



function openModal(){
    
    //hacemos uso de jquery abriendo el modal especificando el id del modal.
    $('#modalFormRol').modal('show');

}
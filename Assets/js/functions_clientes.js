var tableClientes;

document.addEventListener('DOMContentLoaded',function(){

    tableUsuarios = $('#tableClientes').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        //RUTA PARA CONSUMIR EL METODO QUE SE ENCUENTRA EN EL CONTROLADOR (BACKEND)
        "ajax":{
            "url": " "+base_url+"/Clientes/getClientes",
            "dataSrc":""
        },
        // COLUMNAS DE MI TABLA ROLES DE LA BD
        "columns": [
            {"data":"idpersona"},
            {"data":"dni"},
            {"data":"nombres"},
            {"data":"apellidos"},
            {"data":"email_user"},
            {"data":"telefono"},
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
                "columns":  [0, 1, 2, 3,4,5]

            }
         },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr": "Exportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": {
                "columns": [0,1,2,3,4,5]
            }
         }
        ],
        "resonsieve":"true", // RESPONSIVE (MOVIL)
        "bDestroy": true,
        "iDisplayLength": 10, // MUESTRE LOS PRIMEROS 10 REGISTROS
        "order":[[0,"asc"]]
    });



     //NUEVO CLIENTE
     var formCliente =  document.querySelector('#formCliente');
     formCliente.onsubmit = function(e){
        e.preventDefault();
 
        //capturamos valores de los id ("cajas de texto, select")
        var strDni =  document.querySelector('#txtDni').value;
        var strNombre =  document.querySelector('#txtNombre').value;
        var strApellido =  document.querySelector('#txtApellidos').value;
        var intTelefono = document.querySelector('#txtTelefono').value;
        var strEmail = document.querySelector('#txtEmail').value;
        var strDireccion = document.querySelector('#txtDireccion').value;
        var strPassword = document.querySelector('#txtPassword').value; //no validamos porque se puede generar automaticamente
 
        if(strDni == '' || strNombre == '' || strApellido == '' || intTelefono == '' || strEmail == '' || strDireccion == ''){
            swal("Atencion","Todos los campos son obligatorios","error");
            return false;
        }
 
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Clientes/setCliente';
        var formData =  new FormData(formCliente);   
        request.open("POST",ajaxUrl,true);
        request.send(formData);
 
 
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200)
            {
                var objData =  JSON.parse(request.responseText);
 
                if(objData.status)
                {
                   $('#modalFormCliente').modal("hide");
                   formCliente.reset();
                   swal("Cliente", objData.msg, "success");
                   tableClientes.api().ajax.reload(function(){
                    
                   })
 
                }else{
                    swal("Atencion",objData.msg, "error");
                }
            }
        }
 
     }
},false);



$('#tableClientes').DataTable();


var openClientes =  document.querySelector('#openclientes');
openClientes.addEventListener('click',function(){

    document.querySelector('#idUsuario').value = "";
    document.querySelector('#titleModal').innerHTML ="Nuevo Cliente";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-success");
    document.querySelector('#btnText').innerHTML ="Guardar";
    formCliente.reset();

    $('#modalFormCliente').modal('show');
})

window.addEventListener('load',function(){

}, false);


function fntEditInfo(idpersona){
    
    document.querySelector('#titleModal').innerHTML ="Actualizar Cliente";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-success", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";


    var idpersona = idpersona;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Clientes/getCliente/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idUsuario").value = objData.data.idpersona;
                document.querySelector("#txtDni").value = objData.data.dni;
                document.querySelector("#txtNombre").value = objData.data.nombres;
                document.querySelector("#txtApellidos").value = objData.data.apellidos;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtEmail").value = objData.data.email_user;
                document.querySelector("#txtDireccion").value =objData.data.direccion;

                $('#modalFormCliente').modal('show');
               
            }else{
                swal("Atencion",objData.msg, "error");
            }
        }
    }
}
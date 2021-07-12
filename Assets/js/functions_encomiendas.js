var tableEncomiendas;

document.addEventListener('DOMContentLoaded',function(){
  
    tableEncomiendas =  $('#tableEncomiendas').dataTable( {
       
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        
        "ajax":{
            "url": " "+base_url+"/Encomiendas/getEncomiendas",
            "dataSrc":""
        },
      
        "columns": [
            {"data":"idencomienda"},
            {"data":"nombres"},
            {"data":"destinatario"},
            {"data":"estado"},
            {"data":"destino"},
            {"data":"descripcion"},
            {"data":"peso_paquete"},
            {"data":"placa"},
            {"data":"tipopago"},
            {"data":"monto"},
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
                "columns":  [0, 1, 2, 3, 4, 5, 6, 7]

            }
         },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr": "Exportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": {
                "columns": [0,1,2,3,4,5,6,7]
            }
         }
        ],

        "resonsieve":"true", // RESPONSIVE (MOVIL)
        "bDestroy": true,
        "iDisplayLength": 10, // MUESTRE LOS PRIMEROS 10 REGISTROS
        "order":[[0,"desc"]]
    });


    //NUEVA ENCOMIENDA
    var formEncomienda = document.querySelector('#formEncomienda');
    formEncomienda.onsubmit = function(e){
        e.preventDefault();
        
      
        var intCliente = document.querySelector('#listClientes').value;
        var strDestinatario = document.querySelector('#txtDestinatario').value;
        var strDestino = document.querySelector('#txtDestino').value;
        var strPlaca =  document.querySelector('#listPlaca').value;
        var intTipoPago = document.querySelector('#listTipoPago').value;
        var strMonto = document.querySelector('#txtMonto').value;
        var strDescripcion =  document.querySelector("#txtdescripcion").value;
        var strTipoPaquete = document.querySelector('#txtTipoPaquete').value;
        
        if(  strDestinatario == '' || strDestino == ''  ||  strMonto == '' || strDescripcion == '' || strTipoPaquete == '')
        {
            swal("Atencion", "Todos los campos son obligatorios", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Encomiendas/setEncomienda';
        var formData =  new FormData(formEncomienda);
        request.open("POST",ajaxUrl, true);
        request.send(formData);
        

        request.onreadystatechange = function(){

            if(request.readyState == 4 && request.status == 200)
            {
                var objData =  JSON.parse(request.responseText);

                if(objData.status){
                    $('#modalFormEncomienda').modal('hide');
                    formEncomienda.reset();
                    swal("Encomienda",objData.msg,"success");
                    tableEncomiendas.api().ajax.reload();
                }else{
                    swal("Atencion",objData.msg,"error");
                }
            }
        }

    }

},false);


var btnEncomiendas =  document.querySelector('#openEncomiendas');

btnEncomiendas.addEventListener('click',function(){
    document.querySelector('#titleModal').innerHTML = "Nueva Encomienda";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-success");
    document.querySelector('#btnText').innerHTML = "Guardar";
    formEncomienda.reset();
    $('#modalFormEncomienda').modal('show');
})



window.addEventListener('load',function(){
    fntClientes();
    fntPlaca();
})

function fntClientes(){
    var ajaxUrl = base_url+'/Clientes/getSelectCliente';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true); 
    request.send();

    request.onreadystatechange = function() {
         
        if(request.readyState == 4 &&  request.status == 200)
        {
            document.querySelector('#listClientes').innerHTML = request.responseText;  //obtener todos los roles
            document.querySelector('#listClientes').value = 7;
            $('#listClientes').selectpicker('render');
        }
    }
}



function fntPlaca(){
    var ajaxUrl = base_url+'/Vehiculos/getSelectPlaca';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true); 
    request.send();

    request.onreadystatechange = function() {
         
        if(request.readyState == 4 &&  request.status == 200)
        {
            document.querySelector('#listPlaca').innerHTML = request.responseText;  //obtener todos los roles
            document.querySelector('#listPlaca').value = 2;
            $('#listPlaca').selectpicker('render');
        }
    }
}

function fntEditEncomienda(idencomienda)
{  
    document.querySelector('#titleModal').innerHTML = "Actualizar Encomienda";
    document.querySelector('.modal-header').classList.replace("headerRegister","headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-success","btn-info");
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var idencomienda = idencomienda;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Encomiendas/getEncomienda/'+idencomienda; //url

    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200)
        {
            var objData =  JSON.parse(request.responseText);

            if(objData.status)
            {
                document.querySelector("#idEncomienda").value = objData.data.idencomienda;
                document.querySelector("#listClientes").value = objData.data.idpersona;
                document.querySelector("#txtDestinatario").value = objData.data.destinatario;
                document.querySelector("#txtDestino").value = objData.data.destino;
                document.querySelector("#listPlaca").value = objData.data.idvehiculo;
                document.querySelector("#txtdescripcion").value = objData.data.descripcion;
                document.querySelector("#txtTipoPaquete").value = objData.data.peso_paquete;
                document.querySelector("#txtMonto").value = objData.data.monto;

                // $("#txtMonto").prop('disabled', true);

                $('#listClientes').selectpicker('render');
        
                if(objData.data.tipopago == 1){
                    document.querySelector("#listTipoPago").value = 1;
                }else{
                    document.querySelector("#listTipoPago").value = 2;
                }


                if(objData.data.estado == 1) 
                {
                   document.querySelector("#listEstado").value = 1;
                                      
                }else if(objData.data.estado == 2) {
                    document.querySelector("#listEstado").value = 2;
                }else{
                    document.querySelector("#listEstado").value = 3;
                }
                $('#listEstado').selectpicker('render');

               }
            }
            $('#modalFormEncomienda').modal('show');
        }
    }






var tableVehiculos;

document.addEventListener('DOMContentLoaded',function(){
  
    tableVehiculos =  $('#tableVehiculos').dataTable( {
       
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        
        "ajax":{
            "url": " "+base_url+"/Vehiculos/getVehiculos",
            "dataSrc":""
        },
      
        "columns": [
            {"data":"idvehiculo"},
            {"data":"nombres"},
            {"data":"placa"},
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


    //NUEVO VEHICULO
    var formVehiculo = document.querySelector('#formVehiculo');
    formVehiculo.onsubmit = function(e){
        e.preventDefault();

        var intConductor = document.querySelector('#listConductor').value;
        var strPlaca =  document.querySelector('#txtPlaca').value;
        
        if(intConductor == '' || strPlaca == '')
        {
            swal("Atencion", "Todos los campos son obligatorios", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        var ajaxUrl = base_url+'/Vehiculos/setVehiculo';
        var formData =  new FormData(formVehiculo);
        request.open("POST",ajaxUrl, true);
        request.send(formData);

        request.onreadystatechange = function(){

            if(request.readyState == 4 && request.status == 200)
            {
                var objData =  JSON.parse(request.responseText);

                if(objData.status){
                    $('#modalFormVehiculo').modal("hide");
                    formVehiculo.reset();
                    swal("Vehiculo",objData.msg,"success");
                    tableVehiculos.api().ajax.reload();
                }else{
                    swal("Atencion",objData.msg,"error");
                }
            }
        }

    }

},false);

$('#tableVehiculos').DataTable();


window.addEventListener('load',function(){
   fntUsuarioConductor();
},false);


function fntUsuarioConductor(){
    var ajaxUrl = base_url+'/Usuarios/getSelectConductor';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open("GET",ajaxUrl,true); 
    request.send();

    request.onreadystatechange = function() {
         
        if(request.readyState == 4 &&  request.status == 200)
        {
            document.querySelector('#listConductor').innerHTML = request.responseText;  //obtener todos los roles
            document.querySelector('#listConductor').value = 6;
            $('#listConductor').selectpicker('render');
        }
    }
}

var btnvehiculo = document.querySelector('#btnvehiculo');

btnvehiculo.addEventListener('click',function(){

    document.querySelector('#idVehiculo'),value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-success");
    document.querySelector('#titleBtn').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Vehiculo";
    document.querySelector('#formVehiculo').reset();
    $('#modalFormVehiculo').modal('show');
})



function fntEditVehiculo(idvehiculo){
    
    document.querySelector('#titleModal').innerHTML = "Actualizar Vehiculo";
    document.querySelector('.modal-header').classList.replace("headerRegister","headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-success","btn-info");
    document.querySelector('#titleBtn').innerHTML = "Actualizar";
   
    var idvehiculo = idvehiculo;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Vehiculos/getVehiculo/'+idvehiculo;

    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200)
        {
            var objData =  JSON.parse(request.responseText);

            if(objData.status)
            {
                document.querySelector('#idVehiculo').value = objData.data.idvehiculo;
                document.querySelector('#txtPlaca').value = objData.data.placa;
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
                $('#modalFormVehiculo').modal('show');
            }else{
                swal("Error",objData.msg,"error");
            }
        }
    }

}



function fntDelVehiculo(idvehiculo){
   

    var idvehiculo = idvehiculo;

    swal({
        title: "Eliminar Vehiculo",
        text: "¿Desea eliminar el vehiculo?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Eliminar",
        cancelButtonText: "No, Cancelar",
        closeOnConfirm: false,
        closeOnCancel: true,
    }, function (isConfirm){

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        var ajaxUrl = base_url+'/Vehiculos/delVehiculo';
        var strData =  "idvehiculo="+idvehiculo;

        request.open("POST",ajaxUrl,true);
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        request.send(strData);

        request.onreadystatechange = function(){

            if(request.readyState == 4 && request.status == 200)
            {
                var objData = JSON.parse(request.responseText);

                if(objData.status)
                {
                    swal("Eliminar", objData.msg, "success");
                    tableVehiculos.api().ajax.reload();
                }else{
                    swal("Atencion",objData.msg,"error");
                }
            }
        }
    })
}

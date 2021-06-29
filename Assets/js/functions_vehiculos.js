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


    //   //NUEVO VEHICULO 

    //   var formVehiculo = document.querySelector("#formVehiculo");

    //   formVehiculo.onsubmit = function(e){
    //       e.preventDefault();
  
  
    //       var listPersonas =  document.querySelector("#listPersonas").value;
    //       var strPlaca =  document.querySelector("#txtPlaca").value;
  
    //       if(listPersonas == '' || strPlaca == ''){
    //           swal("Atencion","Todos los campos son obligatorios","error");
    //           return false;
    //       }
  
          
    //   }


});

$('#tableVehiculos').DataTable();
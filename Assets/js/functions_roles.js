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
                {"data":"estado"}
            ],
            "resonsieve":"true", // RESPONSIVE (MOVIL)
            "bDestroy": true,
            "iDisplayLength": 10, // MUESTRE LOS PRIMEROS 10 REGISTROS
            "order":[[0,"desc"]]
        });

});

$('#tablaRoles').DataTable();



function openModal(){
    
    //hacemos uso de jquery abriendo el modal especificando el id del modal.
    $('#modalFormRol').modal('show');

}
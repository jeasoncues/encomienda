var tableUsuarios;


document.addEventListener('DOMContentLoaded',function(){
   tableUsuarios = $('#tableUsuarios').dataTable(
       {
           "aProcessing":true,
           "aServerSide":true,
           "language": {
             "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
           }
       }
   )
});

$('#tableUsuarios').DataTable();
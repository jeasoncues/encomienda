// olvidaste contraseña
$('.login-content [data-toggle="flip"]').click(function() {
    $('.login-box').toggleClass('flipped');
    return false;
});


var loading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded',function(){
   

   
    var formLogin  = document.querySelector("#formLogin");

    formLogin.onsubmit = function(e){
        e.preventDefault();

        var txtEmail =  document.querySelector("#txtEmail").value;
        var txtPassword =  document.querySelector("#txtPassword").value;


        if(txtEmail == '' || txtPassword == ''){
            swal("Atencion","Escriba usuario y contraseña","error");
            return false;
        }else{
            
            //al loading al momento que le damos click le damos el estilo flex para que se muestre 
            loading.style.display = "flex";

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Login/loginUser';
            var formData =  new FormData(formLogin);
            request.open("POST",ajaxUrl,true);
            request.send(formData);

            request.onreadystatechange = function(){
                
                if(request.readyState == 4 &&  request.status == 200){
                   
                    var objData =  JSON.parse(request.responseText);

                    if(objData.status)
                    {
                        // window.location = base_url+'/dashboard';
                        window.location.reload(false);


                    }else{
                        swal("Atencion",objData.msg, "error");
                        
                    }
                }
                // ocultar loading al momento que ya obtenemos respuesta del login
                loading.style.display = "none";
                return false;
             
               
            }

        }
    }

},false);
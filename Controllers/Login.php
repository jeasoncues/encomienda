<?php 
 

  class Login extends Controllers{

    public function __construct(){
        //para crear variables de sesion
        session_start();
		
		//si existe la variable de session redireccionamos a dashboard caso contrario se queda en login
		if(isset($_SESSION['logeado']))
		{
			header('Location: '.base_url().'/dashboard');
		}
        parent::__construct();
    }

    public function login(){
        $data['page_tag'] = "Login - Rosa Yolanda";
        $data['page_title'] = "Login";
        $data['page_name'] = "login";
        $data['page_functions_js'] = "functions_login.js";
        $this->views->getView($this,"login",$data);
    }


    public function loginUser()
    {

      if($_POST){//si alguien a hecho una peticion de metodo POST pasamos a validar
				//que los campos no esten vacios
				if(empty($_POST['txtEmail']) || empty($_POST['txtPassword'])){
					$arrResponse = array('status' => false, 'msg' => 'Error de datos');

				}else{ //si no esta vacio

					$strUsuario = strtolower(strClean($_POST['txtEmail'])); //strtolower convierte las letras en minuscula, strclean limpia
					$strPassword = hash("SHA256", $_POST['txtPassword']);//hash encriptacion
					$requestUser = $this->model->loginUser($strUsuario,$strPassword);//modelogin metodo 

					if(empty($requestUser)){ 
            
						$arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecta');

					}else{//de lo contrario quiere decir que si encontro el usuario
						$arrData = $requestUser; //le colocamos el array de datos idpersona, status
						if ($arrData['status'] = 1){ //si el status es 1
							 
							//variables de sesion que va a ser igual al idpersona quiere decir que toma su id
							$_SESSION['idUser'] = $arrData['idpersona'];
							$_SESSION['logeado'] = true;

							//obtenemos datos del usuario logeado
							$arrData = $this->model->sessionLogin($_SESSION['idUser']);
							$_SESSION['userData'] = $arrData;

							$arrResponse = array('status' => true, 'msg' => 'ok');

						}else{  //de lo contrario quiere decir que el usuario esta inactivo
							$arrResponse = array('status' => false, 'msg' => 'Usuario Inactivo');

						}
					}
				}
				sleep(3); 
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				 
			}
			die();
    }

  }

?>
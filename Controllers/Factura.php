<?php 
  //requerimos libreria de pdf
  require 'Libraries/html2pdf/vendor/autoload.php';
  use Spipu\Html2Pdf\Html2Pdf;

  class Factura extends Controllers{
      

    public function __construct()
      {
        session_start();
        if(empty($_SESSION['logeado']))
        {
            header('Location: '.base_url().'/login');
        }
        parent::__construct();
    }

    public function generarFactura($idencomienda)
    {

      if(is_numeric($idencomienda)){
				$idpersona = "";
				$data = $this->model->selectEncomienda($idencomienda,$idpersona);
				if(empty($data)){
					echo "Datos no encontrados";
				}else{
					$idencomienda = $data['encomienda']['idencomienda'];
					ob_end_clean();
					$html = getFile("Template/Modals/comprobantePDF",$data);
					$html2pdf = new Html2Pdf('p','B6','es','true','UTF-8',array(10, 10, 25, 5)); //orientacion vertical, 
					$html2pdf->writeHTML($html);
					$html2pdf->output('Factura-'.$idencomienda.'.pdf');
				}
			}else{
				echo "Dato no válido";
			}

    }
  }

?>
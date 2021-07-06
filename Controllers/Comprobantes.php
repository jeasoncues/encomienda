<?php 
  //requerimos libreria de pdf
  require 'Libraries/html2pdf/vendor/autoload.php';
  use Spipu\Html2Pdf\Html2Pdf;

  class Comprobantes extends Controllers{
      

    public function __construct()
      {
        session_start();
        if(empty($_SESSION['logeado']))
        {
            header('Location: '.base_url().'/login');
        }
        parent::__construct();
    }

    public function generarComprobante()
    {

    
				$data = $this->model->selectClientes();
				
					ob_end_clean();
					$html = getFile("Template/Modals/reporteClientes",$data);
					$html2pdf = new Html2Pdf('p','A4','es','true','UTF-8'); //orientacion vertical, 
					$html2pdf->writeHTML($html);
					$html2pdf->output('Comprobante Clientes'.'.pdf');
    }

     public function generarComprobanteConductores()
     {

      
          $data = $this->model->selectConductores();
          
            ob_end_clean();
            $html = getFile("Template/Modals/reporteConductores",$data);
            $html2pdf = new Html2Pdf('p','A4','es','true','UTF-8'); //orientacion vertical, 
            $html2pdf->writeHTML($html);
            $html2pdf->output('Comprobante Conductores'.'.pdf');
      }

    }

?>
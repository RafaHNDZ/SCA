<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Errors extends CI_Controller{
 private $data = array();

 function __construct() {
   parent::__construct();
   //$this->load->helper('html');
 }

   public function error_404() {
   //llamamos a la vista que muestra el error 404 personalizado
    $data['titulo'] = "Pagina no Encontrada";
    $data['content'] = "404";
    $this->load->view('Plantilla',$data);
    //$this->load->view('errors/404');
   }

   public function error_500(){
     $data['titulo'] = "¡Error!";
     $data['content'] = "500";
     $this->load->view('Plantilla',$data);
   }
}

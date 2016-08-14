<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Tutor extends CI_Controller{

    function __construct(){
      parent:: __construct();
      $this->load->model('Modelo_Grupo');
    }

    public function index(){

	if(!$this->session->userdata('login_ok')){
		redirect('Principal','refresh');
	}else{

	      $data['titulo'] = "Panel del Tutores";
	      $data['content'] = "Tutor/Panel";
        //$data['numAlums'] = $this->Modelo_Grupo->numAl($this->session->userdata('usuario_id'));

	        $this->load->view('Plantilla', $data);
	    }
    }

    public function logout(){
      redirect('Principal/logout','refresh');
    }
    	
  }

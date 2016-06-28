<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Calendario');
	}

	public function index(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

		$data['Calendario'] = $this->Modelo_Calendario->genera_calendario();
		$data['titulo'] = "Panel de Control";
		$data['content'] = "Admin/C-Panel";

			$this->load->view('Plantilla', $data);
		}
	}	

}

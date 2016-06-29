<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Calendario');
		$this->load->model('Modelo_Grupo');
		$this->load->model('Modelo_Alumno');
		$this->load->model('Modelo_Tutor');
	}

	public function index(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

		$data['numGrupos'] = $this->Modelo_Grupo->num_grupos();
		$data['numAlumnos'] = $this->Modelo_Alumno->num_alumnos();
		$data['numTutores'] = $this->Modelo_Tutor->num_tutores();
		$data['Calendario'] = $this->Modelo_Calendario->genera_calendario();
		$data['titulo'] = "Panel de Control";
		$data['content'] = "Admin/C-Panel";

			$this->load->view('Plantilla', $data);
		}
	}	

}

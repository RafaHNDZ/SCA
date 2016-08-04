<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Modelo_Calendario');
		$this->load->model('Modelo_Grupo');
		$this->load->model('Modelo_Alumno');
		$this->load->model('Modelo_Tutor');
		$this->load->model('Modelo_Canalizacion');
		$this->load->model('Modelo_SesionGrupal');
		$this->load->model('Modelo_SesionPrivada');
	}

	public function index(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

			switch ($this->session->userdata('privilegios')) {
					case '1':
						redirect('Tutor','refresh');
						break;
					case '2':
						$data['numGrupos'] = $this->Modelo_Grupo->num_grupos();
						$data['numAlumnos'] = $this->Modelo_Alumno->num_alumnos();
						$data['numTutores'] = $this->Modelo_Tutor->num_tutores();
						$data['numCan'] = $this->Modelo_Canalizacion->num_canalizaciones();
						$data['numSesG'] = $this->Modelo_SesionGrupal->num_canalizacionesGrupales();
						$data['numSesP'] = $this->Modelo_SesionPrivada->nun_sesiones();
						$data['Calendario'] = $this->Modelo_Calendario->genera_calendario();
						$data['titulo'] = "Panel de Control";
						$data['content'] = "Admin/C-Panel";

							$this->load->view('Plantilla', $data);
						break;

					default:
						exit('El usuario no esta identificado.');
						break;
			}

		}
	}

	public function logout(){
		redirect('Principal/logout','refresh');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grupo extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('Modelo_Grupo');
			$this->load->model('Modelo_Especialidad');
		}

	public function index(){

		$data['arrGrup'] = $this->Modelo_Grupo->get_Grupo();

		$data['titulo'] = "Lista de Grupos";
		$data['content'] = "Admin/Lista_Grupos";
		$data['Esp'] = $this->Modelo_Especialidad->get_especialidades($data);

			$this->load->view('Plantilla', $data);
	}

	public function Registrar_Grupo(){

		$this->load->model('Modelo_Especialidad');
		$this->load->model('Modelo_Turno');
		$this->load->model('Modelo_Semestre');
		$this->load->model('Modelo_Tutor');
		$this->load->model('Modelo_Generacion');

		$data['titulo'] = "Registro de Grupo";
		$data['content'] = "Admin/frm_registroGrupo";

		$data['arrEsp'] = $this->Modelo_Especialidad->get_especialidades($data);
		$data['arrTur'] = $this->Modelo_Turno->get_Turno($data);
		$data['arrSem'] = $this->Modelo_Semestre->get_Semestre($data);
		$data['arrTut'] = $this->Modelo_Tutor->get_Tutor($data);
		$data['arrGen'] = $this->Modelo_Generacion->get_Generacion($data);

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|max_length[40]');
		$this->form_validation->set_rules('estado', 'Estado', 'required|trim|max_length[1]');
		$this->form_validation->set_rules('especialidad', 'Especialidad', 'required|trim|max_length[1]');
		$this->form_validation->set_rules('turno', 'Turno', 'required|trim|max_length[1]');
		$this->form_validation->set_rules('semestre', 'Semestre', 'required|trim|max_length[1]');
		$this->form_validation->set_rules('generacion', 'Generacion', 'required|trim|max_length[1]');
		$this->form_validation->set_rules('tutor', 'Tutor', 'required|trim|max_length[1]');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('Plantilla', $data);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model

			$form_data = array(
									'id' => set_value(0),
					       	'nombre' => set_value('nombre'),
					       	'estado' => set_value('estado'),
					       	'especialidad_id' => set_value('especialidad'),
					       	'turno_id' => set_value('turno'),
					       	'semestre_id' => set_value('semestre'),
					       	'tutor_id' => set_value('tutor'),
									'generacion_id' => set_value('generacion')
						);

			// run insert model to write data to db

			if ($this->Modelo_Grupo->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('Admin/frm_registroGrupo/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}

function del_Grupo($id){
	$this->Modelo_Grupo->delete($id);
}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidad extends CI_Controller{

	function __construct(){
			parent::__construct();
			$this->load->model('Modelo_Especialidad');
		}

public function index(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

		$data['titulo'] = "Lista de Especialidades";
		$data['content'] = "Admin/Lista_Especialidades";
		$data['arrEsp'] = $this->Modelo_Especialidad->get_especialidades($data);

			$this->load->view('Plantilla', $data);
		}
	}	

public function Registrar_Especialidad(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

			function __construct(){
				$this->load->model('Modelo_Especialidad');
			}

			$data['titulo'] = "Lista de Grupos";
			$data['content'] = "Admin/frm_registroEspecialidad";

			$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|max_length[30]');

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
						       	'nombre' => set_value('nombre')
								);

				// run insert model to write data to db

				if ($this->Modelo_Especialidad->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
					redirect('Especialidad/success');   // or whatever logic needs to occur
				}
				else
				{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
				}
			}
		}
	}

	function del_especialidad($id){
		$this->Modelo_Especialidad->delete_especialidad($id);
	}

	public function success(){

			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';

	}

}

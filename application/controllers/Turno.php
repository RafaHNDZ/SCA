<?php

class Turno extends CI_Controller {

	function __construct(){

 		parent::__construct();
		$this->load->model('Modelo_Turno');
	}

	public function index(){

	if(!$this->session->userdata('login_ok')){
		redirect('Principal','refresh');
	}else{

	    $data['arrTurno'] = $this->Modelo_Turno->get_Turno();

			$data['titulo'] = "Lista de Turnos";
			$data['content'] = "Admin/Lista_Turnos";

				$this->load->view('Plantilla', $data);
		}
	}

	public function Registrar_Turno(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

			$data['titulo'] = "Registro de Turno";
			$data['content'] = "Admin/frm_registroTurno";

			$this->form_validation->set_rules('nombreTurno', 'Nombre', 'required|trim|max_length[20]');

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
						       	'nombreTurno' => set_value('nombreTurno')
							);

				// run insert model to write data to db

				if ($this->Modelo_Turno->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
					redirect('Turno/success');   // or whatever logic needs to occur
				}
				else
				{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
				}
			}
		}
	}

	function del_Turno($id){

		$this->Modelo_Turno->delete($id);
	}

	function success(){

			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>

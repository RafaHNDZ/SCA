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
    switch ($this->session->userdata('privilegios')) {
      case '1':
        redirect('Tutor','refresh');
        break;
      case '2':
	    $data['arrTurno'] = $this->Modelo_Turno->get_Turno();

			$data['titulo'] = "Lista de Turnos";
			$data['content'] = "Admin/Lista_Turnos";

				$this->load->view('Plantilla', $data);
				break;

			default:
				exit('El usuario no esta identificado.');
				break;
		}
		}
	}

	public function Registrar_Turno(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

			$data['titulo'] = "Registro de Turno";
			$data['content'] = "Admin/frm_registroTurno";

			$this->form_validation->set_rules('nombreTurno', 'Nombre', 'xss_clean|required|trim|max_length[20]');

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

	public function logout(){
		redirect('Principal/logout','refresh');
	}
}
?>

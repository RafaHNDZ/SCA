<?php

class SesionGrupal extends CI_Controller {

	function __construct(){
 		parent::__construct();
		$this->load->model('Modelo_SesionGrupal');
	}

  public function index(){

	if(!$this->session->userdata('login_ok')){
		redirect('Principal','refresh');
	}else{
		$data['arrSesG'] = $this->Modelo_SesionGrupal->get_SesionGrupal();
	    $data['titulo'] = "Lista de Sesiones Grupales";
	    $data['content'] = "Tutor/Listas/Lista_SesionGrupal";

	      $this->load->view('Plantilla', $data);
	   }
  }

	public function Registro_SesionGrupal(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

			$data['titulo'] = "Registro de Sesión Grupal";
	    	$data['content'] = "Tutor/Formularios/frm_sesionGrupal";

			$this->form_validation->set_rules('nombreTutor', 'Nombre del Tutor', 'xss_clean|required|trim|is_numeric|max_length[1]');
			$this->form_validation->set_rules('grupo', 'Grupo', 'xss_clean|required|trim|is_numeric|max_length[1]');
			$this->form_validation->set_rules('turno', 'Turno', 'xss_clean|required|trim|is_numeric');
			$this->form_validation->set_rules('mes', 'Mes', 'xss_clean|required|trim|is_numeric|max_length[1]');
			$this->form_validation->set_rules('numeroSesion', 'Numero de la Sesión', 'xss_clean|required|trim|is_numeric|max_length[2]');
			$this->form_validation->set_rules('fecha', 'Fecha', 'xss_clean|required');
			$this->form_validation->set_rules('objetivo', 'Objetivo', 'xss_clean|required|trim|max_length[200]');
			$this->form_validation->set_rules('problematica', 'Problematica', 'xss_clean|required|trim|max_length[200]');
			$this->form_validation->set_rules('remediales', 'Actividades Remediales', 'xss_clean|required|trim|max_length[200]');
			$this->form_validation->set_rules('resultados', 'Resultados', 'xss_clean|required|trim|max_length[200]');
			$this->form_validation->set_rules('observaciones', 'Observaciones', 'xss_clean|required|trim|max_length[200]');

			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

			if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			{
				$this->load->view('Plantilla', $data);
			}
			else // passed validation proceed to post success logic
			{
			 	// build array for the model

				$form_data = array(
						       	'nombreTutor' => set_value('nombreTutor'),
						       	'grupo' => set_value('grupo'),
						       	'turno' => set_value('turno'),
						       	'mes' => set_value('mes'),
						       	'numeroSesion' => set_value('numeroSesion'),
						       	'fecha' => set_value('fecha'),
						       	'objetivo' => set_value('objetivo'),
						       	'problematica' => set_value('problematica'),
						       	'remediales' => set_value('remediales'),
						       	'resultados' => set_value('resultados'),
						       	'observaciones' => set_value('observaciones')
							);

				// run insert model to write data to db

				if ($this->Modelo_SesionGrupal->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
					redirect('SesionGrupal/success');   // or whatever logic needs to occur
				}
				else
				{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
				}
			}
		}
	}
	public function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>

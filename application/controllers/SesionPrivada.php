<?php

class SesionPrivada extends CI_Controller {

	function __construct(){

 		parent::__construct();
		$this->load->model('Modelo_SesionPrivada');
		$this->load->model('Modelo_Alumno');
	}

  function index(){
		$data['arrSesP'] = $this->Modelo_SesionPrivada->get_SesionPrivada();
    $data['titulo'] = "Lista de Sesiones Privadas";
    $data['content'] = "Tutor/Listas/Lista_SesionPrivada";

      $this->load->view('Plantilla', $data);
  }

	function Registro_SesionPrivada(){

    $data['titulo'] = "Registro de Sesión Privada";
    $data['content'] = "Tutor/Formularios/frm_sesionPrivada";
   // $data['arrAlu'] = $this->Modelo_Alumno->get_alumno_data($id_alumno);

		$this->form_validation->set_rules('nombreAlumno', 'Nombre del Alumno', 'xss_clean|required|trim|max_length[110]');
		$this->form_validation->set_rules('grupo', 'Grupo', 'xss_clean|required|trim|is_numeric|max_length[1]');
		$this->form_validation->set_rules('turno', 'Turno', 'xss_clean|required|trim|is_numeric|max_length[1]');
		$this->form_validation->set_rules('fecha', 'Fecha', 'xss_clean|required');
		$this->form_validation->set_rules('objetivo', 'Objetivo', 'xss_clean|required|trim|max_length[200]');
		$this->form_validation->set_rules('problematica', 'Problematica', 'xss_clean|required|trim|max_length[200]');
		$this->form_validation->set_rules('seguimiento', 'Seguimiento', 'xss_clean|required|trim|max_length[200]');
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
					       	'nombreAlumno' => set_value('nombreAlumno'),
					       	'grupo' => set_value('grupo'),
					       	'turno' => set_value('turno'),
					       	'fecha' => set_value('fecha'),
					       	'objetivo' => set_value('objetivo'),
					       	'problematica' => set_value('problematica'),
					       	'seguimiento' => set_value('seguimiento'),
					       	'resultados' => set_value('resultados'),
					       	'observaciones' => set_value('observaciones')
						);

			// run insert model to write data to db

			if ($this->Modelo_SesionPrivada->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('SesionPrivada/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}

		public function alumno_data($id){

			$alumno = $this->Modelo_Alumno->get_alumno_data($id);

				return $alumno;

		}

		public function logout(){
			redirect('Principal/logout','refresh');
		}
}
?>

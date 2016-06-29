<?php

class SesionPrivada extends CI_Controller {

	function __construct(){

 		parent::__construct();
		$this->load->model('Modelo_SesionPrivada');
	}

  function index(){
		$data['arrSesP'] = $this->Modelo_SesionPrivada->get_SesionPrivada();
    $data['titulo'] = "Lista de Sesiones Privadas";
    $data['content'] = "Tutor/Listas/Lista_SesionPrivada";

      $this->load->view('Plantilla', $data);
  }

	function Registro_SesionPrivada($id_alumno){

	if($id_alumno != null){		
	$data['idA'] = $id_alumno;
	}else{
	$data['idA'] = 0;	
	}
    $data['titulo'] = "Registro de Sesión Privada";
    $data['content'] = "Tutor/Formularios/frm_sesionPrivada";

		$this->form_validation->set_rules('nombreAlumno', 'Nombre del Alumno', 'required|trim|max_length[110]');
		$this->form_validation->set_rules('grupo', 'Grupo', 'required|trim|is_numeric|max_length[1]');
		$this->form_validation->set_rules('turno', 'Turno', 'required|trim|is_numeric|max_length[1]');
		$this->form_validation->set_rules('fecha', 'Fecha', 'required');
		$this->form_validation->set_rules('objetivo', 'Objetivo', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('problematica', 'Problematica', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('seguimiento', 'Seguimiento', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('resultados', 'Resultados', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('observaciones', 'Observaciones', 'required|trim|max_length[200]');

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
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>

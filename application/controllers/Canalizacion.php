<?php

class Canalizacion extends CI_Controller {

	function __construct(){

 		parent::__construct();
		$this->load->model('Modelo_Canalizacion');
	}

  public function index(){

		$data['arrCan'] = $this->Modelo_Canalizacion->get_canalizacion();

    $data['titulo'] = "Lista de Canalizaciones";
    $data['content'] = "Tutor/Listas/Lista_Canalizacion";

      $this->load->view('Plantilla', $data);
  }

	function Registro_Canalizacion(){

    $data['titulo'] = "Registro de Canalización";
    $data['content'] = "Tutor/Formularios/frm_canalizacion";

		$this->form_validation->set_rules('fecha', 'Fecha', 'required');
		$this->form_validation->set_rules('numeroControl', 'Numero de Control', 'required|trim|is_numeric|max_length[10]');
		$this->form_validation->set_rules('nombreAlumno', 'Nombre del Alumno', 'required|trim|max_length[110]');
		$this->form_validation->set_rules('semestre', 'Semestre', 'required|max_length[1]');
		$this->form_validation->set_rules('edad', 'Edad', 'required|trim|is_numeric|max_length[2]');
		$this->form_validation->set_rules('nonbreTutor', 'Nonbre del Tutor', 'required|trim|max_length[110]');
		$this->form_validation->set_rules('especialidad', 'Especialidad', 'required');
		$this->form_validation->set_rules('problematica', 'Problematica', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('servicio', 'Servicio Solicitado', 'required|trim|max_length[200]');
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
									'id' => set_value(null),
					       	'fecha' => set_value('fecha'),
					       	'numeroControl' => set_value('numeroControl'),
					       	'nombreAlumno' => set_value('nombreAlumno'),
					       	'semestre' => set_value('semestre'),
					       	'edad' => set_value('edad'),
					       	'nonbreTutor' => set_value('nonbreTutor'),
					       	'especialidad' => set_value('especialidad'),
					       	'problematica' => set_value('problematica'),
					       	'servicio' => set_value('servicio'),
					       	'observaciones' => set_value('observaciones')
						);

			// run insert model to write data to db

			if ($this->Modelo_Canalizacion->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('Canalizacion/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}

	function success(){

			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>

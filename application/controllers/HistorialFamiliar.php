<?php

/**
 * Funciones  para el manejo de Historiales Familiares dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de un Historial Familiar. Ademas de agregar, tambien incluye la 
 * modificación de la informacion y la eliminacion de esta misma. 
 * Así como otras utilidades relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

class HistorialFamiliar extends CI_Controller {

	function __construct(){
    
 		parent::__construct();
		$this->load->model('Modelo_HistorialFamiliar');
		$this->load->model('Modelo_Seguridad');
	}

	function registrarHistorialFamiliar(){

		$this->form_validation->set_rules('situacionesFamiliares', 'Situaciones Familiares', 'xss_clean|required|trim|max_length[300]');
		$this->form_validation->set_rules('integrantes', 'Integrantes de tu familia', 'xss_clean|required|trim|max_length[300]');
		$this->form_validation->set_rules('lugar', 'Lugar que ocupas en la familia', 'xss_clean|required|trim|max_length[1]');
		$this->form_validation->set_rules('relacionPaterna', 'Como calificas la relacion con tus padres', 'xss_clean|required|trim|max_length[1]');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('historialFamiliar_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model

			$form_data = array(
							'id' => set_value(0),
					       	'situacionesFamiliares' => set_value('situacionesFamiliares'),
					       	'integrantes' => set_value('integrantes'),
					       	'lugar' => set_value('lugar'),
					       	'relacionPaterna' => set_value('relacionPaterna')
							);

			// run insert model to write data to db

			if ($this->Modelo_HistorialFamiliar->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('HistorialFamiliar/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}

	public function updateHistorial(){
		$id_hHF = $this->input->post('id_hHF');
		$situacionesFamiliares = $this->input->post('situacionesFamiliares');
		$integrantes = $this->input->post('integrantes');
		$lugar = $this->input->post('lugar');
		$relacion = $this->input->post('relacion');
		$alumno_id = $this->input->post('alumno_id');

		$situacionesFamiliaresL = $this->Modelo_Seguridad->limpiarCadena($situacionesFamiliares);
		$integrantesL = $this->Modelo_Seguridad->limpiarCadena($integrantes);

		$form_data = array(
				'id' => $id_hHF,
				'situacionesFamiliares' => $situacionesFamiliaresL,
				'integrantes' => $integrantesL,
				'lugar' => $lugar,
				'relacionPaterna' => $relacion,
				'alumno_id' => $alumno_id
			);

		if($this->Modelo_HistorialFamiliar->update($form_data) == TRUE){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}

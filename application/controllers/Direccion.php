<?php

class Direccion extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Modelo_Direccion');
	}
	function index(){
		
		$this->form_validation->set_rules('calle', 'Calle', 'required|trim|max_length[45]');
		$this->form_validation->set_rules('numero', 'Numero', 'required|trim|is_numeric|max_length[5]');
		$this->form_validation->set_rules('colonia', 'Colonia', 'required|trim|max_length[45]');
		$this->form_validation->set_rules('codigoPostal', 'Codigo Postal', 'max_length[6]');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('direccion_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model

			$form_data = array(
					       	'calle' => set_value('calle'),
					       	'numero' => set_value('numero'),
					       	'colonia' => set_value('colonia'),
					       	'codigoPostal' => set_value('codigoPostal')
						);

			// run insert model to write data to db

			if ($this->Modelo_Direccion->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('Direccion/success');   // or whatever logic needs to occur
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

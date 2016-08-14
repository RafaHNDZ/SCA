<?php

/**
 * Tiene funciones para el manejo de Direcciónes dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de una Dirección. Ademas de agregar, tambien incluye la modificación de
 * la informacion y la eliminacion de esta misma. Así como otras utilidades
 * relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

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

		$this->form_validation->set_rules('calle', 'Calle', 'xss_clean|required|trim|max_length[45]');
		$this->form_validation->set_rules('numero', 'Numero', 'xss_clean|required|trim|is_numeric|max_length[5]');
		$this->form_validation->set_rules('colonia', 'Colonia', 'xss_clean|required|trim|max_length[45]');
		$this->form_validation->set_rules('codigoPostal', 'Codigo Postal', 'max_length[6]');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('direccion_view');
		}
		else
		{

			$form_data = array(
					       	'calle' => set_value('calle'),
					       	'numero' => set_value('numero'),
					       	'colonia' => set_value('colonia'),
					       	'codigoPostal' => set_value('codigoPostal')
						);

			if ($this->Modelo_Direccion->SaveForm($form_data) == TRUE){
				redirect('Direccion/success');
			}
			else{
				echo 'An error occurred saving your information. Please try again later';

			}
		}
	}
	function success(){
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}

	public function update(){
		$idDireccion = $this->input->post('idDireccion');
		$calle = $this->input->post('calle');
		$numero = $this->input->post('numero');
		$colonia = $this->input->post('colonia');
		$codigoPostal = $this->input->post('codigoPostal');
		$alumno_id = $this->input->post('alumno_id');

		$form_data = array(
			'idDireccion' => $idDireccion,
			'calle' => $calle,
			'numero' => $numero,
			'colonia' => $colonia,
			'codigoPostal' => $codigoPostal,
			'alumno_id' => $alumno_id
		);

		if($this->Modelo_Direccion->update($form_data)== true){
			return true;
		}else{
			return false;
		}
	}
}

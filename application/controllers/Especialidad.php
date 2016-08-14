<?php

/**
 * Tiene funciones para el manejo de Especialidades dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de una Especialidad. Ademas de agregar, tambien incluye la modificación de
 * la informacion y la eliminacion de esta misma. Así como otras utilidades
 * relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidad extends CI_Controller{

	function __construct(){
			parent::__construct();
			$this->load->model('Modelo_Especialidad');
			$this->load->model('Modelo_Seguridad');
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
					$data['titulo'] = "Lista de Especialidades";
					$data['content'] = "Admin/Lista_Especialidades";
					$data['arrEsp'] = $this->Modelo_Especialidad->get_especialidades($data);

						$this->load->view('Plantilla', $data);
			break;

		default:
			exit('El usuario no esta identificado.');
			break;
	}
		}
	}

public function Registrar_Especialidad(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

			function __construct(){
				$this->load->model('Modelo_Especialidad');
			}

			$data['titulo'] = "Registro de Especialidad";
			$data['content'] = "Admin/frm_registroEspecialidad";

			$this->form_validation->set_rules('nombre', 'Nombre', 'xss_clean|required|trim|max_length[30]');

			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

			if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			{
				$this->load->view('Plantilla', $data);
			}
			else // passed validation proceed to post success logic
			{
			 	// build array for the model
				$nombre = $this->input->post('nombre');
				$form_data = array(
	                            'id' => set_value(0),
						       	'nombre' => $this->encrypt->encode($nombre)
								);

				// run insert model to write data to db

				if ($this->Modelo_Especialidad->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
					redirect('Especialidad','refresh');   // or whatever logic needs to occur
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

	public function get_detalles(){
		$id = $this->input->post('id_especialidad');
		$detalles = $this->Modelo_Especialidad->detalles($id);
		if($detalles === null){
			echo "Sin Informacion.";
		}else{
			foreach($detalles as $dato);
			?>
			<form class="form-horizontal">
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="nombre">Nombre:</label>
					<div class="col-xs-10 col-sm-9">
						<input type="text" id="nombre" name="nombre" value="<?php echo $dato['nombre'];?>">
						<input type="hidden" id="id" name="id" value="<?php echo $dato['id'];?>">
					</div>
				</div>
			</form>
			<?php
		}
	}

	public function update(){

			$id = $this->input->post('id');
			$nombre = $this->input->post('nombre');

			$nombreL = $this->Modelo_Seguridad->limpiarCadena($nombre);
		
			$form_data = array(
				'id' => $id,
				'nombre' => $nombreL
				);
			if($this->Modelo_Especialidad->update($form_data) == true){
				return true;
			}else{
				return false;
			}
	}

}

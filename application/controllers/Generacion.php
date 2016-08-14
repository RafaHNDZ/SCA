<?php

/**
 * Tiene funciones para el manejo de Generaciónes dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de una Generación. Ademas de agregar, tambien incluye la modificación de
 * la informacion y la eliminacion de esta misma. Así como otras utilidades
 * relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

class Generacion extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->model('Modelo_Generacion');
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
					$data['arrGen'] = $this->Modelo_Generacion->get_Generacion();

			    $data['titulo'] = "Lista de Generaciones";
			    $data['content'] = "Admin/Lista_Generaciones";

			      $this->load->view('Plantilla', $data);
					break;

				default:
					exit('El usuario no esta identificado.');
					break;
			}
		     }
  }

	function Registrar_Generacion(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

		    $data['titulo'] = "Registro de Generaciones";
		    $data['content'] = "Admin/frm_registroGeneracion";

			$this->form_validation->set_rules('nombre', 'Nombre', 'xss_clean|required|trim|max_length[30]');

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
						       	'nombre' => set_value('nombre')
							);

				// run insert model to write data to db

				if ($this->Modelo_Generacion->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
					redirect('Generacion/success');   // or whatever logic needs to occur
				}
				else
				{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
				}
			}
		}
	}

	function del_Generacion($id){
		$this->Modelo_Generacion->delete($id);
	}

	public function get_detalles(){
		$id = $this->input->post('id_generacion');
		$detalles = $this->Modelo_Generacion->detalles($id);
		if($detalles === null){
			echo "Sin Informacion.";
		}else{
			foreach($detalles as $dato);
			?>
			<form class="form-horizontal">
				<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="ciclo">Ciclo:</label>
					<div class="col-xs-10 col-sm-9">
						<input type="text" id="ciclo" name="ciclo" value="<?php echo $dato['nombre'];?>">
						<input type="hidden" id="id" name="id" value="<?php echo $dato['id'];?>">
					</div>
				</div>
			</form>
			<?php
		}
	}

	public function updateGeneracion(){

			$id = $this->input->post('id');
			$nombre = $this->input->post('nombre');

			$nombreL = $this->Modelo_Seguridad->limpiarCadena($nombre);

			$form_data = array(
				'id' => $id,
				'nombre' => $nombreL
				);
			if($this->Modelo_Generacion->update($form_data) == true){
				return true;
			}else{
				return false;
			}
	}


}

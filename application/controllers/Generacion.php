<?php

class Generacion extends CI_Controller {

	function __construct()
	{
 		parent::__construct();
		$this->load->model('Modelo_Generacion');
	}

  public function index(){

		$data['arrGen'] = $this->Modelo_Generacion->get_Generacion();

    $data['titulo'] = "Lista de Generaciones";
    $data['content'] = "Admin/Lista_Generaciones";

      $this->load->view('Plantilla', $data);
  }

	function Registrar_Generacion(){

    $data['titulo'] = "Registro de Generaciones";
    $data['content'] = "Admin/frm_registroGeneracion";

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|max_length[30]');

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

	function del_Generacion($id){
		$this->Modelo_Generacion->delete($id);
	}

	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>

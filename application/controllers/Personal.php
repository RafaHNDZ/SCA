<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller{
	function __construct(){
			parent::__construct();
			$this->load->model('Modelo_Tutor');
		}
	public function index(){

		$data['titulo'] = "Lista de Personal";
		$data['content'] = "Admin/Lista_Personal";
		$data['arrTut'] = $this->Modelo_Tutor->get_Tutor();

			$this->load->view('Plantilla',$data);

	}

	public function Registrar_Personal(){

				$data['titulo'] = "Registro de Personal";
				$data['content'] = "Admin/frm_registroPersonal";


			$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|max_length[30]');
			$this->form_validation->set_rules('apellido_paterno', 'Apellido Paterno', 'required|trim|max_length[40]');
			$this->form_validation->set_rules('apellido_materno', 'Apellido Materno', 'required|trim|max_length[40]');
			$this->form_validation->set_rules('privilegios', 'Privilegios', 'required|max_length[1]');
			$this->form_validation->set_rules('estado', 'Estado', 'required|max_length[1]');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[40]');
			$this->form_validation->set_rules('password', 'Contraseña', 'required|trim|max_length[30]');

			$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

			if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			{
				$this->load->view('Plantilla',$data);
			}
			else // passed validation proceed to post success logic
			{
				// build array for the model

				$form_data = array(
							'id' => set_value(0),
              'nombre' => set_value('nombre'),
              'apellidoP' => set_value('apellido_paterno'),
							'apellidoM' => set_value('apellido_materno'),
							'privilegios' => set_value('privilegios'),
							'estado' => set_value('estado'),
							'email' => set_value('email'),
							'password' => set_value('password')
							);
				var_dump($form_data);
				// run insert model to write data to db

				if ($this->Modelo_Tutor->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
					redirect('Registrar_Persona/success');   // or whatever logic needs to occur
				}else{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
				}
			}


	}

	public function success(){

			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';

	}

}

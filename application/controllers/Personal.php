<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Funciones  para el manejo de Personal dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * del Personal que empleara el sistema. Ademas de agregar, tambien incluye la 
 * modificación de la informacion y la eliminacion de esta misma. 
 * Así como otras utilidades relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

class Personal extends CI_Controller{
	function __construct(){
			parent::__construct();
			$this->load->model('Modelo_Tutor');
			$this->keycrypt = $this->config->item("encryption_key");
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
				//$this->output->enable_profiler(true);

					$page=3;
					$this->load->library('pagination');
					$config['base_url'] = base_url() . 'index.php/Personal/pagina';
					$config['total_rows'] = $this->Modelo_Tutor->total();
					$config['per_page'] = $page;
					$config['num_links'] = 20;
					$this->pagination->initialize($config);

					$data['titulo'] = "Lista de Personal";
					$data['content'] = "Admin/Lista_Personal";
					$data['arrTut'] = $this->Modelo_Tutor->paginados($config['per_page'],$this->uri->segment(3));

						$this->load->view('Plantilla',$data);
				break;

			default:
				exit('El usuario no esta identificado.');
				break;
		}
			}

	}

	public function Registrar_Personal(){

	if(!$this->session->userdata('login_ok')){
		redirect('Principal','refresh');
	}else{

			$data['titulo'] = "Registro de Personal";
			$data['content'] = "Admin/frm_registroPersonal";


			$this->form_validation->set_rules('nombre', 'Nombre', 'xss_clean|required|trim|max_length[30]');
			$this->form_validation->set_rules('apellido_paterno', 'Apellido Paterno', 'xss_clean|required|trim|max_length[40]');
			$this->form_validation->set_rules('apellido_materno', 'Apellido Materno', 'xss_clean|required|trim|max_length[40]');
			$this->form_validation->set_rules('privilegios', 'Privilegios', 'xss_clean|required|max_length[1]');
			$this->form_validation->set_rules('estado', 'Estado', 'xss_clean|required|max_length[1]');
			$this->form_validation->set_rules('email', 'Email', 'xss_clean|required|trim|max_length[40]');
			$this->form_validation->set_rules('password', 'Contraseña', 'xss_clean|required|trim|max_length[30]');

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


				if ($this->Modelo_Tutor->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
					redirect('Personal');   // or whatever logic needs to occur
				}else{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
				}
			}
		}
	}

	public function mod_Personal(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{
			switch ($this->session->userdata('privilegios')) {
				case '1':
					redirect('Tutor','refresh');
					break;
				case '2':
					$id = $this->input->post('idTutor');
					$data['titulo'] = "Modificar Datos de Personal";
					$data['content'] = "Admin/frm_registroPersonal";
					$data['arrTut'] = $this->Modelo_Tutor->get_DataTutor($id);

							$this->form_validation->set_rules('nombre', 'Nombre', 'xss_clean|required|trim|max_length[30]');
							$this->form_validation->set_rules('apellido_paterno', 'Apellido Paterno', 'xss_clean|required|trim|max_length[40]');
							$this->form_validation->set_rules('apellido_materno', 'Apellido Materno', 'xss_clean|required|trim|max_length[40]');
							$this->form_validation->set_rules('privilegios', 'Privilegios', 'xss_clean|required|max_length[1]');
							$this->form_validation->set_rules('estado', 'Estado', 'xss_clean|required|max_length[1]');
							$this->form_validation->set_rules('email', 'Email', 'xss_clean|required|trim|max_length[40]');
							$this->form_validation->set_rules('password', 'Contraseña', 'xss_clean|required|trim|max_length[30]');

							$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

							if ($this->form_validation->run() == FALSE) // validation hasn't been passed
							{
								$this->load->view('Plantilla',$data);
							}
							else {
								$nombreCampo = 'imagen';
					 			$config['upload_path'] = "./imagenes/";
					 			$config['allowed_types'] ="png|jpg|gif|jpeg";
					 			$config['max_size'] = "28000";
					 			$nombreImagen = $_FILES['imagen']['name'];

					 			$this->load->library('upload', $config);

					 			if(!$this->upload->do_upload($nombreCampo)){
					 				echo $this->upload->display_errors();
					 				return $this->upload->display_errors();
					 			}else{
					 			$data['uploadSuccess'] = $this->upload->data();
								$form_data = array(
											'id' => set_value('idTutor'),
											'nombre' => set_value('nombre'),
											'apellidoP' => set_value('apellido_paterno'),
											'apellidoM' => set_value('apellido_materno'),
											'privilegios' => set_value('privilegios'),
											'estado' => set_value('estado'),
											'email' => set_value('email'),
											'imagen' => $nombreImagen,
											'password' => set_value('password')
											);


								if ($this->Modelo_Tutor->update_tutor($form_data) == TRUE){
									redirect('Personal','refresh');
								}else{
									echo "Error";
								}
				break;
					 			}

			}

		}
	}
}

	public function Actualizar_Personal($form_data){

		$this->db->replace('tutor', $form_data);
	}

	public function logout(){
		redirect('Principal/logout','refresh');
	}

}

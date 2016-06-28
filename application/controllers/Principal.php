<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Principal extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Modelo_Usuario');
		}

		public function index(){

			$data['titulo'] = "Login";
			$data['content'] = "login";

				$this->load->view('Plantilla', $data);
		}

		public function inicio_sesion(){

					$email = $this->input->post('email');
					$password = $this->input->post('password');

			if($this->Modelo_Usuario->login_user($email, $password) == TRUE){
				$usuario = $this->Modelo_Usuario->login_user($email, $password);

				foreach($usuario as $us){
			        $datasession = array(
			          'usuario_id'  => $us->id,
			          'privilegios' => $us->privilegios,
			          'nombre' => $us->nombre,
			          'login_ok' => TRUE
			        );
				}

		        $this->session->set_userdata($datasession);

		        switch ($us->privilegios) {
		        	case '1':
		        		redirect('Administrador','refresh');
		        		break;
		        	
		        	default:
		        		redirect('Tutor','refresh');
		        		break;
		        } 
			}
		
		}

		public function logout(){

		        $datasession = array(
		          'usuario_id'  => '',
		          'privilegios' => '',
		          'nombre' => '',
		          'login_ok' => FALSE
		        );

		    $this->session->set_userdata($datasession);

		    redirect('Principal', 'refresh');
		}

	}
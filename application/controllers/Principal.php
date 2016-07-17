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
			$data['alerta'] = FALSE;

				$this->load->view('Plantilla', $data);
		}

		public function inicio_sesion(){

			$data['titulo'] = "Login";
			$data['content'] = "login";
			
				$this->form_validation->set_rules('email', 'Correo', 'required|xss_clean');
				$this->form_validation->set_rules('password', 'Contraseña','required|xss_clean');
				$this->form_validation->set_message('xss_clean', 'Caracter(es) sospechoso(s) detectado(s)');


				if($this->form_validation->run()!=FALSE){

					$email = $this->input->post('email');
					$password = $this->input->post('password');

					if($this->Modelo_Usuario->login_user($email, $password) == TRUE){
						$usuario = $this->Modelo_Usuario->login_user($email, $password);

						foreach($usuario as $us){
					        $datasession = array(
					          'usuario_id'  => $us->id,
					          'privilegios' => $us->privilegios,
					          'nombre' => $us->nombre,
					          //'grupo' => $us->idGrupo,
					          'login_ok' => TRUE
					        );
						}

				        $this->session->set_userdata($datasession);

				        switch ($us->privilegios) {
				        	case '2':
				        		redirect('Administrador','refresh');
				        		break;

				        	case'1':
				        		redirect('Tutor','refresh');
				        		break;
				        	default:
				        		exit('Usuario no Identificado.');
				        		break;
				        }
					}else{
						return  "error";
					}

			}else{
				$data['alerta'] = TRUE;
				$this->load->view('Plantilla', $data);
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

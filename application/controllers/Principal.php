<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Principal extends CI_Controller{

		public function index(){

			$data['titulo'] = "Login";
			$data['content'] = "login";

				$this->load->view('Plantilla', $data);
		}
	}
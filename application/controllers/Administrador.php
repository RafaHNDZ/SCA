<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller{

	public function index(){

		$data['titulo'] = "Panel de Control";
		$data['content'] = "Admin/C-Panel";

			$this->load->view('Plantilla', $data);
	}

}

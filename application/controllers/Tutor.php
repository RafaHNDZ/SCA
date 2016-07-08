<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Tutor extends CI_Controller{

    public function index(){

	if(!$this->session->userdata('login_ok')){
		redirect('Principal','refresh');
	}else{

	      $data['titulo'] = "Panel del Tutores";
	      $data['content'] = "Tutor/Panel";

	        $this->load->view('Plantilla', $data);
	    }
    }

    public function logout(){
      redirect('Principal/logout','refresh');
    }
    	
  }

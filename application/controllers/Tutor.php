<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Tutor extends CI_Controller{

    public function index(){

      $data['titulo'] = "Panel del Tutores";
      $data['content'] = "Tutor/Panel";

        $this->load->view('Plantilla', $data);
    }
  }

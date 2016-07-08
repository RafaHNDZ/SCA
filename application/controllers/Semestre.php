<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semestre extends CI_Controller{

  function __construct(){

    parent::__construct();
    $this->load->model('Modelo_Semestre');
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
        $data['arrSem'] = $this->Modelo_Semestre->get_Semestre();

        $data['titulo'] = "Lista de Semestres";
        $data['content'] = "Admin/Lista_Semestres";

            $this->load->view('Plantilla', $data);
        break;

      default:
        exit('El usuario no esta identificado.');
        break;
    }
        }
}

  public function Registrar_Semestre(){

    if(!$this->session->userdata('login_ok')){
      redirect('Principal','refresh');
    }else{

      $data['titulo'] = "Registro de Semestre";
      $data['content'] = "Admin/frm_registroSemestre";

      $this->form_validation->set_rules('nombre', 'Nombre', 'xss_clean|required|trim|max_length[20]');

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
                'nombreSemestre' => set_value('nombre')
              );

        // run insert model to write data to db

        if ($this->Modelo_Semestre->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
        {
          redirect('Semestre/success');   // or whatever logic needs to occur
        }
        else
        {
        echo 'An error occurred saving your information. Please try again later';
        // Or whatever error handling is necessary
        }
      }
    }
  }

  public function del_Semestre($id){
    $this->Modelo_Semestre->del_Semestre($id);
    redirect('index','refresh');
  }

  public function logout(){
    redirect('Principal/logout','refresh');
  }

}

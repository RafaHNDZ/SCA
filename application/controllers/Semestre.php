<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Funciones  para el manejo de Semestres dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de Semestres que empleara el sistema. Ademas de agregar, tambien incluye la 
 * modificación de la informacion y la eliminacion de esta misma. 
 * Así como otras utilidades relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

class Semestre extends CI_Controller{

  function __construct(){

    parent::__construct();
    $this->load->model('Modelo_Semestre');
    $this->load->model('Modelo_Seguridad');
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
          redirect('Semestre','refresh');   // or whatever logic needs to occur
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

  public function get_detalles(){
    $id = $this->input->post('id_semestre');
    $detalles = $this->Modelo_Semestre->get_detalles($id);
    foreach($detalles as $dato);
    ?>
    <form class="form-horizontal" role="form" method="POST">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="nombre">Especialidad:</label>
        <div class="">
          <input id="nombre" name="nombre" type="text" class="col-xs-10 col-sm-5" value="<?php echo $dato['nombreSemestre']?>">
          <input id="id" name="id" type="hidden" value="<?php echo $dato['id']?>">
        </div>
      </div>
    </form>
    <?php
  }

  public function update($form_data){

    $id = $this->input->post('id');
    $nombre = $this->input->post('nombre');

    $nombreL = $this->Modelo_Seguridad->limpiarCadena($nombre);

    $form_data = array(
      'id' => $id,
      'nombreSemestre' => $nombreL
      );
    if($this->Modelo_Semestre->update($form_data) == true){
      return true;
    }else{
      return false;
    }
  }

}

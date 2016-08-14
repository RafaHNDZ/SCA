<?php

/**
 * Funciones  para el manejo de Historiales Medicos dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de un Historial Familiar. Ademas de agregar, tambien incluye la 
 * modificación de la informacion y la eliminacion de esta misma. 
 * Así como otras utilidades relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

class HistorialMedico extends CI_Controller{
  function __construct(){
    parent:: __construct();
    $this->load->model('Modelo_HistorialMedico');
    $this->load->model('Modelo_Seguridad');
  }

  public function updateHistorial(){
    $id = $this->input->post('id');
    $enfermedades = $this->input->post('enfermedades');
    $tratamiento = $this->input->post('tratamiento');
    $tratamientoAnterior = $this->input->post('tratamientoAnterior');
    $tipoTratamiento = $this->input->post('tipoTratamiento');
    $hospitalizacion = $this->input->post('hospitalizacion');
    $motivoHospitalizacion = $this->input->post('motivoHospitalizacion');
    $operaciones = $this->input->post('operaciones');
    $motivoOperacion = $this->input->post('motivoOperacion');
    $padeceEnfermedad = $this->input->post('padeceEnfermedad');
    $enfermedadCronica = $this->input->post('enfermedadCronica');

    $enfermedadesL = $this->Modelo_Seguridad->limpiarCadena($enfermedades);
    $tratamientoAnteriorL = $this->Modelo_Seguridad->limpiarCadena($tratamientoAnterior);
    $tipoTratamientoL = $this->Modelo_Seguridad->limpiarCadena($tipoTratamiento);
    $motivoHospitalizacionL = $this->Modelo_Seguridad->limpiarCadena($motivoHospitalizacion);
    $motivoOperacionL = $this->Modelo_Seguridad->limpiarCadena($motivoOperacion);
    $padeceEnfermedadL = $this->Modelo_Seguridad->limpiarCadena($padeceEnfermedad);
    $enfermedadCronicaL = $this->Modelo_Seguridad->limpiarCadena($enfermedadCronica);

    $form_data = array(
      'id' =>$id,
      'enfermedades' =>$enfermedadesL,
      'tratamiento' =>$tratamiento,
      'tratamientoAnterior' =>$tratamientoAnteriorL,
      'tipoTratamiento' =>$tipoTratamientoL,
      'hospitalizacion' =>$hospitalizacion,
      'motivoHospitalizacion' =>$motivoHospitalizacionL,
      'operaciones' =>$operaciones,
      'motivoOperacion' =>$motivoOperacionL,
      'padeceEnfermedad' =>$padeceEnfermedadL,
      'enfermedadCronica' =>$enfermedadCronicaL
    );
    if($this->Modelo_HistorialMedico->update($form_data) == true){
      return true;
    }else{
      return false;
    }
  }
}

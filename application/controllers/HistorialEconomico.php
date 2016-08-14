<?php

/**
 * Funciones  para el manejo de Historiales Económico dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de un Historial Económico. Ademas de agregar, tambien incluye la 
 * modificación de la informacion y la eliminacion de esta misma. 
 * Así como otras utilidades relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

class HistorialEconomico extends CI_Controller{
  function __construct(){
    parent:: __construct();
    $this->load->model('Modelo_HistorialEconomico');
    $this->load->model('Modelo_Seguridad');
  }

  public function updateHistorial(){
		$id = $this->input->post('id');
		$viveCon = $this->input->post('viveCon');
		$ingresoFamiliarMensual = $this->input->post('ingresoFamiliarMensual');
		$trabajo = $this->input->post('trabajo');
		$necesitaTrabajo = $this->input->post('necesitaTrabajo');
		$causaTrabajo = $this->input->post('causaTrabajo');

    $necesitaTrabajoL = $this->Modelo_Seguridad->limpiarCadena($necesitaTrabajo);
    $causaTrabajoL = $this->Modelo_Seguridad->limpiarCadena($causaTrabajo);

    $form_data = array(
      'id' => $id,
      'viveCon' => $viveCon,
      'ingresoFamiliarMensual' => $ingresoFamiliarMensual,
      'trabajo' => $trabajo,
      'necesitaTrabajo' => $necesitaTrabajoL,
      'causaTrabajo' => $causaTrabajoL
    );
    if($this->Modelo_HistorialEconomico->update($form_data) == true){
      return true;
    }else{
      return false;
    }
	}
}

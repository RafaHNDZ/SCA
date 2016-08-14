<?php

/**
 * Funciones  para el manejo de Historiales Academicos dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de un Historial Académixo. Ademas de agregar, tambien incluye la 
 * modificación de la informacion y la eliminacion de esta misma. 
 * Así como otras utilidades relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

class HistorialAcademico extends CI_Controller{
  function __construct(){
    parent:: __construct();
    $this->load->model('Modelo_HistorialAcademico');
  }

  public function updateHistorial(){
		$id = $this->input->post('id');
		$promedioPrimaria = $this->input->post('promedioPrimaria');
		$promedioSecundariParcialUno = $this->input->post('promedioSecundariParcialUno');
		$promedioSecundariParcialDos = $this->input->post('promedioSecundariParcialDos');
		$promedioSecundariParcialTres = $this->input->post('promedioSecundariParcialTres');
		$promedioCicloAnterior = $this->input->post('promedioCicloAnterior');

		$form_data = array(
			'id' => $id,
			'promedioPrimaria' => $promedioPrimaria,
			'promedioSecundariParcialUno' => $promedioSecundariParcialUno,
			'promedioSecundariParcialDos' => $promedioSecundariParcialDos,
			'promedioSecundariParcialTres' => $promedioSecundariParcialTres,
			'promedioCicloAnterior' => $promedioCicloAnterior
		);

		if($this->Modelo_HistorialAcademico->update($form_data) == true){
			return true;
		}else{
			return false;
		}
	}

}

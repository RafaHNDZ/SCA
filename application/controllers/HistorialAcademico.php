<?php

class HistorialAcademico extends CI_Controller{
  function __construct(){
    parent:: __construct();
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

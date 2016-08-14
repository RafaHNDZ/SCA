<?php

class SesionPrivada extends CI_Controller {

	function __construct(){

 		parent::__construct();
		$this->load->model('Modelo_SesionPrivada');
		$this->load->model('Modelo_Alumno');
	}

  function index(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

			switch ($this->session->userdata('privilegios')) {
					case '1':
						redirect('Tutor','refresh');
						break;
					case '2':
							$data['arrSesP'] = $this->Modelo_SesionPrivada->get_SesionPrivada();
						    $data['titulo'] = "Lista de Sesiones Privadas";
						    $data['content'] = "Tutor/Listas/Lista_SesionPrivada";

						      $this->load->view('Plantilla', $data);
						break;
					default:
						exit('El usuario no esta identificado.');
						break;
			}

		}
  }

	function Registro_SesionPrivada(){

    $data['titulo'] = "Registro de Sesión Privada";
    $data['content'] = "Tutor/Formularios/frm_sesionPrivada";
   // $data['arrAlu'] = $this->Modelo_Alumno->get_alumno_data($id_alumno);

		//$this->form_validation->set_rules('nombreAlumno', 'Nombre del Alumno', 'xss_clean|required|trim|max_length[110]');
		//$this->form_validation->set_rules('grupo', 'Grupo', 'required|is_numeric');
		//$this->form_validation->set_rules('turno', 'Turno', 'required|is_numeric');
		//$this->form_validation->set_rules('fecha', 'Fecha', 'required');
		$this->form_validation->set_rules('objetivo', 'Objetivo', 'xss_clean|required|trim|max_length[200]');
		$this->form_validation->set_rules('problematica', 'Problematica', 'xss_clean|required|trim|max_length[200]');
		$this->form_validation->set_rules('seguimiento', 'Seguimiento', 'xss_clean|required|trim|max_length[200]');
		$this->form_validation->set_rules('resultados', 'Resultados', 'xss_clean|required|trim|max_length[200]');
		$this->form_validation->set_rules('observaciones', 'Observaciones', 'xss_clean|required|trim|max_length[200]');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('Plantilla', $data);
			//echo "Fallo Validacion";
		}else{

			$form_data = array(
							'id' => set_value('0'),
					       	'nombreAlumno' => set_value('nombreAlumno'),
					       	'grupo' => set_value('idGrupo'),
					       	'turno' => set_value('idTurno'),
					       	'fecha' => set_value('fecha'),
					       	'objetivo' => set_value('objetivo'),
					       	'problematica' => set_value('problematica'),
					       	'seguimiento' => set_value('seguimiento'),
					       	'resultados' => set_value('resultados'),
					       	'observaciones' => set_value('observaciones'),
					       	'alumno_id' => set_value('idAlumno')
						);

			if ($this->Modelo_SesionPrivada->SaveForm($form_data) == TRUE){
				redirect('SesionPrivada','refresh');
			}else{
			echo 'An error occurred saving your information. Please try again later';
			}
		}
	}


		public function get_detalles(){
			$id = $this->input->post('id_sesion');
			$detalles = $this->Modelo_SesionPrivada->get_detalles($id);
			foreach($detalles as $detalle){
				?>
				<form action="" method="POST" class="form-horizontal">
					<div class="form-group">
						<input type="hidden" name="idSesion" id="idSesion" value="<?php echo $detalle['id']?>">
						<label for="nombre" class="col-sm-3 control-label no-padding-right">Nombre del Alumno</label>
							<input name="nombre" class="col-xs-10 col-sm-3" type="text" readonly id="nombre" value="<?php echo $detalle['nombreAlumno'];?>">
					</div>
					<div class="form-group">
						<label for="grupo" class="col-sm-3 control-label no-padding-right">Grupo</label>
							<input name="grupo" type="text" readonly class="col-xs-10 col-sm-3" value="<?php echo $detalle['nombreGrupo'];?>">
					</div>
					<div class="form-group">
						<label for="turno" class="col-sm-3 control-label no-padding-right">Turno</label>
							<input name="turno" type="text" readonly class="col-xs-10 col-sm-3" value="<?php echo $detalle['nombreTurno'];?>">
					</div>
					<div class="form-group">
						<label for="fecha" class="col-sm-3 control-label no-padding-right">Fecha</label>
							<input name="fecha" type="text" readonly class="col-xs-10 col-sm-3" value="<?php echo $detalle['fecha'];?>">
					</div>
					<div class="form-group">
						<label for="objetivo" class="col-sm-3 control-label no-padding-right">Objetivo</label>
							<textarea disabled name="objetivo" class="col-xs-10 col-sm-5"><?php echo $detalle['objetivo'];?></textarea>
					</div>
					<div class="form-group">
						<label for="problematica" class="col-sm-3 control-label no-padding-right">Problematica</label>
							<textarea disabled name="problematica" class="col-xs-10 col-sm-5"><?php echo $detalle['problematica'];?></textarea>
					</div>
					<div class="form-group">
						<label for="seguimiento" class="col-sm-3 control-label no-padding-right">Seguimiento</label>
							<textarea name="seguimiento" required="required" id="seguimiento" class="col-xs-10 col-sm-5"><?php echo $detalle['seguimiento'];?></textarea>
					</div>
					<div class="form-group">
						<label for="resultados" class="col-sm-3 control-label no-padding-right">Resultados</label>
							<textarea name="resultados" id="resultados" class="col-xs-10 col-sm-5"><?php echo $detalle['resultados'];?></textarea>
					</div>
					<div class="form-group">
						<label for="observaciones" class="col-sm-3 control-label no-padding-right">Observaciones</label>
							<textarea name="observaciones" id="observaciones" class="col-xs-10 col-sm-5"><?php echo $detalle['observaciones'];?></textarea>
					</div>
				</form>
				<?php
			}
		}

		public function updateSesion(){
			$form_data = array(
				'id' => $this->input->post('id_sesion'),
				'seguimiento' => $this->input->post('seguimiento'),
				'resultados '=> $this->input->post('resultados'),
				'observaciones' => $this->input->post('observaciones')
			);

			if($this->Modelo_SesionPrivada->update($form_data) == TRUE){
				return "Correcto";
			}else{
				return "Error!";
			}
		}

		public function toExcel($id){

 			$this->load->helper('mysql_to_excel');
 			to_excel($this->Modelo_SesionPrivada->toExcel($id),"MiExcel");
		}

		public function toXML($id){
 			$xml = $this->Modelo_SesionPrivada->toXML($id);
 			$this->load->helper('download');
 			$nombre = "Sesion Privada";
 			$nombre .=date("d-m-Y-H:i:s");
 			$nombre .= ".xml";
 				force_download($nombre,$xml);
		}


}
?>

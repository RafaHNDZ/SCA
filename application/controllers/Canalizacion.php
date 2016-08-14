<?php

/**
 * Tiene funciones para el manejo de Canalizaciónes dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de una Canalización. Ademas de agregar tambien incluye la modificación de
 * la informacion y la eliminacion de esta misma.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
 * **/

class Canalizacion extends CI_Controller {

	function __construct(){

 		parent::__construct();
		$this->load->model('Modelo_Canalizacion');
		$this->load->model('Modelo_Alumno');
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

				$data['arrCan'] = $this->Modelo_Canalizacion->get_canalizacion();
		    $data['titulo'] = "Lista de Canalizaciones";
		    $data['content'] = "Tutor/Listas/Lista_Canalizacion";

		      $this->load->view('Plantilla', $data);
					break;

				default:
					exit('El usuario no esta identificado.');
					break;
			}
  			}
  }

	public function Registro_Canalizacion(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

		    $data['titulo'] = "Registro de Canalización";
		    $data['content'] = "Tutor/Formularios/frm_canalizacion";

				$this->form_validation->set_rules('fecha', 'Fecha', 'required');
				$this->form_validation->set_rules('numeroControl', 'Numero de Control', 'xss_clean|required|trim|is_numeric|max_length[10]');
				$this->form_validation->set_rules('nombreAlumno', 'Nombre del Alumno', 'xss_clean|required|trim|max_length[110]');
				$this->form_validation->set_rules('semestre', 'Semestre', 'xss_clean|required|max_length[20]');
				$this->form_validation->set_rules('edad', 'Edad', 'xss_clean|required|trim|is_numeric|max_length[2]');
				$this->form_validation->set_rules('nonbreTutor', 'Nonbre del Tutor', 'xss_clean|required|trim|max_length[110]');
				$this->form_validation->set_rules('especialidad', 'Especialidad', 'xss_clean|required');
				$this->form_validation->set_rules('problematica', 'Problematica', 'xss_clean|required|trim|max_length[200]');
				$this->form_validation->set_rules('servicio', 'Servicio Solicitado', 'xss_clean|required|trim|max_length[200]');
				$this->form_validation->set_rules('observaciones', 'Observaciones', 'xss_clean|required|trim|max_length[200]');

				$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

				if ($this->form_validation->run() == FALSE) // validation hasn't been passed
				{
					$data['idA'] = set_value('alumno_id');
					$this->load->view('Plantilla', $data);
				}
				else // passed validation proceed to post success logic
				{
				 	// build array for the model

					$form_data = array(
						            'id' => set_value(0),
							       	'fecha' => set_value('fecha'),
							       	'numeroControl' => set_value('numeroControl'),
							       	'nombreAlumno' => set_value('nombreAlumno'),
							       	'semestre' => set_value('semestre'),
							       	'edad' => set_value('edad'),
							       	'nombreTutor' => set_value('nonbreTutor'),
							       	'especialidad' => set_value('especialidad'),
							       	'problematica' => set_value('problematica'),
							       	'solicitud' => set_value('servicio'),
							       	'observaciones' => set_value('observaciones'),
							       	'alumno_id' => set_value('alumno_id')
								);

					// run insert model to write data to db

					if ($this->Modelo_Canalizacion->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
					{
						redirect('Canalizacion');   // or whatever logic needs to occur
					}
					else
					{
					echo 'An error occurred saving your information. Please try again later';
					// Or whatever error handling is necessary
					}
				}
			}

			function success(){

					echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
					sessions have not been used and would need to be added in to suit your app';
			}

	}

	public function get_detalles(){
		$id = $this->input->post('id');
		$detalles = $this->Modelo_Canalizacion->get_data($id);
		foreach($detalles as $dato);
		?>
			<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/datepicker.min.css">
			<form method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-rigth">Fecha:</label>
					<div class="col-sm-9">
						<input readonly="readonly" type="date" name="fecha" id="fecha" class="col-xs-10 col-sm-5 input-mask-date" value="<?php echo $dato->fecha;?>">
						<input readonly="readonly" type="hidden" id="id" value="<?php echo $dato->id;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-rigth" for="numeroControl">Numero de Control:</label>
					<div class="col-sm-9">
						<input readonly="readonly" type="text" name="numeroControl" id="numeroControl" class="col-xs-10 col-sm-5" value="<?php echo $dato->numeroControl;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-rigth" for="nombreAlumno">Nombre del Alumno:</label>
					<div class="col-sm-9">
						<input readonly="readonly" type="text" name="nombreAlumno" id="nombreAlumno" class="col-xs-10 col-sm-5" value="<?php echo $dato->nombreAlumno;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-rigth" for="semestre">Semestre:</label>
					<div class="col-sm-9">
						<input readonly="readonly" type="text" name="semestre" id="semestre" class="col-xs-10 col-sm-5" value="<?php echo $dato->semestre;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-rigth" for="edad">Edad:</label>
					<div class="col-sm-9">
						<input readonly="readonly" type="text" name="edad" id="edad" class="col-xs-10 col-sm-5" value="<?php echo $dato->edad;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-rigth" for="nombreTutor">Nombre del Tutor:</label>
					<div class="col-sm-9">
						<input readonly="readonly" type="text" name="nombreTutor" id="nombreTutor" class="col-xs-10 col-sm-5" value="<?php echo $dato->nombreTutor;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-rigth" for="especialidad">Especialidad:</label>
					<div class="col-sm-9">
						<input readonly="readonly" type="text" name="especialidad" id="especialidad" class="col-xs-10 col-sm-5" value="<?php echo $dato->especialidad;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-rigth" for="problematica">Problematica:</label>
					<div class="col-sm-9">
						<textarea class="form-control limited" name="problematica" id="problematica" limit="200"><?php echo $dato->problematica;?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-rigth" for="solicitud">Solicitud:</label>
					<div class="col-sm-9">
						<textarea class="form-control limited" name="solicitud" id="solicitud" limit="200"><?php echo $dato->solicitud;?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-rigth" for="observaciones">Observaciones:</label>
					<div class="col-sm-9">
						<textarea class="form-control limited" name="observaciones" id="observaciones" limit="200"><?php echo $dato->observaciones;?></textarea>
					</div>
				</div>
				<div class="form-group">
					<input type="hidden" value="<?php echo $dato->alumno_id;?>">
				</div>
			</form>
			<script src="<?php echo base_url();?>assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
			<script>
				$('textarea.limited').inputlimiter({
					limit: 200,
					remText: '%n caracteres%s restantes...',
					limitText: 'maximo permitido : %n.'

				});
			</script>
		<?php
	}

	public function update(){

		 $id = $this->input->post('id');
		 $numeroControl = $this->input->post('numeroControl');
		 $nombreAlumno = $this->input->post('nombreAlumno');
		 $semestre = $this->input->post('semestre');
		 $edad = $this->input->post('edad');
		 $nombreTutor = $this->input->post('nombreTutor');
		 $especialidad = $this->input->post('especialidad');
		 $problematica = $this->input->post('problematica');
		 $solicitud = $this->input->post('solicitud');
		 $observaciones = $this->input->post('observaciones');

		 $problematicaL = $this->Modelo_Seguridad->limpiarCadena($problematica);
		 $solicitudL = $this->Modelo_Seguridad->limpiarCadena($solicitud);
		 $observacionesL = $this->Modelo_Seguridad->limpiarCadena($observaciones);

		 $form_data = array(
		 			'id' => $id,
					'numeroControl' => $numeroControl,
					'nombreAlumno' => $nombreAlumno,
					'semestre' => $semestre,
					'edad' => $edad,
					'nombreTutor' => $nombreTutor,
					'especialidad' => $especialidad,
					'problematica' => $problematicaL,
					'solicitud' => $solicitudL,
					'observaciones' => $observacionesL
					);

		 if($this->Modelo_Canalizacion->update($form_data) == true){
		 	return true;
		 }else{
		 	return false;
		 }
	}

	public function toExcel($id){

 		$this->load->helper('mysql_to_excel');
 		to_excel($this->Modelo_Canalizacion->toExcel($id),"MiExcel");
	}

	public function toXML($id){
 		$xml = $this->Modelo_Canalizacion->toXML($id);
 		$this->load->helper('download');
 		$nombre = "Canalizacion";
 		$nombre .=date("d-m-Y-H:i:s");
 		$nombre .= ".xml";
 			force_download($nombre,$xml);
	}

	public function delete(){
		$id = $this->input->post('id');
		if($this->Modelo_Canalizacion->delete($id) == true){
			return true;
		}else{
			return false;
		}
	}

}
?>

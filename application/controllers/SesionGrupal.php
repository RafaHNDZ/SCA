<?php

/**
 * Funciones  para el manejo de Sesiones Grupales dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de una Sesion Grupal que empleara el sistema. Ademas de agregar, tambien 
 * incluye la modificación de la informacion y la eliminacion de esta misma. 
 * Así como otras utilidades relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

class SesionGrupal extends CI_Controller {

	function __construct(){
 		parent::__construct();
		$this->load->model('Modelo_SesionGrupal');
		$this->load->model('Modelo_Seguridad');
	}

  public function index(){

	if(!$this->session->userdata('login_ok')){
		redirect('Principal','refresh');
	}else{
		$data['arrSesG'] = $this->Modelo_SesionGrupal->get_SesionGrupal();
	    $data['titulo'] = "Lista de Sesiones Grupales";
	    $data['content'] = "Tutor/Listas/Lista_SesionGrupal";

	      $this->load->view('Plantilla', $data);
	   }
  }

	public function Registro_SesionGrupal(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{
			$this->load->model('Modelo_Grupo');
			$this->load->model('Modelo_Tutor');
			$this->load->model('Modelo_Turno');
			$data['arrTur'] = $this->Modelo_Turno->get_Turno();
			$data['sesionData'] = $this->Modelo_Grupo->get_detalles_grupo($this->session->userdata('usuario_id'));
			$data['arrTut'] = $this->Modelo_Tutor->get_Tutor();
			$data['arrGrup'] = $this->Modelo_Grupo->get_Grupo();
			$data['titulo'] = "Registro de Sesión Grupal";
	    $data['content'] = "Tutor/Formularios/frm_sesionGrupal";

			$this->form_validation->set_rules('nombreTutor', 'Nombre del Tutor', 'required');
			$this->form_validation->set_rules('grupo', 'Grupo', 'required|is_numeric');
			$this->form_validation->set_rules('turno', 'Turno', 'required|is_numeric');
			$this->form_validation->set_rules('mes', 'Mes', 'required');
			$this->form_validation->set_rules('numeroSesion', 'Numero de la Sesión', 'required|is_numeric');
			$this->form_validation->set_rules('fecha', 'Fecha', 'required');
			$this->form_validation->set_rules('objetivo', 'Objetivo', 'xss_clean|required|trim|max_length[200]');
			$this->form_validation->set_rules('problematica', 'Problematica', 'xss_clean|required|trim|max_length[200]');
			$this->form_validation->set_rules('remediales', 'Actividades Remediales', 'xss_clean|required|trim|max_length[200]');
			$this->form_validation->set_rules('resultados', 'Resultados', 'xss_clean|required|trim|max_length[200]');
			$this->form_validation->set_rules('observaciones', 'Observaciones', 'xss_clean|required|trim|max_length[200]');

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
						       	'nombreTutor' => set_value('nombreTutor'),
						       	'grupo' => set_value('grupo'),
						       	'turno' => set_value('turno'),
						       	'mes' => set_value('mes'),
						       	'numeroSesion' => set_value('numeroSesion'),
						       	'fecha' => set_value('fecha'),
						       	'objetivo' => set_value('objetivo'),
						       	'problematica' => set_value('problematica'),
						       	'remediales' => set_value('remediales'),
						       	'resultados' => set_value('resultados'),
						       	'observaciones' => set_value('observaciones'),
								'id_grupo' => set_value('id_grupo')
							);

				// run insert model to write data to db

				if ($this->Modelo_SesionGrupal->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
					return false;   // or whatever logic needs to occur
				}
				else
				{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
				}
			}
		}
	}

public function detalles(){
	$id = $this->input->post('id');
	$detalles = $this->Modelo_SesionGrupal->detalles($id);
	if($detalles == null){ ?>
		<h4>Sin Datos.</h4>
	<?php
	}else{
		echo var_dump($detalles);
		foreach($detalles as $dato);?>
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="nombreTutor">Nombre del Tutor:</label>
				<div class="col-sm-9">
					<input id="nombreTutor" readonly="readonly" type="text" class="col-xs-10 col-sm-5" name="nombreTutor" value="<?php echo $dato->nombreTut." ".$dato->tutAP." ".$dato->tutAM;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="grupo">Grupo:</label>
				<div class="col-sm-9">
					<input id="grupo" readonly="readonly" type="text" class="col-xs-10 col-sm-5" name="grupo" value="<?php echo $dato->nombreGrupo;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="turno">Turno:</label>
				<div class="col-sm-9">
					<input id="turno" readonly="readonly" type="text" class="col-xs-10 col-sm-5" name="turno" value="<?php echo $dato->nombreTurno;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="mes">Mes:</label>
				<div class="col-sm-9">
	              <select id="mes" readonly="readonly" type="text" name="mes">
	                <option value="">Selecciona un Mes</option>
	                <option value="1">Enero</option>
	                <option value="2">Febrero</option>
	                <option value="3">Marzo</option>
	                <option value="4">Abril</option>
	                <option value="5">Mayo</option>
	                <option value="6">Junio</option>
	                <option value="7">Julio</option>
	                <option value="8">Agosto</option>
	                <option value="9">Sempiembre</option>
	                <option value="10">Octubre</option>
	                <option value="11">Noviembre</option>
	                <option value="12">Diciembre</option>
	              </select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="numeroSesion">Numero de la Sesión:</label>
				<div class="col-sm-9">
					<input id="numeroSesion" type="number" class="col-xs-10 col-sm-5" name="numeroSesion" value="<?php echo $dato->numeroSesion;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="fecha">Fecha:</label>
				<div class="col-sm-9">
					<input id="fecha" readonly="readonly" type="date" class="col-xs-10 col-sm-5" name="fecha" value="<?php echo $dato->fecha;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="objetivo">Objetivo:</label>
				<div class="col-sm-9">
					<textarea id="objetivo" name="objetivo" class="form-control col-xs-10 col-sm-5 limited"><?php echo $dato->objetivo;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="problematica">Problematica:</label>
				<div class="col-sm-9">
					<textarea id="problematica" name="problematica" class="form-control col-xs-10 col-sm-5 limited"><?php echo $dato->problematica;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="remediales">Remediales:</label>
				<div class="col-sm-9">
					<textarea id="remediales" name="remediales" class="form-control col-xs-10 col-sm-5 limited"><?php echo $dato->remediales;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="resultados">Resultados:</label>
				<div class="col-sm-9">
					<textarea id="resultados" name="resultados" class="form-control col-xs-10 col-sm-5 limited"><?php echo $dato->resultados;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="observaciones">Observaciones:</label>
				<div class="col-sm-9">
					<textarea id="observaciones" name="observaciones" class="form-control col-xs-10 col-sm-5 limited"><?php echo $dato->observaciones;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9">
					<input type="hidden" readonly="readonly" name="grupo_id" id="grupo_id" value="<?php echo $dato->grupo_id;?>">
				</div>
			</div>
		</form>
		<script src="<?php echo base_url();?>assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script>
			$('textarea.limited').inputlimiter({
				limit: 200,
				remText: '%n caracteres%s restantes...',
				limitText: 'maximo permitido : %n.'
			});
		      $("#mes").val(<?php echo $dato->mes;?>);
		      $("#mes").change();
		</script>
	<?php
		}
	}

	public function update(){
		$id = $this->input->post('id');
		$objetivo = $this->input->post('objetivo');
		$problematica = $this->input->post('problematica');
		$remediales = $this->input->post('remediales');
		$resultados = $this->input->post('resultados');
		$observaciones = $this->input->post('observaciones');

		$objetivoL = $this->Modelo_Seguridad->limpiarCadena($objetivo);
		$problematicaL = $this->Modelo_Seguridad->limpiarCadena($problematica);
		$remedialesL = $this->Modelo_Seguridad->limpiarCadena($remediales);
		$resultadosL = $this->Modelo_Seguridad->limpiarCadena($resultados);
		$observacionesL = $this->Modelo_Seguridad->limpiarCadena($observaciones);

		$form_data = array(
					'id' => $id,
					'objetivo' => $objetivoL,
					'problematica' => $problematicaL,
					'remediales' => $remedialesL,
					'resultados' => $resultadosL,
					'observaciones' => $observacionesL
				);

		if($this->Modelo_SesionGrupal->update($form_data) == true){
			return true;
		}else{
			return false;
		}
	}

	public function toXML($id){
 		$xml = $this->Modelo_SesionGrupal->toXML($id);
 		$this->load->helper('download');
 		$nombre = "Sesion Grupal";
 		$nombre .=date("d-m-Y-H:i:s");
 		$nombre .= ".xml";
 			force_download($nombre,$xml);
	}

	public function toExcel($id){

 		$this->load->helper('mysql_to_excel');
		$nombre = "Sesion Grupal";
 		$nombre .=date("d-m-Y-H:i:s");
 		to_excel($this->Modelo_SesionGrupal->toExcel($id),$nombre);
	}

	public function delete(){
		$id = $this->input->post('id');
		if($this->Modelo_SesionGrupal->delete($id) == true){
			return true;
		}else{
			return false;
		}
	}

	public function ses_grupo(){
		$id = $this->session->userdata('usuario_id');
		$data['arrSesG'] = $this->Modelo_SesionGrupal->getSesGrup($id);
		$data['titulo'] = "Lista de Sesiones Grupales";
		$data['content'] = "Tutor/Listas/Lista_SesionesGrupales";

			$this->load->view('Plantilla', $data);
	}
}
?>

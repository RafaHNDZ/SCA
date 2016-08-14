<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Tiene funciones para el manejo de Grupos dentro de la apliación.
 * 
 * Dentro de esta clase se localizan metodos para la agregación de registros
 * a la base de datos de la aplicaion, estos tienen relación sobre los datos
 * de un Grupo. Ademas de agregar, tambien incluye la modificación de
 * la informacion y la eliminacion de esta misma. Así como otras utilidades
 * relacionadas a esta enotras clases.
 * 
 * @author Rafael Hernández <rafa_hndz@outlook.com>
 * 
  */

class Grupo extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('Modelo_Grupo');
			$this->load->model('Modelo_Especialidad');
			$this->load->model('Modelo_Calendario');
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
					$data['arrGrup'] = $this->Modelo_Grupo->get_Grupo();
					$data['Calendario'] = $this->Modelo_Calendario->genera_calendario();
					$data['titulo'] = "Lista de Grupos";
					$data['content'] = "Admin/Lista_Grupos";
					$data['Esp'] = $this->Modelo_Especialidad->get_especialidades($data);

						$this->load->view('Plantilla', $data);
			break;

		default:
			exit('El usuario no esta identificado.');
			break;
	}
		}
	}

	public function Registrar_Grupo(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

		$this->load->model('Modelo_Especialidad');
		$this->load->model('Modelo_Turno');
		$this->load->model('Modelo_Semestre');
		$this->load->model('Modelo_Tutor');
		$this->load->model('Modelo_Generacion');

		$data['titulo'] = "Registro de Grupo";
		$data['content'] = "Admin/frm_registroGrupo";

		$data['arrEsp'] = $this->Modelo_Especialidad->get_especialidades($data);
		$data['arrTur'] = $this->Modelo_Turno->get_Turno($data);
		$data['arrSem'] = $this->Modelo_Semestre->get_Semestre($data);
		$data['arrTut'] = $this->Modelo_Tutor->get_Tutor($data);
		$data['arrGen'] = $this->Modelo_Generacion->get_Generacion($data);

		$this->form_validation->set_rules('nombre', 'Nombre', 'xss_clean|required|trim|max_length[40]');
		$this->form_validation->set_rules('estado', 'Estado', 'xss_clean|required|trim|max_length[1]');
		$this->form_validation->set_rules('especialidad', 'Especialidad', 'xss_clean|required|trim|max_length[1]');
		$this->form_validation->set_rules('turno', 'Turno', 'xss_clean|required|trim|max_length[1]');
		$this->form_validation->set_rules('semestre', 'Semestre', 'xss_clean|required|trim|max_length[1]');
		$this->form_validation->set_rules('generacion', 'Generacion', 'xss_clean|required|trim|max_length[1]');
		$this->form_validation->set_rules('tutor', 'Tutor', 'xss_clean|required|trim|max_length[1]');

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
					       	'nombre' => set_value('nombre'),
					       	'estado' => set_value('estado'),
					       	'especialidad_id' => set_value('especialidad'),
					       	'turno_id' => set_value('turno'),
					       	'semestre_id' => set_value('semestre'),
					       	'tutor_id' => set_value('tutor'),
									'generacion_id' => set_value('generacion')
						);

			// run insert model to write data to db

			if ($this->Modelo_Grupo->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('Grupo');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}

	}
	}

	public function Mi_Grupo(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{
		$id_tutor = $this->session->userdata('usuario_id');

		$data['alumnos'] = $this->Modelo_Grupo->lista_grupo($id_tutor);
		$data['titulo'] = "Mi Grupo";
		$data['content'] = "Tutor/Listas/Lista_Grupo";

		$this->load->view('Plantilla', $data);
		}
	}

	public function updateGrupo(){
		$form_data = array(
			'id' => $this->input->post('id_grupo'),
			'nombre' => $this->input->post('nombreGrupo'),
			'estado' => $this->input->post('estado'),
			'especialidad_id' => $this->input->post('especialidad'),
			'turno_id' => $this->input->post('turno'),
			'semestre_id' => $this->input->post('semestre'),
			'tutor_id' => $this->input->post('tutor'),
			'generacion_id' => $this->input->post('generacion')
		);
		if($this->Modelo_Grupo->update($form_data) == TRUE){
			return "Correcto";
		}else{
			return "Error";
		}
	}

	public function del_Grupo($id){
		$this->Modelo_Grupo->delete($id);
	}

	public function get_detalles(){

		$this->load->model('Modelo_Turno');
		$this->load->model('Modelo_Semestre');
		$this->load->model('Modelo_Tutor');
		$this->load->model('Modelo_Generacion');

		$arrEsp = $this->Modelo_Especialidad->get_especialidades();
		$arrTur = $this->Modelo_Turno->get_Turno();
		$arrSem = $this->Modelo_Semestre->get_Semestre();
		$arrTut = $this->Modelo_Tutor->get_Tutor();
		$arrGen = $this->Modelo_Generacion->get_Generacion();
		$id = $this->input->post('id_grupo');
		$detalles = $this->Modelo_Grupo->get_detalles($id);
		foreach($detalles as $dato){ ?>

			<form method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="nombre">Nombre del Grupo</label>
						<div class="col-sm-9">
							<input type="text" id="nombre" name="nombre" class="col-xs-10 col-sm-5" value="<?php echo $dato['nombreGrupo']?>">
							<input type="hidden" name="idGrupo" id="idGrupo" value="<?php echo $dato['idGrupo']?>" readonly="readonly">
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="especialidad">Especialidad del Grupo</label>
					<div class="col-sm-9">
						<select class="form-control" id="especialidad" name="especialidad" class="col-xs-10 col-sm-5">
							<option value="<?php echo $dato['idEsp'];?>"><?php echo $dato['nombreEspecialidad'];?></option>
								<?php foreach($arrEsp as $Esp){ ?>
										<option value="<?php echo $Esp['id'] ?>"><?php echo $Esp['nombre'] ?></option>
									<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="turno">Turno del Grupo</label>
					<div class="col-sm-9">
						<select class="form-control" id="turno" name="turno" class="col-xs-10 col-sm-5">
							<option value="<?php echo $dato['idTurno'];?>"><?php echo $dato['nombreTurno'];?></option>
								<?php foreach($arrTur as $Tur){ ?>
										<option value="<?php echo $Tur['id'] ?>"><?php echo $Tur['nombreTurno'] ?></option>
									<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="semestre">Semestre del Grupo</label>
					<div class="col-sm-9">
						<select class="form-control" id="semestre" name="semestre" class="col-xs-10 col-sm-5">
							<option value="<?php echo $dato['idSemestre'];?>"><?php echo $dato['nombreSemestre'];?></option>
								<?php foreach($arrSem as $Sem){ ?>
										<option value="<?php echo $Sem['id'] ?>"><?php echo $Sem['nombreSemestre'] ?></option>
									<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="tutor">Tutor del Grupo</label>
					<div class="col-sm-9">
						<select class="form-control" id="tutor" name="tutor" class="col-xs-10 col-sm-5">
							<option value="<?php echo $dato['idTutor'];?>"><?php echo $dato['tut']." ".$dato['apellidoP']." ".$dato['apellidoM'];?></option>
								<?php foreach($arrTut as $Tut){ ?>
										<option value="<?php echo $Tut['id'] ?>"><?php echo $Tut['nombre']." ".$Tut['apellidoP']." ".$Tut['apellidoM'] ?></option>
									<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="generacion">Generación del Grupo</label>
					<div class="col-sm-9">
						<select class="form-control" id="generacion" name="generacion" class="col-xs-10 col-sm-5">
							<option value="<?php echo $dato['idGeneracion'];?>"><?php echo $dato['nombreGeneracion'];?></option>
								<?php foreach($arrGen as $Gen){ ?>
										<option value="<?php echo $Gen['id'] ?>"><?php echo $Gen['nombre']?></option>
									<?php } ?>
							</select>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="estado">Estado del Grupo</label>
					<div class="col-sm-9">
						<select class="form-control" id="estado" name="estado" class="col-xs-10 col-sm-5">
							<?php if($dato['estado'] == 1){?>
								<option value="1">Activo</option>
								<option value="0">Inactivo</option>
							<?php }else{?>
								<option value="0">Inactivo</option>
								<option value="1">Activo</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</form>

	<?php	}
	}

	public function get_grupo_data($id){
		$this->load->model('Modelo_Tutor');
		$this->load->model('Modelo_Turno');
		$arrGrup = $this->Modelo_Grupo->get_Grupo();
		$arrTut = $this->Modelo_Tutor->get_Tutor();
		$arrTur = $this->Modelo_Turno->get_Turno();
		$sesion = $this->Modelo_Grupo->get_detalles_grupo($id);
		foreach($sesion as $dato){}?>
			<form class="form-horizontal" role="form" method="POST">

			</form>
		<?php
	}

	public function toXML($id){
 		$xml = $this->Modelo_Grupo->toXML($id);
 		$this->load->helper('download');
 		$nombre = "Grupo";
 		$nombre .=date("d-m-Y-H:i:s");
 		$nombre .= ".xml";
 			force_download($nombre,$xml);
	}

	public function toExcel($id){

 		$this->load->helper('mysql_to_excel');
		$nombre = "Grupo";
 		$nombre .=date("d-m-Y-H:i:s");
 		to_excel($this->Modelo_Grupo->toExcel($id),$nombre);
	}

	public function delete(){
		$id = $this->input->post('id');
		if($this->Modelo_Grupo->delete($id) == true){
			return true;
		}else{
			return false;
		}
	}

}

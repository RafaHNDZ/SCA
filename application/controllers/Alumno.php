<?php

class Alumno extends CI_Controller {

	function __construct(){

 		parent::__construct();

		$this->load->model('Modelo_Alumno');
		$this->load->model('Modelo_Grupo');
		$this->load->model('Modelo_Direccion');
		$this->load->model('Modelo_HistorialMedico');
		$this->load->model('Modelo_HistorialAcademico');
		$this->load->model('Modelo_HistorialEconomico');
		$this->load->model('Modelo_HistorialFamiliar');
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
					$data['arrFicha'] = $this->Modelo_Alumno->get_Fichas();
					$data['Calendario'] = $this->Modelo_Calendario->genera_calendario();
			    	$data['titulo'] = "Lista de Fichas";
			    	$data['content'] = "Tutor/Listas/Lista_Fichas";

			      $this->load->view('Plantilla', $data);
						break;

					default:
						exit('El usuario no esta identificado.');
						break;
				}
  	}

  }

	function Regitrar_Ficha(){

		if(!$this->session->userdata('login_ok')){
			redirect('Principal','refresh');
		}else{

    $data['titulo'] = "Registro de Ficha";
    $data['content'] = "Tutor/Formularios/frm_fichaAlumno";
    $data['arrGrupo'] = $this->Modelo_Grupo->get_Grupo();

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|max_length[30]');
		$this->form_validation->set_rules('apellidoP', 'Apellido Paterno', 'required|trim|max_length[40]');
		$this->form_validation->set_rules('apellidoM', 'Apellido Materno', 'required|trim|max_length[40]');
		$this->form_validation->set_rules('fechaNacimiento', 'Fecha de Nacimiento', 'required');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|trim|is_numeric|max_length[10]');
		$this->form_validation->set_rules('matricula', 'Matricula', 'required|trim|is_numeric');
		$this->form_validation->set_rules('grupo', 'Grupo', 'required');

		$this->form_validation->set_rules('calle', 'Calle', 'required|trim|max_length[45]');
		$this->form_validation->set_rules('numero', 'Numero', 'required|trim|is_numeric|max_length[5]');
		$this->form_validation->set_rules('colonia', 'Colonia', 'required|trim|max_length[45]');
		$this->form_validation->set_rules('codigoPostal', 'Codigo Postal', 'required|max_length[6]');

		$this->form_validation->set_rules('enfermedades', 'Enfermedades Padecidas', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('tratamiento', 'Tratamiento', 'required|trim|max_length[1]');
		$this->form_validation->set_rules('tratamientoAnterior', 'Tratamientos Anteriores', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('tipoTratamiento', 'Tipo de Tratamiento', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('hospitalizacion', 'Has tenido alguna Hospitalización', 'required|trim|max_length[1]');
		$this->form_validation->set_rules('motivoHospitalizacion', 'Motivo', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('operaciones', 'Has tenido alguna intervencion quirurjica', 'required|trim|max_length[1]');
		$this->form_validation->set_rules('motivoOperacion', 'Motivo', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('padeceEnfermedad', 'Enfermedad', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('enfermedadCronica', 'Enfermedades Cronicas', 'required|trim|max_length[200]');

		$this->form_validation->set_rules('dependeDe', 'Dependes economicamente de', 'required|max_length[1]');
		$this->form_validation->set_rules('viveCon', 'Actualmente vives con', 'required|max_length[1]');
		$this->form_validation->set_rules('ingresoFamiliarMensual', 'Ingresos Familiares', 'required|trim|is_numeric|max_length[6]');
		$this->form_validation->set_rules('trabajo', 'Tienes algun trabajo', 'required|max_length[1]');
		$this->form_validation->set_rules('necesitaTrabajo', 'Necesitas de ese trabajo', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('causaTrabajo', 'Cual es la causa', 'required|max_length[200]');

		$this->form_validation->set_rules('promedioPrimaria', 'Promedio de la Primaria', 'required|trim|is_numeric|max_length[2]');
		$this->form_validation->set_rules('promedioSecundariParcialUno', 'Promedio de Primer año de Secundaria', 'required|trim|is_numeric|max_length[2]');
		$this->form_validation->set_rules('promedioSecundariParcialDos', 'Promedio de Segundo año de Secundaria', 'required|trim|is_numeric|max_length[2]');
		$this->form_validation->set_rules('promedioSecundariParcialTres', 'Promedio de Tercer año de Secundaria', 'required|trim|is_numeric|max_length[2]');
		$this->form_validation->set_rules('promedioCicloAnterior', 'Promedio del Ciclo Anterior', 'required|trim|is_numeric|max_length[2]');

		$this->form_validation->set_rules('situacionesFamiliares', 'Situaciones Familiares', 'required|trim|max_length[300]');
		$this->form_validation->set_rules('integrantes', 'Integrantes de tu familia', 'required|trim|max_length[300]');
		$this->form_validation->set_rules('lugar', 'Lugar que ocupas en la familia', 'required|trim|max_length[1]');
		$this->form_validation->set_rules('relacionPaterna', 'Como calificas la relacion con tus padres', 'required|trim|max_length[1]');
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){

			$this->load->view('Plantilla', $data);

		}else{

			$form_data = array(
								'id' => set_value(0),
						       	'nombre' => set_value('nombre'),
						       	'apellidoP' => set_value('apellidoP'),
						       	'apellidoM' => set_value('apellidoM'),
						       	'fechaNacimiento' => set_value('fechaNacimiento'),
						       	'telefono' => set_value('telefono'),
						       	'matricula' => set_value('matricula'),
						       	'grupo_id' => set_value('grupo')
						);



			if ($this->Modelo_Alumno->SaveForm($form_data) == TRUE){


			}else{

			echo 'An error occurred saving your information. Please try again later';

			}
		}



		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){

		}else{

			$form_data = array(
							   'idDireccion' => set_value(0),
						       'calle' => set_value('calle'),
						       'numero' => set_value('numero'),
						       'colonia' => set_value('colonia'),
						       'codigoPostal' => set_value('codigoPostal'),
						       'alumno_id' => set_value('matricula')
							  );

			if ($this->Modelo_Direccion->SaveForm($form_data) == TRUE){


			}else{

			echo 'An error occurred saving your information. Please try again later';

			}
		}




		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){

		}else{

			$form_data = array(
							'id' => set_value(0),
					       	'enfermedades' => set_value('enfermedades'),
					       	'tratamiento' => set_value('tratamiento'),
					       	'tratamientoAnterior' => set_value('tratamientoAnterior'),
					       	'tipoTratamiento' => set_value('tipoTratamiento'),
					       	'hospitalizacion' => set_value('hospitalizacion'),
					       	'motivoHospitalizacion' => set_value('motivoHospitalizacion'),
					       	'operaciones' => set_value('operaciones'),
					       	'motivoOperacion' => set_value('motivoOperacion'),
					       	'padeceEnfermedad' => set_value('padeceEnfermedad'),
					       	'enfermedadCronica' => set_value('enfermedadCronica'),
					       	'alumno_id' => set_value('matricula')
						);

			if ($this->Modelo_HistorialMedico->SaveForm($form_data) == TRUE){

			}else{

			echo 'An error occurred saving your information. Please try again later';

			}
		}




		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){

		}else{

			$form_data = array(
							'id' => set_value(0),
					       	'dependeDe' => set_value('dependeDe'),
					       	'viveCon' => set_value('viveCon'),
					       	'ingresoFamiliarMensual' => set_value('ingresoFamiliarMensual'),
					       	'trabajo' => set_value('trabajo'),
					       	'necesitaTrabajo' => set_value('necesitaTrabajo'),
					       	'causaTrabajo' => set_value('causaTrabajo'),
					       	'alumno_id' => set_value('matricula')
						);

			if ($this->Modelo_HistorialEconomico->SaveForm($form_data) == TRUE){

			}else{

			echo 'An error occurred saving your information. Please try again later';

			}
		}




		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE){

		}else{

			$form_data = array(
							'id' => set_value(0),
					       	'promedioPrimaria' => set_value('promedioPrimaria'),
					       	'promedioSecundariParcialUno' => set_value('promedioSecundariParcialUno'),
					       	'promedioSecundariParcialDos' => set_value('promedioSecundariParcialDos'),
					       	'promedioSecundariParcialTres' => set_value('promedioSecundariParcialTres'),
					       	'promedioCicloAnterior' => set_value('promedioCicloAnterior'),
					       	'alumno_id' => set_value('matricula')
						);

			if ($this->Modelo_HistorialAcademico->SaveForm($form_data) == TRUE){

			}else{

			echo 'An error occurred saving your information. Please try again later';

			}
		}
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model

			$form_data = array(
							'id' => set_value(0),
					       	'situacionesFamiliares' => set_value('situacionesFamiliares'),
					       	'integrantes' => set_value('integrantes'),
					       	'lugar' => set_value('lugar'),
					       	'relacionPaterna' => set_value('relacionPaterna'),
					       	'alumno_id' => set_value('matricula')
							);

			// run insert model to write data to db

			if ($this->Modelo_HistorialFamiliar->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('Grupo/Mi_Grupo','refresh');
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}

}

	public function alumno_data(){

		$id = $this->input->post('id_alumno');
		$detalles = $this->Modelo_Alumno->get_alumno_data($id);
		foreach($detalles as $dato){
		?>
		<form class="form-horizontal" role="form">
			<div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="nombre">Nombre</label>
						<div class="col-sm-10">
							<input type="text" id="nombre" name="nombre" class="col-xs-10 col-sm-3" value="<?php echo $dato['nomAlu']?>">
							<input type="text" id="apellidoP" name="nombre" class="col-xs-10 col-sm-3" value="<?php echo $dato['apellidoP']?>">
							<input type="text" id="apellidoM" name="nombre" class="col-xs-10 col-sm-3" value="<?php echo $dato['apellidoM']?>">
						</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="fechaNacimiento">Fecha de Nacimiento</label>
					<div class="col-sm-9">
						<input class="form-control date-picker" type="date" id="fechaNacimiento" name="fechaNacimiento" class="col-xs-10 col-sm-4" value="<?php echo $dato['fechaNacimiento']?>">
					</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="matricula">Matricula</label>
					<div class="col-sm-9">
						<input type="text" id="matricula" name="matricula" class="col-xs-10 col-sm-4" value="<?php echo $dato['matricula']?>">
					</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="telefono">Telefono</label>
					<div class="col-sm-9">
						<input type="text" id="telefono" name="telefono" class="col-xs-10 col-sm-4" value="<?php echo $dato['telefono']?>">
					</div>
			</div>
			<?php
			$direccion = $this->Modelo_Direccion->getDireccion($dato['matricula']);
			foreach($direccion as $dir){}
			?>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="calle">Calle</label>
					<div class="col-sm-9">
						<input type="text" id="calle" name="calle" class="col-xs-10 col-sm-4" value="<?php echo $dir['calle']?>">
					</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="numero">Numero</label>
					<div class="col-sm-9">
						<input type="text" id="numero" name="numero" class="col-xs-10 col-sm-4" value="<?php echo $dir['numero']?>">
					</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="colonia">Colonia</label>
					<div class="col-sm-9">
						<input type="text" id="colonia" name="colonia" class="col-xs-10 col-sm-4" value="<?php echo $dir['colonia']?>">
					</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="codigoPostal">Codigo Postal</label>
					<div class="col-sm-9">
						<input type="text" id="codigoPostal" name="codigoPostal" class="col-xs-10 col-sm-4" value="<?php echo $dir['codigoPostal']?>">
					</div>
			</div>
		</form>
		<?php }
	}

	public function getHistorial(){
		$id = $this->input->post('id_alumno');
		$detalles = $this->Modelo_HistorialFamiliar->getDetalles($id);
		if($detalles != null){
			foreach($detalles as $dato);
			?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right"></label>
						<div class="col-sm-9">
							<input id="id" name="id" type="hidden" value="<?php echo $dato['id'];?>">
							<input id="alumno_id" name="alumno_id" type="hidden" value="<?php echo $dato['alumno_id'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" form="situacionesFamiliares">Situaciones Familiares:</label>
						<div class="col-xs-9">
							<textarea id="situacionesFamiliares" name="situacionesFamiliares" maxlength="50" class="form-control limited"><?php echo $dato['situacionesFamiliares'];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="integrantes">Integrantes:</label>
						<div class="col-xs-9">
							<textarea id="integrantes" name="integrantes" maxlength="50" class="form-control limited"><?php echo $dato['integrantes'];?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="lugar">Lugar:</label>
						<div class="col-xs-9">
						<select class="form-control" value="" id="lugar">
							<option value="">No Definido</option>
							<option value="1">Hijo Menor</option>
							<option value="2">Hijo Mediano</option>
							<option value="3">Hijo Mayor</option>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="relacion">Lugar:</label>
						<div class="col-xs-9">
						<select class="form-control" value="" id="relacion">
							<option value="">No Definido</option>
							<option value="1">Muy Buena</option>
							<option value="2">Buena</option>
							<option value="3">Regular</option>
							<option value="4">Mala</option>
							<option value="5">Muy Mala</option>
						</select>
						</div>
					</div>
				</form>
				<script>
		            $("#lugar").val(<?php echo $dato['lugar'];?>);
		            $("#lugar").change();
		          	$("#relacion").val(<?php echo $dato['relacionPaterna'];?>);
		            $("#relacion").change();
				</script>
			<?php
		}else{
			return "No se ha encontrado el Historial";
		}
	}

	public function getHistorialAC(){
		$id = $this->input->post('id_alumno');
		$detalles = $this->Modelo_HistorialAcademico->getDetalles($id);

		if($detalles == null){
			echo "Sin Datos";
		}else{
			foreach($detalles as $dato);
			?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-rigth" form="promedioPrimaria">Promedio Primaria:</label>
						<div class="col-sm-9">
							<input type="hidden" name="id" id="id" value="<?php echo $dato['id']?>">
							<input type="number" min="0" max="10" id="promedioPrimaria" name="promedioPrimaria" value="<?php echo $dato['promedioPrimaria']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-rigth" form="promedioSecundariParcialUno">Promedio Primaria:</label>
						<div class="col-sm-9">
							<input type="hidden" name="id" id="id" value="<?php echo $dato['id']?>">
							<input type="number" min="0" max="10" id="promedioSecundariParcialUno" name="promedioSecundariParcialUno" value="<?php echo $dato['promedioSecundariParcialUno']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-rigth" form="promedioSecundariParcialDos">Promedio Primaria:</label>
						<div class="col-sm-9">
							<input type="hidden" name="id" id="id" value="<?php echo $dato['id']?>">
							<input type="number" min="0" max="10" id="promedioSecundariParcialDos" name="promedioSecundariParcialDos" value="<?php echo $dato['promedioSecundariParcialDos']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-rigth" form="promedioSecundariParcialTres">Promedio Primaria:</label>
						<div class="col-sm-9">
							<input type="hidden" name="id" id="id" value="<?php echo $dato['id']?>">
							<input type="number" min="0" max="10" id="promedioSecundariParcialTres" name="promedioSecundariParcialTres" value="<?php echo $dato['promedioSecundariParcialTres']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-rigth" form="promedioCicloAnterior">Promedio Primaria:</label>
						<div class="col-sm-9">
							<input type="hidden" name="id" id="id" value="<?php echo $dato['id']?>">
							<input type="number" min="0" max="10" id="promedioCicloAnterior" name="promedioCicloAnterior" value="<?php echo $dato['promedioCicloAnterior']?>">
						</div>
					</div>
				</form>
			<?php
		}
	}

}

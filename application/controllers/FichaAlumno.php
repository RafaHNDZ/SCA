<?php

class FichaAlumno extends CI_Controller {

	function __construct(){

 		parent::__construct();

		$this->load->model('Modelo_FichaAlumno');
	}

  public function index(){

		$data['arrFicha'] = $this->Modelo_FichaAlumno->get_Ficha();

    $data['titulo'] = "Lista de Fichas";
    $data['content'] = "Tutor/Listas/Lista_Fichas";

      $this->load->view('Plantilla', $data);
  }

	function Regitrar_Ficha(){

    $data['titulo'] = "Registro de Ficha";
    $data['content'] = "Tutor/Formularios/frm_fichaAlumno";

		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|max_length[30]');
		$this->form_validation->set_rules('apellidoP', 'Apellido Paterno', 'required|trim|max_length[40]');
		$this->form_validation->set_rules('apellidoM', 'Apellido Materno', 'required|trim|max_length[40]');
		$this->form_validation->set_rules('fechaNacimiento', 'Fecha de Nacimiento', '');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|trim|is_numeric|max_length[10]');
		$this->form_validation->set_rules('matricula', 'Matricula', 'required|trim|is_numeric');
		$this->form_validation->set_rules('grupo', 'Grupo', 'required');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('Plantilla', $data);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model

			$form_data = array(
					       	'nombre' => set_value('nombre'),
					       	'apellidoP' => set_value('apellidoP'),
					       	'apellidoM' => set_value('apellidoM'),
					       	'fechaNacimiento' => set_value('fechaNacimiento'),
					       	'telefono' => set_value('telefono'),
					       	'matricula' => set_value('matricula'),
					       	'grupo' => set_value('grupo')
						);

			// run insert model to write data to db

			if ($this->Modelo_Alumno->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('Alumno/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}

	function registrarHistorialMedico(){

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

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('historialMedico_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model

			$form_data = array(
					       	'enfermedades' => set_value('enfermedades'),
					       	'tratamiento' => set_value('tratamiento'),
					       	'tratamientoAnterior' => set_value('tratamientoAnterior'),
					       	'tipoTratamiento' => set_value('tipoTratamiento'),
					       	'hospitalizacion' => set_value('hospitalizacion'),
					       	'motivoHospitalizacion' => set_value('motivoHospitalizacion'),
					       	'operaciones' => set_value('operaciones'),
					       	'motivoOperacion' => set_value('motivoOperacion'),
					       	'padeceEnfermedad' => set_value('padeceEnfermedad'),
					       	'enfermedadCronica' => set_value('enfermedadCronica')
						);

			// run insert model to write data to db

			if ($this->Modelo_HistorialMedico->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('historialMedico/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}

	function RegistrarHistorialEconomico()
	{
		$this->form_validation->set_rules('dependeDe', 'Dependes economicamente de', 'required|max_length[1]');
		$this->form_validation->set_rules('viveCon', 'Actualmente vives con', 'required|max_length[1]');
		$this->form_validation->set_rules('ingresoFamiliarMensual', 'Ingresos Familiares', 'required|trim|is_numeric|max_length[6]');
		$this->form_validation->set_rules('trabajo', 'Tienes algun trabajo', 'required|max_length[1]');
		$this->form_validation->set_rules('necesitaTrabajo', 'Necesitas de ese trabajo', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('causaTrabajo', 'Cual es la causa', 'max_length[200]');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('RegistrarHistorialEconomico_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model

			$form_data = array(
					       	'dependeDe' => set_value('dependeDe'),
					       	'viveCon' => set_value('viveCon'),
					       	'ingresoFamiliarMensual' => set_value('ingresoFamiliarMensual'),
					       	'trabajo' => set_value('trabajo'),
					       	'necesitaTrabajo' => set_value('necesitaTrabajo'),
					       	'causaTrabajo' => set_value('causaTrabajo')
						);

			// run insert model to write data to db

			if ($this->Modelo_HistorialEconomico->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('RegistrarHistorialEconomico/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}

	function RegistroHistorialMedico()
	{
		$this->form_validation->set_rules('promedioPrimaria', 'Promedio de la Primaria', 'required|trim|is_numeric|max_length[2]');
		$this->form_validation->set_rules('promedioSecundariParcialUno', 'Promedio de Primer año de Secundaria', 'required|trim|is_numeric|max_length[2]');
		$this->form_validation->set_rules('promedioSecundariParcialDos', 'Promedio de Segundo año de Secundaria', 'required|trim|is_numeric|max_length[2]');
		$this->form_validation->set_rules('promedioSecundariParcialTres', 'Promedio de Tercer año de Secundaria', 'required|trim|is_numeric|max_length[2]');
		$this->form_validation->set_rules('promedioCicloAnterior', 'Promedio del Ciclo Anterior', 'required|trim|is_numeric|max_length[2]');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('RegistroHistorialMedico_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model

			$form_data = array(
					       	'promedioPrimaria' => set_value('promedioPrimaria'),
					       	'promedioSecundariParcialUno' => set_value('promedioSecundariParcialUno'),
					       	'promedioSecundariParcialDos' => set_value('promedioSecundariParcialDos'),
					       	'promedioSecundariParcialTres' => set_value('promedioSecundariParcialTres'),
					       	'promedioCicloAnterior' => set_value('promedioCicloAnterior')
						);

			// run insert model to write data to db

			if ($this->Modelo_HistorialAcademico->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('RegistroHistorialMedico/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}

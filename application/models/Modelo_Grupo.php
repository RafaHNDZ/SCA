<?php

class Modelo_Grupo extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function SaveForm($form_data){
		$this->db->insert('grupo', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}

	function get_Grupo(){
		$this->db->select('grupo.*, grupo.nombre as grup, especialidad.nombre as esp, turno.nombreTurno, semestre.nombreSemestre, tutor.nombre as tut, tutor.apellidoP, tutor.apellidoM, generacion.nombre as generacion');
		$this->db->from('grupo');
		$this->db->join('especialidad','especialidad.id = especialidad_id');
		$this->db->join('turno','turno.id = turno_id');
		$this->db->join('semestre','semestre.id = semestre_id');
		$this->db->join('tutor','tutor.id = tutor_id');
		$this->db->join('generacion', 'generacion.id = generacion_id');

		$consulta = $this->db->get();
		if($consulta != null){
		return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	public function lista_grupo($id){

		$this->db->select('grupo.id as idGrupo, grupo.nombre as nombreGrupo, alumno.*');
		$this->db->from('grupo');
		$this->db->join('alumno','alumno.grupo_id = grupo.id');
		$this->db->where('grupo.tutor_id',$id);
		$consulta = $this->db->get();

			if($consulta != null){
				return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	public function num_grupos(){

		 $this->db->select('id, COUNT(id) as total');
		 $this->db->group_by('id');
		 $this->db->order_by('total', 'desc');
		 $consulta = $this->db->get('grupo', 10);

			if($consulta != null){
				return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	public function numAl($id){
		$query ='select count(id) as numeroAlumnos from alumno where alumno.grupo_id = (select id from grupo WHERE grupo.tutor_id = {$id})';
		$query = $this->db->get('alumno');
		$numAl = 0;
		foreach($query->result() as $con){
			$numAl ++;
		}
		return $numAl;
	}

	function get_detalles($id){
		$this->db->select('grupo.*,grupo.id as idGrupo, grupo.nombre as nombreGrupo, especialidad.id as idEsp, especialidad.nombre as nombreEspecialidad, turno.id as idTurno, turno.nombreTurno, semestre.id as idSemestre, semestre.nombreSemestre as nombreSemestre, tutor.id as idTutor, tutor.nombre as tut, tutor.apellidoP, tutor.apellidoM, generacion.id as idGeneracion, generacion.nombre as nombreGeneracion');
		$this->db->from('grupo');
		$this->db->join('especialidad','especialidad.id = especialidad_id');
		$this->db->join('turno','turno.id = turno_id');
		$this->db->join('semestre','semestre.id = semestre_id');
		$this->db->join('tutor','tutor.id = tutor_id');
		$this->db->join('generacion', 'generacion.id = generacion_id');
		$this->db->where('grupo.id', $id);

		$consulta = $this->db->get();
		if($consulta != null){
		return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	function delete($id){
		$this->db->where('id',$id);
		if($this->db->delete('grupo') == true){
			redirect('Grupo','refresh');
		}else{
			echo "Error al eliminar el registro";
		}
	}

	public function update($form_data){
		$this->db->where('grupo.id',$form_data['id']);
		$this->db->update('grupo',$form_data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	public function get_detalles_grupo($id){
		$this->db->select('tutor.nombre, tutor.apellidoP, tutor.apellidoM, grupo.id as idGrupo, grupo.nombre, turno.id as idTurno, turno.nombreTurno');
		$this->db->from('tutor');
		$this->db->join('grupo','grupo.tutor_id = tutor.id');
		$this->db->join('turno','turno.id = grupo.turno_id');
		$this->db->where('tutor.id',$id);
		$consulta = $this->db->get();
		if($consulta !=null){
			return $resultado = $consulta->result_array();
		}else{
			return "Sin Datos";
		}
	}

	public function toExcel($id){
		//Obtener los nombres de los campos
		$fields = $this->db->field_data('grupo');
		$this->db->where('grupo.id',$id);
		$query = $this->db->get('grupo');
		return array(
				"fields" => $fields,
				"query"  => $query
			);
	}
	
	public function toXML($id){
		$this->load->dbutil();
		$this->db->where('grupo.id',$id);
		$consulta = $this->db->get('grupo');
		$config = array(
			'root' => 		'Grupo',
			'element' =>	'grupo',
			'newline' => 	"\n",
			'tab' =>		"\t"
			);
		$respuestaXML = $this->dbutil->xml_from_result($consulta, $config);

			return $respuestaXML;
		}

}

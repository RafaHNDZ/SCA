<?php

class Modelo_SesionGrupal extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function SaveForm($form_data){

		$this->db->insert('sesiongrupal', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}

	function get_SesionGrupal(){
		$this->db->select('sesiongrupal.*, sesiongrupal.id as sesGrupId, tutor.nombre, grupo.nombre as nombreGrupo, fecha');
		$this->db->from('sesiongrupal');
		$this->db->join('tutor','tutor.id = sesiongrupal.nombreTutor');
		$this->db->join('grupo','grupo.id = sesiongrupal.grupo');

		$consulta = $this->db->get();
		if($consulta != null){
		return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	public function num_canalizacionesGrupales(){

	 $this->db->select('id, COUNT(id) as total');
	 $this->db->from('sesiongrupal');
	 $this->db->group_by('id');
	 $this->db->order_by('total', 'desc');
	 $consulta = $this->db->get();

		if($consulta != null){
			return $resultado = $consulta->result_array();
		}else{
			return null;
		}
	}

	public function detalles($id){
		$this->db->select('sesiongrupal.*, tutor.id as idTutor, tutor.nombre as nombreTut, tutor.apellidoP as tutAP, tutor.apellidoM as tutAM, grupo.nombre as nombreGrupo, turno.nombreTurno');
		$this->db->from('sesiongrupal');
		$this->db->join('tutor', 'tutor.id = sesiongrupal.nombreTutor');
		$this->db->join('grupo', 'grupo.id = sesiongrupal.grupo');
		$this->db->join('turno', 'turno.id = sesiongrupal.turno');
		$this->db->where('sesiongrupal.id', $id);
		$consulta = $this->db->get();
		return $resultado = $consulta->result();

		if($consulta != null){
			return $resultado = $consulta->result();
		}else{
			return null;
		}
	}

	public function update($form_data){
		$this->db->where('sesiongrupal.id', $form_data['id']);
		$this->db->update('sesiongrupal', $form_data);
		if($this->db->affected_rows() == '1'){
			return true;
		}else{
			return false;
		}
	}

	public function toExcel($id){
		//Obtener los nombres de los campos
		$fields = $this->db->field_data('sesiongrupal');
		$this->db->select('sesiongrupal.*, tutor.id as idTutor, tutor.nombre as nombreTut, tutor.apellidoP as tutAP, tutor.apellidoM as tutAM, grupo.nombre as nombreGrupo, turno.nombreTurno');
		$this->db->from('sesiongrupal');
		$this->db->join('tutor', 'tutor.id = sesiongrupal.nombreTutor');
		$this->db->join('grupo', 'grupo.id = sesiongrupal.grupo');
		$this->db->join('turno', 'turno.id = sesiongrupal.turno');
		$this->db->where('sesiongrupal.id', $id);
		$query = $this->db->get();
		return array(
				"fields" => $fields,
				"query"  => $query
			);
	}

	public function toXML($id){
		$this->load->dbutil();
		$this->db->select('sesiongrupal.*, tutor.id as idTutor, tutor.nombre as nombreTut, tutor.apellidoP as tutAP, tutor.apellidoM as tutAM, grupo.nombre as nombreGrupo, turno.nombreTurno');
		$this->db->from('sesiongrupal');
		$this->db->join('tutor', 'tutor.id = sesiongrupal.nombreTutor');
		$this->db->join('grupo', 'grupo.id = sesiongrupal.grupo');
		$this->db->join('turno', 'turno.id = sesiongrupal.turno');
		$this->db->where('sesiongrupal.id', $id);
		$consulta = $this->db->get();
		$config = array(
			'root' => 		'Grupo',
			'element' =>	'grupo',
			'newline' => 	"\n",
			'tab' =>		"\t"
			);
		$respuestaXML = $this->dbutil->xml_from_result($consulta, $config);

			return $respuestaXML;
		}

		public function delete($id){
			$this->db->where('sesiongrupal.id', $id);
			$this->db->delete('sesiongrupal');
			if($this->db->affected_rows() == '1'){
				return true;
			}else{
				return false;
			}
		}

		public function getSesGrup($id){
			$this->db->select('grupo.id, sesiongrupal.*, sesiongrupal.id as sesGrupId, tutor.nombre, grupo.nombre as nombreGrupo, fecha');
			$this->db->from('grupo');
			$this->db->where('grupo.tutor_id', $id);
			$this->db->join('sesiongrupal', 'sesiongrupal.grupo = grupo.id');
			$this->db->join('tutor','tutor.id = sesiongrupal.nombreTutor');
			$consulta = $this->db->get();
			if($consulta != null){
				return $resultado = $consulta->result();
			}else{
				return null;
			}

		}

	}

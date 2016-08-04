<?php

class Modelo_SesionPrivada extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function SaveForm($form_data){

		$this->db->insert('sesionprivada', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}

		return FALSE;
	}

  function get_SesionPrivada(){
		$this->db->select('id,nombreAlumno,grupo,fecha');
		$this->db->from('sesionprivada');
		$consulta = $this->db->get();
		if($consulta != null){
		return $resultado = $consulta->result_array();
			}else{
				return null;
			}
	}

	public function toExcel($id){
		//Obtener los nombres de los campos
		$fields = $this->db->field_data('sesionprivada');
		$this->db->where('sesionprivada.id',$id);
		$query = $this->db->get('sesionprivada');
		return array(
				"fields" => $fields,
				"query"  => $query
			);
	}

	public function update($form_data){
		$this->db->where('sesionprivada.id',$form_data['id']);
		$this->db->update('sesionprivada',$form_data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	public function toXML($id){
		$this->load->dbutil();
		$this->db->where('sesionprivada.id',$id);
		$consulta = $this->db->get('sesionprivada');
		$config = array(
			'root' => 		'SesionPrivada',
			'element' =>	'sesionprivada',
			'newline' => 	"\n",
			'tab' =>		"\t"
			);
		$respuestaXML = $this->dbutil->xml_from_result($consulta, $config);

			return $respuestaXML;
		}

	function get_detalles($id){
		$this->db->select('sesionprivada.*, turno.nombreTurno as nombreTurno, grupo.nombre as nombreGrupo');
		$this->db->from('sesionprivada');
		$this->db->join('turno','turno.id = sesionprivada.turno');
		$this->db->join('grupo','grupo.id = sesionprivada.grupo');
		$this->db->where('sesionprivada.id', $id);
		$detalles = $this->db->get();
		return $resultado = $detalles->result_array();
	}

	public function nun_sesiones(){

	 $this->db->select('id, COUNT(id) as total');
	 $this->db->from('sesionprivada');
	 $this->db->group_by('id');
	 $this->db->order_by('total', 'desc');
	 $consulta = $this->db->get();

		if($consulta != null){
			return $resultado = $consulta->result_array();
		}else{
			return null;
		}
	}
}
?>

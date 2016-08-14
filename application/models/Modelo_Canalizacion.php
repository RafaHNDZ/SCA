<?php

class Modelo_Canalizacion extends CI_Model {

	function __construct(){

		parent::__construct();
	}

	function SaveForm($form_data){

		$this->db->insert('canalizacion', $form_data);

		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}else{

		return FALSE;
	}
}

function get_canalizacion(){

	$this->db->select('id, fecha, nombreAlumno, nombreTutor');
	$this->db->from('canalizacion');
	$consulta = $this->db->get();
	if($consulta != null){
	return $resultado = $consulta->result_array();
		}else{
			return null;
		}
	}

	public function num_canalizaciones(){

	 $this->db->select('id, COUNT(id) as total');
	 $this->db->from('canalizacion');
	 $this->db->group_by('id');
	 $this->db->order_by('total', 'desc');
	 $consulta = $this->db->get();

		if($consulta != null){
			return $resultado = $consulta->result_array();
		}else{
			return null;
		}
	}

	public function get_data($id){
		$this->db->select('*');
		$this->db->from('canalizacion');
		$this->db->where('canalizacion.id', $id);
		$consulta = $this->db->get();
		if($consulta != null){
			return $resultado = $consulta->result();
		}else{
			return null;
		}
	}

	public function update($form_data){
		$this->db->where('canalizacion.id', $form_data['id']);
		$this->db->update('canalizacion', $form_data);
		if($this->db->affected_rows() == '1'){
			return true;
		}else{
			return false;
		}
	}

	public function toExcel($id){
		//Obtener los nombres de los campos
		$fields = $this->db->field_data('canalizacion');
		$this->db->where('canalizacion.id',$id);
		$query = $this->db->get('canalizacion');
		return array(
				"fields" => $fields,
				"query"  => $query
			);
	}
	public function toXML($id){
		$this->load->dbutil();
		$this->db->where('canalizacion.id',$id);
		$consulta = $this->db->get('canalizacion');
		$config = array(
			'root' => 		'Canalizacion',
			'element' =>	'canalizacion',
			'newline' => 	"\n",
			'tab' =>		"\t"
			);
		$respuestaXML = $this->dbutil->xml_from_result($consulta, $config);

			return $respuestaXML;
		}

	public function delete($id){
		$this->db->where('canalizacion.id', $id);
		$this->db->delete('canalizacion');
		if($this->db->affected_rows() == '1'){
			return true;
		}else{
			return false;
		}
	}

}

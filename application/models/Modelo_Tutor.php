<?php
class Modelo_Tutor extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function SaveForm($form_data){
		
		$this->db->insert('tutor', $form_data);

		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}else{
			return FALSE;
		}
  }

		public function total(){
			$sql = $this->db->get('tutor');
			return $sql->num_rows();
		}

		public function paginados($cant, $segmento){
			$sql = $this->db->get('tutor', $cant, $segmento);
			if($sql->num_rows()>0){
				foreach($sql->result() as $res){
					$data[] = $res;
				}
				return $data;
			}else{
				return false;
			}
		}

	public function get_Tutor(){
			$this->db->select('id,nombre,apellidoP,apellidoM,privilegios,estado,email');
			$this->db->from('tutor');
			$consulta = $this->db->get();
			if($consulta != null){
			return $data =$consulta->result_array();
				}else{
					return null;
				}
		}

	public function get_DataTutor($id){
			$this->db->select('id,nombre,apellidoP,apellidoM,privilegios,estado,password,email');
			$this->db->from('tutor');
			$this->db->where('tutor.id',$id);
			$consulta = $this->db->get();
			if($consulta != null){
			return $data =$consulta->result_array();
				}else{
					return null;
				}
		}

	public function num_tutores(){

	 $this->db->select('id, COUNT(id) as total');
	 $this->db->group_by('id');
	 $this->db->order_by('total', 'desc');
	 $consulta = $this->db->get('tutor', 10);

		if($consulta != null){
			return $resultado = $consulta->result_array();
		}else{
			return null;
		}
	}

	public function update_tutor($form_data){
		$this->db->where('tutor.id',$form_data['id']);
		$this->db->update('tutor',$form_data);
		if($this->db->affected_rows() == '1'){
			return true;
		}else{
			return false;
		}
	}
}

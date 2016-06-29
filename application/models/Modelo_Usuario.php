<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelo_Usuario extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

		public function login_user($email, $password){

			$this->db->select('tutor.id, tutor.nombre, tutor.privilegios, tutor.estado, grupo.id as idGrupo');
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$this->db->join('grupo','grupo.tutor_id = tutor.id');
			$query = $this->db->get('tutor');
			if($query->num_rows() > 0){

				return $query->result();

			}else{				
				redirect('Principal','refresh');
			}
		}

}
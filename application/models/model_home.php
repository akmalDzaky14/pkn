<?php

class model_home extends CI_Model {

	public $table = 'uploud_admin';
	public function __construct()
    {
		$this->load->database();
		$this->load->library('session');
    }


	public function insert($data) {
		$query = $this->db->insert($this->table, $data);
		return $query;
	}
}

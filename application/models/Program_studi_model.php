<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_studi_model extends CI_Model {
	public $id;
	public $program_studi;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		$query = $this->db->get('program_studi');
		return $query->result();
	}

	public function get_all_kv()
	{
		$query = $this->get_all();

		foreach ($query as $r) {
			$result[$r->id] = $r->program_studi;
		}

		return $result;
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama_model extends CI_Model{
	public $id;
	public $agama;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		$query = $this->db->get('agama');
		return $query->result();
	}

	public function get_all_kv()
	{
		$query = $this->get_all();

		foreach ($query as $r)
		{
			$result[$r->id] = $r->agama;
		}

		return $result;
	}
}
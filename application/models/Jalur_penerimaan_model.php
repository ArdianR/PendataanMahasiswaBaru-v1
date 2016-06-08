<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jalur_penerimaan_model extends CI_Model {
	public $id;
	public $tahun;
	public $jalur;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($tahun)
	{
		$query = $this->db->where('tahun', $tahun)->get('jalur_penerimaan');
		return $query->result();
	}

	public function get_all_kv($tahun)
	{
		$query = $this->get_all($tahun);

		foreach ($query as $r)
		{
			$result[$r->id] = $r->jalur;
		}

		return $result;
	}
}
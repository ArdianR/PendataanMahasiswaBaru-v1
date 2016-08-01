<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_penerimaan_model extends CI_Model {
	public $tahun;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($tahun)
	{
		$query = $this->db->get('tahun_penerimaan');
		return $query->result();
	}
}

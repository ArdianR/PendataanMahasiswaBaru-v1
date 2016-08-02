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

	public function create_basic_schema($db = NULL)
	{
		if ($db === NULL)
			$db = $this->db;

		return $db->query("CREATE TABLE `tahun_penerimaan` (
							  `tahun` varchar(4) NOT NULL PRIMARY KEY
							)");
	}

	public function insert_basic_rows($db = NULL)
	{
		if ($db === NULL)
			$db = $this->db;
		
		return $db->query("INSERT INTO `tahun_penerimaan` (`tahun`) VALUES
							('" . date('Y') . "')");
	}
}

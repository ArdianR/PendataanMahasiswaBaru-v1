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

	public function create_basic_schema($db = NULL)
	{
		if ($db === NULL)
			$db = $this->db;

		return $db->query("CREATE TABLE `program_studi` (
							  `id` varchar(5) NOT NULL PRIMARY KEY,
							  `program_studi` varchar(30) NOT NULL
							)");
	}

	public function insert_basic_rows($db = NULL)
	{
		if ($db === NULL)
			$db = $this->db;
		
		return $db->query("INSERT INTO `program_studi` (`id`, `program_studi`) VALUES
							('D3-TI', 'D-III Teknik Informatika'),
							('D4-TI', 'D-IV Teknik Informatika')");
	}

	public function insert_rows_from_master($db)
	{
		if ($db === NULL)
			return false;

		$result = $this->get_all();

		$db->trans_start();

		foreach ($result as $data)
		{
			$db->query("INSERT INTO `program_studi` (`id`, `program_studi`) VALUES (?, ?)",
						array($data->id, $data->program_studi));
		}

		$db->trans_complete();
		return $db->trans_status();
	}
}
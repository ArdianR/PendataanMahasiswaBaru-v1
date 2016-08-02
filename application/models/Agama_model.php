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

	public function create_basic_schema($db = NULL)
	{
		if ($db === NULL)
			$db = $this->db;

		return $db->query("CREATE TABLE `agama` (
								  `id` integer NOT NULL PRIMARY KEY AUTO" . ($db->dbdriver == "mysqli" ? "_" : "") . "INCREMENT,
								  `agama` varchar(20) NOT NULL
								)");
	}

	public function insert_basic_rows($db = NULL)
	{
		if ($db === NULL)
			$db = $this->db;
		
		return $db->query("INSERT INTO `agama` (`agama`) VALUES
								('Islam'),
								('Kristen Protestan'),
								('Kristen Katolik'),
								('Hindu'),
								('Buddha'),
								('Khonghucu')");
	}

	public function insert_rows_from_master($db)
	{
		if ($db === NULL)
			return false;

		$result = $this->get_all();

		$db->trans_start();

		foreach ($result as $data)
		{
			$db->query("INSERT INTO `agama` (`id`, `agama`) VALUES (?, ?)",
						array($data->id, $data->agama));
		}

		$db->trans_complete();
		return $db->trans_status();
	}
}
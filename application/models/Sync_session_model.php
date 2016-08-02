<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sync_session_model extends CI_Model {
	public $id;
	public $start_time;
	public $end_time;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($tahun)
	{
		$query = $this->db->get('sync_session');
		return $query->result();
	}

	public function create_new()
	{
		$id = md5(microtime());

		$query = $db->query("INSERT INTO `sync_session` (`id`) VALUES (?)", array($id));

		if ($query)
		{
			return $id;
		}
		else
		{
			return $query;
		}
	}

	public function create_basic_schema($db = NULL)
	{
		if ($db === NULL)
			$db = $this->db;

		return $db->query("CREATE TABLE `sync_session` (
							  `id` varchar(32) NOT NULL PRIMARY KEY,
							  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
							  `end_time` timestamp NULL
							)");
	}
}

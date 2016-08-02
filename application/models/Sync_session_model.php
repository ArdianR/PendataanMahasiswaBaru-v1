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

	public function get_all()
	{
		$query = $this->db->get('sync_session');
		return $query->result();
	}

	public function create_new()
	{
		$id = md5(microtime());

		$query = $this->db->query("INSERT INTO `sync_session` (`id`) VALUES (?)", array($id));

		if ($query)
		{
			return $id;
		}
		else
		{
			return $query;
		}
	}

	public function close_session($session_id)
	{
		$data = array('end_time' => date('Y-m-d H:i:s'));

		$this->db->where('id', $session_id);
		return $this->db->update('sync_session', $data);
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

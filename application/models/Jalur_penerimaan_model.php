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

	public function get_upcoming()
	{
		$query = $this->db->where('end_time >=', date('Y-m-d H:i:s'))->get('jalur_penerimaan');
		
		return $query->result();
	}

	public function get_upcoming_kv()
	{
		$query = $this->get_upcoming();

		foreach ($query as $r)
		{
			$result[$r->id] = $r->jalur;
		}

		return $result;
	}

	public function create_basic_schema($db = NULL)
	{
		if ($db === NULL)
			$db = $this->db;

		$db->trans_start();

		$db->query("CREATE TABLE `jalur_penerimaan` (
					  `id` integer NOT NULL PRIMARY KEY AUTO" . ($db->dbdriver == "mysqli" ? "_" : "") . "INCREMENT,
					  `tahun` varchar(4) NOT NULL REFERENCES `tahun_penerimaan` (`tahun`) ON DELETE RESTRICT ON UPDATE RESTRICT,
					  `jalur` varchar(30) NOT NULL,
					  `start_time` datetime NOT NULL,
					  `end_time` datetime NOT NULL
					)");

		if ($db->dbdriver == "mysqli")
		{
			$db->query("ALTER TABLE `jalur_penerimaan` ADD INDEX(`tahun`)");
		}

		$db->trans_complete();
		return $db->trans_status();
	}

	public function insert_basic_rows($db = NULL)
	{
		if ($db === NULL)
			$db = $this->db;
		
		return $db->query("INSERT INTO `jalur_penerimaan` (`id`, `tahun`, `jalur`, `start_time`, `end_time`) VALUES
							(1, '2016', 'PMDK Akademik', '2016-06-09 07:00:00', '2016-06-09 23:59:59'),
							(2, '2016', 'PMDK Bidik Misi (Utama)', '2016-06-09 07:00:00', '2016-06-09 23:59:59')");
	}

	public function insert_rows_from_master($db)
	{
		if ($db === NULL)
			return false;

		$result = $this->get_all(date('Y'));

		$db->trans_start();

		foreach ($result as $data)
		{
			$db->query("INSERT INTO `jalur_penerimaan` (`id`, `tahun`, `jalur`, `start_time`, `end_time`) VALUES
						(?, ?, ?, ?, ?)",
						array($data->id, $data->tahun, $data->jalur, $data->start_time, $data->end_time));
		}

		$db->trans_complete();
		return $db->trans_status();
	}

}
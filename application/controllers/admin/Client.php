<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('agama_model');
		$this->load->model('jalur_penerimaan_model');
		$this->load->model('program_studi_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('tahun_penerimaan_model');
	}

	public function index()
	{
		if (file_exists(FCPATH . 'data.db'))
			unlink(FCPATH . 'data.db');

		$this->create_database();

		echo "Success!";
	}

	private function create_database()
	{
		$config = array(
			'dsn'	=> '',
			'hostname' => 'sqlite:' . FCPATH . 'data.db',
			'username' => '',
			'password' => '',
			'database' => '',
			'dbdriver' => 'pdo',
			'dbprefix' => '',
			'pconnect' => FALSE,
			'db_debug' => (ENVIRONMENT !== 'production'),
			'cache_on' => FALSE,
			'cachedir' => '',
			'char_set' => 'utf8',
			'dbcollat' => 'utf8_general_ci',
			'swap_pre' => '',
			'encrypt' => FALSE,
			'compress' => FALSE,
			'stricton' => FALSE,
			'failover' => array(),
			'save_queries' => TRUE
		);
		$db = $this->load->database($config, TRUE);

		$this->agama_model->create_basic_schema($db);
		$this->agama_model->insert_rows_from_master($db);

		$this->tahun_penerimaan_model->create_basic_schema($db);
		$this->tahun_penerimaan_model->insert_basic_rows($db);

		$this->program_studi_model->create_basic_schema($db);
		$this->program_studi_model->insert_rows_from_master($db);

		$this->jalur_penerimaan_model->create_basic_schema($db);
		$this->jalur_penerimaan_model->insert_rows_from_master($db);

		$this->mahasiswa_model->create_basic_schema($db);

		$db->close();
	}
}

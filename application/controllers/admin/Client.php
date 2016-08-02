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
		unlink(FCPATH . 'client/data.db');

		$this->create_database();

		echo "Success!";
	}

	private function create_database()
	{
		$db = $this->load->database('sqlite-client', TRUE);

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

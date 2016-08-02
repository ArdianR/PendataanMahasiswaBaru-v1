<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sync extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('mahasiswa_model');

		if ( ! $this->is_client())
			$this->load->model('sync_session_model');
	}

	private function is_client()
	{
		return ENVIRONMENT == 'cli-server';
	}

	public function index()
	{
		if ( ! $this->is_client())
			return false;

		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$this->load->view('Mahasiswa/index', $data);
		}
		else
		{
			
		}
	}

	public function start_session()
	{
		if ($this->is_client())
			return false;

		$id = $this->sync_session_model->create_new();

		if ($id)
		{
			echo $id;
		}
		else
		{
			echo "ERROR";
		}
	}
}

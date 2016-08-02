<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');

		$this->load->model('agama_model');
		$this->load->model('jalur_penerimaan_model');
		$this->load->model('program_studi_model');
		$this->load->model('mahasiswa_model');

		$this->load->library('user_agent');

		if (ENVIRONMENT == 'cli-server' && $this->agent->browser() !== 'Chrome')
		{
			redirect('error/browser_not_compatible');
		}
		else if (ENVIRONMENT == 'production' && $this->agent->browser() === 'Chrome')
		{
			redirect('error/browser_not_compatible');
		}
	}

	public function index()
	{
		$data['kv_agama'] = $this->agama_model->get_all_kv();
		$data['kv_jalur_masuk'] = $this->jalur_penerimaan_model->get_all_kv(date('Y'));
		$data['kv_program_studi'] = $this->program_studi_model->get_all_kv();

		$data['kv_jenis_kelamin']['L'] = 'Laki-laki';
		$data['kv_jenis_kelamin']['P'] = 'Perempuan';

		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$this->load->view('Mahasiswa/index', $data);
		}
		else
		{
			$id = $this->mahasiswa_model->insert_from_input();

			$webcam_data = $this->input->post('webcam_data');
			if (trim($webcam_data) !== '')
			{
				$binary_data = base64_decode($webcam_data);

				$this->load->helper('file');

				if ( !is_dir('upload')) mkdir('upload');
				if ( !is_dir('upload/' . date('Y'))) mkdir('upload/' . date('Y'));

				write_file('upload/' . date('Y') . '/' . $id . '_force.jpg', $binary_data);
			}

			if ($id !== FALSE)
				redirect('mahasiswa/webcam/' . $id);
		}
	}

	public function webcam($id)
	{
		$data['mahasiswa'] = $this->mahasiswa_model->get_id($id);

		if ($data['mahasiswa'] === FALSE)
			redirect('mahasiswa/index');

		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$this->load->view('Mahasiswa/webcam', $data);
		}
		else
		{
			$webcam_data = $this->input->post('webcam_data');
			$binary_data = base64_decode($webcam_data);

			$this->load->helper('file');

			if ( !is_dir('upload')) mkdir('upload');
			if ( !is_dir('upload/' . date('Y'))) mkdir('upload/' . date('Y'));

			if ( ! write_file('upload/' . date('Y') . '/' . $id . '.jpg', $binary_data))
			{
				echo 'Unable to write the file, contact developer';
			}
			else
			{
				redirect('mahasiswa/success/' . $id);
			}
		}
	}

	public function success($id = NULL)
	{
		if ($id == NULL)
			redirect('mahasiswa/index');

		if ( !file_exists('upload/' . date('Y') . '/' . $id . '.jpg'))
			redirect('mahasiswa/webcam/' . $id);

		$this->load->view('Mahasiswa/success');
	}
}

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
			$this->load->helper('html');
			$this->load->helper('url');
			$this->load->helper('form');

			$this->load->view('Sync/index');
		}
		else
		{
			$endpoint = $this->input->post('endpoint');
			if (trim($endpoint == ''))
				$endpoint = 'http://himakom.jtk.polban.ac.id/maba/index.php/sync/';

			$client = new \GuzzleHttp\Client(array(
				'base_uri' => $endpoint
			));

			echo 'Opening session ...' . str_repeat(' ', 1000);

			$session_id = $client->request('POST', 'start_session')->getBody();
			if ($session_id == 'ERROR')
				return false;

			echo 'Session ID: ' . $session_id . '<br>' . str_repeat(' ', 1000);

			$list = $this->mahasiswa_model->get_all_unsynced();

			foreach ($list as $mahasiswa)
			{
				echo "Uploading " . $mahasiswa->id . ": " . $mahasiswa->nama_lengkap . " .... " . str_repeat(' ', 1000);

				$id = $client->request('POST', 'add_mahasiswa/' . $session_id, array(
					'form_params' => array(
						'nama_lengkap' => $mahasiswa->nama_lengkap,
						'nama_panggilan' => $mahasiswa->nama_panggilan,
						'jenis_kelamin' => $mahasiswa->jenis_kelamin,
						'program_studi' => $mahasiswa->program_studi,
						'jalur_masuk' => $mahasiswa->jalur_masuk,
						'tempat_lahir' => $mahasiswa->tempat_lahir,
						'tanggal_lahir' => $mahasiswa->tanggal_lahir,
						'agama' => $mahasiswa->agama,
						'alamat_asal' => $mahasiswa->alamat_asal,
						'alamat_sekarang' => $mahasiswa->alamat_sekarang,
						'asal_sekolah' => $mahasiswa->asal_sekolah,
						'jurusan_asal' => $mahasiswa->jurusan_asal,
						'nomor_hp' => $mahasiswa->nomor_hp,
						'email' => $mahasiswa->email,
						'facebook' => $mahasiswa->facebook,
						'twitter' => $mahasiswa->twitter,
						'instagram' => $mahasiswa->instagram,
						'line' => $mahasiswa->line,
						'status' => $mahasiswa->status,
						'cita_cita' => $mahasiswa->cita_cita,
						'hobi' => $mahasiswa->hobi,
						'olahraga' => $mahasiswa->olahraga,
						'hal_disukai' => $mahasiswa->hal_disukai,
						'hal_tidak_disukai' => $mahasiswa->hal_tidak_disukai,
						'kebiasaan_baik' => $mahasiswa->kebiasaan_baik,
						'kebiasaan_buruk' => $mahasiswa->kebiasaan_buruk,
						'motivasi_masuk' => $mahasiswa->motivasi_masuk,
						'moto_hidup' => $mahasiswa->moto_hidup,
						'deskripsi_diri' => $mahasiswa->deskripsi_diri,
						'created_at' => $mahasiswa->created_at,
						'updated_at' => $mahasiswa->updated_at
					)
				))->getBody();

				if ($id == 'ERROR')
					return false;

				if (file_exists(FCPATH . 'upload/' . date('Y') . '/' . $mahasiswa->id . '.jpg'))
				{
					echo '<br>&nbsp&nbsp&nbsp&nbsp&nbsp Uploading normal photo ... ' . str_repeat(' ', 1000);

					$result = $client->request('POST', 'add_webcam/' . $session_id . '/' . $id, array(
						'form_params' => array(
							'webcam_data' => base64_encode(file_get_contents(FCPATH . 'upload/' . date('Y') . '/' . $mahasiswa->id . '.jpg'))
						)
					))->getBody();

					if ($result == 'ERROR')
						return false;

					echo 'Uploaded. ' . str_repeat(' ', 1000);
				}

				if (file_exists(FCPATH . 'upload/' . date('Y') . '/' . $mahasiswa->id . '_force.jpg'))
				{
					echo '<br>&nbsp&nbsp&nbsp&nbsp&nbsp Uploading candid photo ... ' . str_repeat(' ', 1000);

					$result = $client->request('POST', 'add_webcam/' . $session_id . '/' . $id . '/force', array(
						'form_params' => array(
							'webcam_data' => base64_encode(file_get_contents(FCPATH . 'upload/' . date('Y') . '/' . $mahasiswa->id . '_force.jpg'))
						)
					))->getBody();

					if ($result == 'ERROR')
						return false;

					echo 'Uploaded. ' . str_repeat(' ', 1000);
				}

				$this->db->where('id', $mahasiswa->id)->update('mahasiswa', array('synced_at' => date('Y-m-d H:i:s')));

				echo "Success: " . $mahasiswa->id . " to " . $id . "<br>" . str_repeat(' ', 1000);
			}

			echo 'Closing session ... ' . str_repeat(' ', 1000);

			$client->request('POST', 'end_session/' . $session_id);

			echo 'Closed.';
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

	public function end_session($session_id)
	{
		if ($this->is_client())
			return false;

		$query = $this->sync_session_model->close_session($session_id);

		echo "Closed";
	}

	public function add_mahasiswa($session_id)
	{
		if ($this->is_client())
			return false;

		$id = $this->mahasiswa_model->insert_from_input();

		if ($id)
		{
			echo $id;
		}
		else
		{
			echo "ERROR";
		}	
	}

	public function add_webcam($session_id, $mahasiswa_id, $type = 'normal')
	{
		if ($this->is_client())
			return false;

		$suffix = ($type == 'force' ? '_force' : '');

		$webcam_data = $this->input->post('webcam_data');
		$binary_data = base64_decode($webcam_data);

		$this->load->helper('file');

		if ( !is_dir('upload')) mkdir('upload');
		if ( !is_dir('upload/' . date('Y'))) mkdir('upload/' . date('Y'));

		if ( ! write_file('upload/' . date('Y') . '/' . $mahasiswa_id . $suffix . '.jpg', $binary_data))
		{
			echo 'ERROR';
		}
		else
		{
			echo 'OK';
		}
	}
}

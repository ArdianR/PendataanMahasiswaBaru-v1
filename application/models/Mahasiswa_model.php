<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {
	public $id;
	public $nama_lengkap;
	public $nama_panggilan;
	public $jenis_kelamin;
	public $program_studi;
	public $jalur_masuk;
	public $tempat_lahir;
	public $tanggal_lahir;
	public $agama;
	public $alamat_asal;
	public $alamat_sekarang;
	public $asal_sekolah;
	public $jurusan_asal;
	public $nomor_hp;
	public $email;
	public $facebook;
	public $twitter;
	public $instagram;
	public $line;
	public $status;
	public $cita_cita;
	public $hobi;
	public $olahraga;
	public $hal_disukai;
	public $hal_tidak_disukai;
	public $kebiasaan_baik;
	public $kebiasaan_buruk;
	public $motivasi_masuk;
	public $moto_hidup;
	public $deskripsi_diri;
	public $created_at;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		$query = $this->db->get('mahasiswa');
		return $query->result();
	}

	public function get_id($id)
	{
		$query = $this->db->where('id', $id)->get('mahasiswa');
		$result = $query->result();

		if (count($result))
			return $result[0];

		return FALSE;
	}

	public function insert_from_input()
	{
		$this->nama_lengkap = $this->input->post('nama_lengkap');
		$this->nama_panggilan = $this->input->post('nama_panggilan');
		$this->jenis_kelamin = $this->input->post('jenis_kelamin');
		$this->program_studi = $this->input->post('program_studi');
		$this->jalur_masuk = $this->input->post('jalur_masuk');
		$this->tempat_lahir = $this->input->post('tempat_lahir');
		$this->tanggal_lahir = $this->input->post('tanggal_lahir');
		$this->agama = $this->input->post('agama');
		$this->alamat_asal = $this->input->post('alamat_asal');
		$this->alamat_sekarang = $this->input->post('alamat_sekarang');
		$this->asal_sekolah = $this->input->post('asal_sekolah');
		$this->jurusan_asal = $this->input->post('jurusan_asal');
		$this->nomor_hp = $this->input->post('nomor_hp');
		$this->email = $this->input->post('email');
		$this->facebook = trim($this->input->post('facebook')) == '' ? NULL : $this->input->post('facebook');
		$this->twitter = trim($this->input->post('twitter')) == '' ? NULL : $this->input->post('twitter');
		$this->instagram = trim($this->input->post('instagram')) == '' ? NULL : $this->input->post('instagram');
		$this->line = trim($this->input->post('line')) == '' ? NULL : $this->input->post('line');
		$this->status = $this->input->post('status');
		$this->cita_cita = $this->input->post('cita_cita');
		$this->hobi = $this->input->post('hobi');
		$this->olahraga = $this->input->post('olahraga');
		$this->hal_disukai = $this->input->post('hal_disukai');
		$this->hal_tidak_disukai = $this->input->post('hal_tidak_disukai');
		$this->kebiasaan_baik = $this->input->post('kebiasaan_baik');
		$this->kebiasaan_buruk = $this->input->post('kebiasaan_buruk');
		$this->motivasi_masuk = $this->input->post('motivasi_masuk');
		$this->moto_hidup = $this->input->post('moto_hidup');
		$this->deskripsi_diri = $this->input->post('deskripsi_diri');
		$this->created_at = date('Y-m-d H:i:s');

		$query = $this->db->insert('mahasiswa', $this);
		if ($query) {
			return $this->db->insert_id();
		} else {
			return $query;
		}
	}

	public function create_basic_schema($db = NULL)
	{
		if ($db === NULL)
			$db = $this->db;

		$db->trans_start();

		$db->query("CREATE TABLE `mahasiswa` (
					  `id` integer NOT NULL PRIMARY KEY AUTO" . ($db->dbdriver == "mysqli" ? "_" : "") . "INCREMENT,
					  `nama_lengkap` text NOT NULL,
					  `nama_panggilan` text NOT NULL,
					  `jenis_kelamin` " . ($db->dbdriver == "mysqli" ? "enum('L','P')" : "char(1)") . " NOT NULL,
					  `program_studi` varchar(5) NOT NULL REFERENCES `program_studi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
					  `jalur_masuk` integer NOT NULL REFERENCES `jalur_penerimaan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
					  `tempat_lahir` text NOT NULL,
					  `tanggal_lahir` date NOT NULL,
					  `agama` integer NOT NULL REFERENCES `agama` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
					  `alamat_asal` text NOT NULL,
					  `alamat_sekarang` text NOT NULL,
					  `asal_sekolah` text NOT NULL,
					  `jurusan_asal` text NOT NULL,
					  `nomor_hp` varchar(20) NOT NULL,
					  `email` text NOT NULL,
					  `facebook` text,
					  `twitter` text,
					  `instagram` text,
					  `line` text,
					  `status` text NOT NULL,
					  `cita_cita` text NOT NULL,
					  `hobi` text NOT NULL,
					  `olahraga` text NOT NULL,
					  `hal_disukai` text NOT NULL,
					  `hal_tidak_disukai` text NOT NULL,
					  `kebiasaan_baik` text NOT NULL,
					  `kebiasaan_buruk` text NOT NULL,
					  `motivasi_masuk` text NOT NULL,
					  `moto_hidup` text NOT NULL,
					  `deskripsi_diri` text NOT NULL,
					  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					  `synced_at` timestamp
					)");

		if ($db->dbdriver == "mysqli")
		{
			$db->query("ALTER TABLE `mahasiswa` ADD INDEX(`jalur_masuk`)");
			$db->query("ALTER TABLE `mahasiswa` ADD INDEX(`program_studi`)");
			$db->query("ALTER TABLE `mahasiswa` ADD INDEX(`agama`)");
		}

		$db->trans_complete();
		return $db->trans_status();
	}
}
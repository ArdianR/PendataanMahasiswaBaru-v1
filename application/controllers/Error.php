<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {
	public function index()
	{
		redirect('error/browser_not_compatible');
	}

	public function browser_not_compatible()
	{
		$this->load->helper('html');
		
		$this->load->view('errors/browser_not_compatible.php');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GPSUSER extends CI_Controller
{

	function index()
	{
		$data_top = array('activebar' => 'บัญชีผู้ใช้งาน');

		$this->load->helper('url');
		$this->load->view('structure/top');
		$this->load->view('structure/nav-top');
		$this->load->view('structure/nav-side', $data_top);
		$this->load->view('GPSUSER', $data_top);
		$this->load->view('structure/footer');

	}
}
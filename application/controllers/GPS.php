<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GPS extends CI_Controller
{

	function index()
	{
		$data_top = array('activebar' => 'พิกัดผู้ใช้งาน Google map');

		$this->checklogin();
		$this->load->helper('url');
		$this->load->view('structure/top');
		$this->load->view('structure/nav-top');
		$this->load->view('structure/nav-side', $data_top);
		$this->load->view('contentGPSUser', $data_top);
		$this->load->view('structure/footer');

	}
	private function checklogin(){
		if(!isset($_SESSION['logged_in'])){
			$this->session->set_flashdata('message_error', 'กรุณาเข้าสู่ระบบ');
			redirect('/Login');
		}

	}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GPSUSER extends CI_Controller
{

	function index()
	{
		$data_top = array('activebar' => 'พิกัดผู้ใช้งาน Google map');

		$this->load->helper('url');
	
		$this->load->view('GPSUSER');
	

	}
}
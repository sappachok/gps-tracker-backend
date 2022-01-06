
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function index()
	{
		$data_top = array('activebar' => 'Dashboard');

		$this->load->helper('url');
		$this->load->view('structure/top');
		$this->load->view('structure/nav-top');
		$this->load->view('structure/nav-side', $data_top);
		$this->load->view('contentDashboard', $data_top);
		$this->load->view('structure/footer');

		//http://localhost/test/users_api
	}
}
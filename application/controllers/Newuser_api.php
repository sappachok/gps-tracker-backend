<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Newuser_api extends CI_Controller
{

	function index()
	{
		$data_top = array('activebar' => 'เพิ่มผู้ใช้งาน');

		$this->load->helper('url');
		$this->load->view('structure/top');
		$this->load->view('structure/nav-top');
		$this->load->view('structure/nav-side', $data_top);
		$this->load->view('newuser', $data_top);
		$this->load->view('structure/footer');

	}

	function action()
	{
		if ($this->input->post('data_action')) {
			$data_action = $this->input->post('data_action');
			

			if ($data_action == "Insert") {
				$api_url = site_url("api/insert");


				$form_data = array(
					'fname'		=>	$this->input->post('fname'),
					'lname'			=>	$this->input->post('lname'),
					'email'			=>	$this->input->post('email'),
					'telno'			=>	$this->input->post('telno'),
					'pwd'			=>	$this->input->post('pwd'),
					'role'			=>	$this->input->post('role')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;
			}


		}
	}
}

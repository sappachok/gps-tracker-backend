<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$data = $this->api_model->fetch_all();
		echo json_encode($data->result_array());
	}

	function insert()
	{
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]',
        array(
                
                'is_unique'     => 'บัญชีนี้ผู้ใช้งานแล้ว'
        ));
		$this->form_validation->set_rules('telno', 'Telephone Number', 'required');
		$this->form_validation->set_rules('pwd', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('role', 'Role', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'fname'	=>	$this->input->post('fname'),
				'lname'		=>	$this->input->post('lname'),
				'email'		=>	$this->input->post('email'),
				'telno'	=>	$this->input->post('telno'),
				'pwd'		=>	$this->input->post('pwd'),
				'role'		=>	$this->input->post('role'),
			);

			$this->api_model->insert_api($data);

			$array = array(
				'success'		=>	true
			);
		}
		else
		{
			$array = array(
				'error'					=>	true,
				'fname_error'		=>	form_error('fname'),
				'lname_error'		=>	form_error('lname'),
				'email_error'		=>	form_error('email'),
				'telno_error'		=>	form_error('telno'),
				'pwd_error'		=>	form_error('pwd'),
				'role_error'		=>	form_error('role'),
			);
		}
		echo json_encode($array);
	}
	
	function fetch_single()
	{
		if($this->input->post('id'))
		{
			$data = $this->api_model->fetch_single_user($this->input->post('id'));

			foreach($data as $row)
			{
				$output['fname'] = $row['fname'];
				$output['lname'] = $row['lname'];
				$output['email'] = $row['email'];
				$output['telno'] = $row['telno'];
				$output['pwd'] = $row['pwd'];
			}
			echo json_encode($output);
		}
	}

	function update()
	{
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
<<<<<<< HEAD
		$this->form_validation->set_rules('email', 'Email', );
		$this->form_validation->set_rules('telno', 'Telephone Number', );
		$this->form_validation->set_rules('pwd', 'Password', );
=======
		$this->form_validation->set_rules('email', 'Email', '');
		$this->form_validation->set_rules('telno', 'Telephone Number', '');
		
>>>>>>> 727a03c5e0960e6c7735993448661e05c9175155
		if($this->form_validation->run())
		{	
			$data = array(
				'fname'		=>	$this->input->post('fname'),
				'lname'			=>	$this->input->post('lname'),
				'email'			=>	$this->input->post('email'),
				'telno'			=>	$this->input->post('telno'),
				'pwd'			=>	$this->input->post('pwd')
			);

			$this->api_model->update_api($this->input->post('id'), $data);

			$array = array(
				'success'		=>	true
			);
		}
		else
		{
			$array = array(
				'error'				=>	true,
				'fname_error'	=>	form_error('fname'),
				'lname_error'	=>	form_error('lname'),
				'email_error'	=>	form_error('email'),
				'telno_error'	=>	form_error('telno'),
				'pwd_error'	=>	form_error('pwd')
			);
		}
		echo json_encode($array);
	}

	function delete()
	{
		if($this->input->post('id'))
		{
			if($this->api_model->delete_single_user($this->input->post('id')))
			{
				$array = array(

					'success'	=>	true
				);
			}
			else
			{
				$array = array(
					'error'		=>	true
				);
			}
			echo json_encode($array);
		}
	}

}


?>
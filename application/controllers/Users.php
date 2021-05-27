<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		$this->load->database();
		$this->load->model('User');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function validateUser()
	{
		$this->form_validation->set_rules('username','Username','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[12]');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else{
			/*$data['username']=$this->input->post('username');
			$data['password']=$this->input->post('password');*/
			$data=$this->input->post();
			if($validate=$this->User->validateUser($data))
			{
				$this->session->set_userdata('username',$validate['username']);
				$this->session->set_flashdata('message',' Login Successfully');
				$this->session->set_flashdata('errno',2);
				redirect(base_url('Members'));
			}
			else
			{
				$this->session->set_flashdata('errno',1);
				$this->session->set_flashdata('message',' Login Failed');
				redirect(base_url('Users'));
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('errno',3);
		$this->session->set_flashdata('message','Logout Successfully');
		redirect(base_url('Users'));
	}
	public function registration()
	{
		$this->load->view('registration');
	}
	public function save_registration()
	{
		$this->form_validation->set_rules('username','Username','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('passwordc','Password','required|min_length[6]|max_length[12]|matches[password]');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('registration');
		}
		else{
			redirect(base_url('Users'));
		}
	}
}
?>

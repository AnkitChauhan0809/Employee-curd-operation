<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {
	 public function __construct() 
	 {
		parent::__construct();
		$this->load->database();
		$this->load->model('Member');
	}
	public function index()
	{
		
		$data['row']=$this->Member->display();
		$this->load->view('members',$data);
	}
	public function insert($id=0)
	{
		if($id==0)
		{
			$this->load->view('insert');
		}
		else
		{
			$data=$this->Member->display($id);
			$this->load->view('insert',$data);
		}
	}
	public function save($id=0)
	{
		$this->form_validation->set_rules('fullname','Fullname','required|max_length[20]');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('contact','Contact','required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('birthday','Birthdate','required');
		
		$data=$this->input->post();
		/*$data=array();
		$data['fullname']=$this->input->post('fullname');
		$data['email']=$this->input->post('email');
		$data['contact']=$this->input->post('contact');
		$data['birthday']=$this->input->post('birthday');*/
		
		$s=$_FILES['photo']['name'];
		
		if($this->form_validation->run() == FALSE)
		{
			$data['err']=1;
			$this->load->view('insert',$data);
		}
		else{
			$config['upload_path']='./uploads';
			$config['allowed_types']='png|jpg|jpeg';
			$config['max_size']=400;
			$this->load->library('upload',$config);
			if($id==0 || $id==-1)
			{
				if($s!=null)
				{
					if(!($this->upload->do_upload('photo')))
					{
						$data['err']=1;
						$data['error']=null;
						if($s!=null)
						{
							$data['error']='~  Please valid image upload.';
						}
						$this->load->view('insert',$data);
					}
					else
					{
						$data['photo']=$this->upload->data('file_name');
						$this->Member->save($data);
						/*$data['photo'] = $_FILES['photo']['name'];
						$target = "./uploads/".basename($data['photo']);
						move_uploaded_file($_FILES['photo']['tmp_name'], $target);*/
					}
				}
				else{
					$this->Member->save($data);
				}
			}
			else
			{
				$result=$this->Member->display($id);
				$data['id']=$result['id'];
				$data['photo']=$result['photo'];
				if($s!=null)
				{
					if(!($this->upload->do_upload('photo')))
					{
						$data['err']=1;
						$data['error']=null;
						if($s!=null)
						{
							$data['error']='~  Please valid image upload.';
						}
						$this->load->view('insert',$data);
					}
					else{
						if($data['photo']!='')
						{
							unlink("./uploads/".$data['photo']);
						}
						$data['photo']=$this->upload->data('file_name');
						$this->Member->save($data,$id);
					}
				}
				else{
					$this->Member->save($data,$id);
				}
			}
		}
	}
	public function deletedata($id)
	{
		$result=$this->Member->display($id);
		if($result['photo']!='')
		{
			unlink("./uploads/".$result['photo']);
		}
		$this->Member->deletedata($id);
	}
}
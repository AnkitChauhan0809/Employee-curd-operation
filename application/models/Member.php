<?php
class Member extends CI_Model
{
	public function display($id=0)
	{
		if($id==0)
		{
			$result=$this->db->get('members');
			return $result->result_array();
		}
		else
		{
			$this->db->where('id',$id);
			$result=$this->db->get('members');
			return $result->result_array()[0];
		}
	}
	public function save($data,$id=0)
	{
		if($id==0)
		{
			$this->db->insert('members',$data);
		}
		else{
			$this->db->where('id',$id);
			$this->db->update('members',$data);
			
		}
		redirect('Members');
	}
	public function deletedata($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('members');
		redirect('Members');
	}
}
?>
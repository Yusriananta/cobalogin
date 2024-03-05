<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member_model extends CI_Model
{

	public function alldata()
	{
		return $this->db->get('user')->result_array();

	}


	 public function get_user()
	 {
	 	 return $this->db->get_where('user', ['role_id' => 2])->result_array();
	 }

	 public function deleteUnit($id)
	 {
	 	$this->db->where('id', $id);
	 	$this->db->delete('unit_kerja');
	 }

	  public function deleteUser($id)
	 {
	 	$this->db->where('id', $id);
	 	$this->db->delete('user');
	 }

	 public function EditAgent()
	 {
	 	$is_active = $this->input->post('is_active');
	 	 if (!$is_active) {
	 	 	$is_active = 0;
	 	 }
	 	$data = [
	 		'name'			=> $this->input->post('name'),
	 		'id_unit'	=> $this->input->post('unit_agent'),
	 		'is_active'		=> $is_active
	 	];

	 	$id = $this->input->post('id');

	 	$this->db->where('id', $id);
	 	$this->db->update('user', $data);

	 }

	  public function editUnit()
	 {
	 	$data = ['unit' => $this->input->post('unit')];

	 	$id = $this->input->post('id');

	 	$this->db->where('id', $id);
	 	$this->db->update('unit_kerja', $data);
	 }


	 public function getUser()
	{
		
		$query = " SELECT `user`.*, `unit_kerja`.`unit`
					FROM `user` JOIN `unit_kerja`
					ON `user`.`id_unit` = `unit_kerja`.`id`
					and role_id = 2
		";

		return $this->db->query($query)->result_array();
		
	}

	 public function getSession()
	{
	

		$query = " SELECT `user`.*, `unit_kerja`.`unit`
					FROM `user` JOIN `unit_kerja`
					ON `user`.`id_unit` = `unit_kerja`.`id`
		";

		return $this->db->query($query)->result_array();
		

	}

	public function getUnit($id)
	{
		return $this->db->get_where('unit_kerja', ['id'=>$id])->row_array();
	}

	public function resetPassword($id)
	{
		$data = ['password'	=> password_hash(123456, PASSWORD_DEFAULT)];
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}


}
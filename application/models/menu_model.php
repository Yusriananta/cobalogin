<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model 
{


	public function getSubMenu()
	{
		$query = " SELECT `user_sub_menu`.*, `user_menu`.`menu`
					FROM `user_sub_menu` JOIN `user_menu`
					ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
		";
	
		return $this->db->query($query)->result_array();
		

	}

	public function editMenu()
	{
		$data = ['menu' => $this->input->post('menu')];

	 	$id = $this->input->post('id');

	 	$this->db->where('id', $id);
	 	$this->db->update('user_menu', $data);
	}

	public function deleteMenu($id)
	{
		$this->db->where('id', $id);
	 	$this->db->delete('user_menu');
	}

	public function editSubMenu()
	{
		$is_active = $this->input->post('is_active');
			if (!$is_active) {
				$is_active = 0;
			}
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $is_active
			];

	 	$id = $this->input->post('id');

	 	$this->db->where('id', $id);
	 	$this->db->update('user_sub_menu', $data);
	}

	public function deleteSubMenu($id)
	{
		$this->db->where('id', $id);
	 	$this->db->delete('user_sub_menu');
	}
}
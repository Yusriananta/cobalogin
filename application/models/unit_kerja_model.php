<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unit_kerja_model extends CI_Model
{
	public function get_unit_kerja()
	{
		return $this->db->get('data_unit_kerja')->result_array();

	}
}
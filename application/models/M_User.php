<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
	public function getAllUser()
	{
		return $this->db->get('user')->result();
	}

	public function getOneUser($id)
	{
		$this->db->where('id', $id);

		return $this->db->get('user')->row();
	}
}

/* End of file M_User.php */

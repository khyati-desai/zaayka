<?php
	/**
	* 
	*/
	class Login_m extends CI_Model
	{
		public function do_login_m($admin_data_nec,$admin_data_pwd)
		{
			return $this->db->group_start()
					->or_where($admin_data_nec)
					->group_end()
					->where($admin_data_pwd)
					->get('tbladmin')
					->result();

					/*die($this->db->last_query());*/
		}
	}
?>
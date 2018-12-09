<?php
	/**
	* 
	*/
	class Admin_m extends CI_Model
	{
		public function get_admin_m($alevel)
		{
			return $this->db->select('a1.*, a2.AdminName AddedByAdminName')
							->from('tbladmin a1')
							->join('tbladmin a2','a1.AddedByAdminId=a2.AdminId')
							->where($alevel)
							->get()
							->result();
		}

		public function toggle_status_m($aid)
		{
			$this->db->set('AdminStatus','AdminStatus XOR 1',false)
				->where($aid)
				->update('tbladmin');		
		}

		public function add_admin_m($admin_data)
		{
			$this->db->insert('tbladmin',$admin_data);
		}

		public function get_admin_to_update_m($aid)
		{
			return $this->db->where($aid)
							->get('tbladmin')
							->result();
		}

		// public function update_admin_m($admin_data_old,$admin_data_new)
		// {
		// 	$this->db->set($admin_data_new)
		// 		->where($admin_data_old)
		// 		->update('tbladmin');
		// }

		public function update_basic_m($admin_data_old,$admin_data_new)
		{
			$this->db->set($admin_data_new)
				->where($admin_data_old)
				->update('tbladmin');
		}

		public function update_profile_m($admin_data_old,$admin_data_new)
		{
			$this->db->set($admin_data_new)
				->where($admin_data_old)
				->update('tbladmin');
		}

		public function update_password_m($admin_data_old,$admin_data_new)
		{
			$this->db->set($admin_data_new)
				->where($admin_data_old)
				->update('tbladmin');
		}

		public function get_password_m($admin_data_old)
		{
			return $this->db->select('AdminPassword')
							->from('tbladmin')
							->where($admin_data_old)
							->get()
							->result();
		}
	}
?>
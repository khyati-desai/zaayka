<?php
	/**
	* 
	*/
	class Category_m extends CI_Model
	{
		public function add_category_m($category_data)
		{
			$this->db->insert('tblcategory',$category_data);
		}	

		public function get_category_m()
		{
			return $this->db->select('c.*,a.AdminName as AddedByAdminName')
							->from('tblcategory c')
							->join('tbladmin a','c.AddedByAdminId=a.AdminId')
							->get()
							->result();
		}

		public function toggle_status_m($cid)
		{
			$this->db->set('CategoryStatus','CategoryStatus XOR 1',false)
					->where($cid)
					->update('tblcategory');
		}

		public function get_category_to_update_m($cid)
		{
			return $this->db->where($cid)
							->get('tblcategory')
							->result();
		}

		public function update_category_m($category_data_old,$category_data_new)
		{
			$this->db->set($category_data_new)
					->where($category_data_old)
					->update('tblcategory');
		}
	}
?>
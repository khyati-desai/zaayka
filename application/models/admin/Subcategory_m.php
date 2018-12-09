<?php
	defined('BASEPATH') or die('error');

	/**
	* 
	*/
	class Subcategory_m extends CI_Model
	{
		public function get_subcategory_m($category_id=FALSE)
		{
			if($category_id != FALSE)
				return $this->db->select('s.*,c.*,a.AdminName as AddedByAdminName')
							->from('tblsubcategory s')
							->join('tblcategory c','c.CategoryId=s.CategoryId')
							->join('tbladmin a','a.AdminId=s.AddedByAdminId')
							->where($category_id)
							->get()
							->result();
			else
				return $this->db->select('s.*,c.*,a.AdminName as AddedByAdminName')
							->from('tblsubcategory s')
							->join('tblcategory c','s.CategoryId=c.CategoryId')
							->join('tbladmin a','a.AdminId=s.AddedByAdminId')
							->get()
							->result();
		}

		public function add_subcategory_m($subcategory_data)
		{
			$this->db->insert('tblsubcategory',$subcategory_data);
		}

		public function toggle_status_m($sid)
		{
			$this->db->set('SubcategoryStatus','SubcategoryStatus XOR 1',false)
					->where($sid)
					->update('tblsubcategory');
		}

		public function get_category_m($cat_id = FALSE)
		{
			if($cat_id == FALSE)
				return $this->db->get('tblcategory')
							->result();
			else
				return $this->db->where($cat_id)
							->get('tblcategory')
							->result();
		}

		public function get_subcategory_to_update_m($sub_cat_id)
		{
			$data['sub_cat_data']=$this->db->where($sub_cat_id)
							->get('tblsubcategory')
							->result();

			$data['cat_data']=$this->db->get('tblcategory')
									->result();

			return $data;
		}

		public function update_subcategory_m($subcategory_data_old,$subcategory_data_new)
		{
			$this->db->set($subcategory_data_new)
					->where($subcategory_data_old)
					->update('tblsubcategory');
		}
	}
?>
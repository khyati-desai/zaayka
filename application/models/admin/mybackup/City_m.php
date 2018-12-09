<?php
	defined('BASEPATH') or die('error');

	/**
	* 
	*/
	class City_m extends CI_Model
	{
		public function get_city_m($state_id=FALSE)
		{
			if($state_id != FALSE)
				return $this->db->select('*')
							->from('tblcity c')
							->join('tblstate s','s.StateId=c.StateId','left')
							->where($state_id)
							->get()
							->result();
			else
				return $this->db->select('*')
							->from('tblcity c')
							->join('tblstate s','s.StateId=c.StateId','left')
							->get()
							->result();
		}

		public function add_city_m($city_data)
		{
			$this->db->insert('tblcity',$city_data);
		}

		public function get_state_m($st_id = FALSE)
		{
			if($st_id == FALSE)
				return $this->db->get('tblstate')
							->result();
			else
				return $this->db->where($st_id)
							->get('tblstate')
							->result();
		}

		public function get_city_to_update_m($ct_id)
		{
			$data['ct_data']=$this->db->where($ct_id)
							->get('tblcity')
							->result();

			$data['st_data']=$this->db->get('tblstate')
									->result();

			return $data;
		}

		public function update_city_m($city_data_old,$city_data_new)
		{
			$this->db->set($city_data_new)
					->where($city_data_old)
					->update('tblcity');
		}
	}
?>
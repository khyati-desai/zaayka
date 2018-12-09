<?php
	/**
	* 
	*/
	class User_m extends CI_Model
	{
		public function get_user_m($where_user,$where_uemail,$where_city)
		{
			if($where_user!=null)
				$this->db->where('UserName LIKE "%'.$where_user.'%"');
			if($where_uemail!=null)
				$this->db->where('UserEmail LIKE "%'.$where_uemail.'%"');
			if($where_city!=null)
				$this->db->where_in('c.CityId',$where_city);
			return $this->db->select('*')
							->from('tbluser u')
							->join('tblcity c','u.CityId=c.CityId')
							->join('tblstate s','c.StateId=s.StateId')
							->get()
							->result();
		}

		public function get_state_m()
		{
			return $this->db->get('tblstate')
							->result();
		}

		public function get_city_m($sid)
		{
			return $this->db->where($sid)
							->get('tblcity')
							->result();
		}

		public function report_user_m($rid)
		{
			$this->db->insert('tblreportuser',$rid);
		}
	}
?>
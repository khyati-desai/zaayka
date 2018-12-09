<?php
	/**
	* 
	*/
	class Login_user_m extends CI_Model
	{
		public function do_login_m($user_data_nec,$user_data_pwd)
		{
			return $this->db->group_start()
					->or_where($user_data_nec)
					->group_end()
					->where($user_data_pwd)
					->get('tbluser')
					->result();
		}

		public function get_st_ct_m()
		{
			$data['stdata']=$this->db->get('tblstate')
									->result();

			$arr=[
				'StateId'=>$data['stdata'][0]->StateId	
			];

			$data['ctdata']=$this->db->where($arr)
									->get('tblcity')
									->result();

			return $data;
		}

		public function get_city_m($stdata)
		{
			return $this->db->where($stdata)
							->get('tblcity')
							->result();
		}

		public function add_user_m($user_data)
		{
			$this->db->insert('tbluser',$user_data);
		}
	}
?>
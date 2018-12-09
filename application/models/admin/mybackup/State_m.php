<?php
	/**
	* 
	*/
	class State_m extends CI_Model
	{
		public function add_state_m($state_data)
		{
			$this->db->insert('tblstate',$state_data);
		}	

		public function get_state_m()
		{
			return $this->db->get('tblstate')
							->result();
		}

		public function get_state_to_update_m($stid)
		{
			return $this->db->where($stid)
							->get('tblstate')
							->result();
		}

		public function update_state_m($state_data_old,$state_data_new)
		{
			$this->db->set($state_data_new)
					->where($state_data_old)
					->update('tblstate');
		}
	}
?>
<?php
	
	class Recipe_m extends CI_Model
	{
		public function get_recipe_m()
		{
			return $this->db
			->get('tblrecipe')
			->result();
		}

		public function get_like_recipe_m()
		{
			return $this->db
			->get('tblrecipelike')
			->result();
		}

		public function get_comment_recipe_m()
		{
			return $this->db
			->get('tblrecipecomment')
			->result();
		}

		public function get_rate_recipe_m()
		{
			return $this->db
			->get('tblreciperate')
			->result();
		}

		public function get_view_recipe_m()
		{
			return $this->db
			->get('tblhistory')
			->result();
		}

		public function toggle_status_m($rid)
		{
			$this->db->set('RecipeStatus','RecipeStatus XOR 1',false)
					->where($rid)
					->update('tblrecipe');
		}

		public function recipe_read_more_m($rid)
		{
			$data['recipe_data']=$this->db
								->select('*')
								->from('tbluser u')
								->join('tblrecipe r','u.UserId=r.UserId')
								->where($rid)
								->get()
								->result();

			$data['comment_data']=$this->db
								->select('*')
								->from('tbluser u')
								->join('tblrecipecomment rc','u.UserId=rc.UserId')
								->where($rid)
								->get()
								->result();

			$data['like_data']=$this->db
								->select('*')
								->from('tbluser u')
								->join('tblrecipelike rl','u.UserId=rl.UserId')
								->where($rid)
								->get()
								->result();

			$data['view_data']=$this->db
								->select('*')
								->from('tbluser u')
								->join('tblhistory h','u.UserId=h.UserId')
								->where($rid)
								->get()
								->result();
								
			$data['rate_data']=$this->db
								->select('*')
								->from('tbluser u')
								->join('tblreciperate rt','u.UserId=rt.UserId')
								->where($rid)
								->get()
								->result();

			return $data;								
		}
	}
?>
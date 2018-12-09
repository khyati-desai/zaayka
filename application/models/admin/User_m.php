<?php
	class User_m extends CI_Model
	{
		public function get_user_m()
		{
			return $this->db
						->select('*')
						->from('tbluser u')
						->join('tblcity c','u.CityId=c.CityId','left')
						->join('tblstate s','c.StateId=s.StateId','left')
						->get()
						->result();
		}

		public function toggle_status_m($uid)
		{
			$this->db->set('UserStatus','UserStatus XOR 1',false)
				->where($uid)
				->update('tbluser');		
		}

		public function profile_recipe_m($uid)
		{
			return $this->db
			->select('*')
			->from('tbluser u')
			->join('tblrecipe t1','u.UserId=t1.UserId')
			->where($uid)
			->get()
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

		public function profile_article_m($uid)
		{
			return $this->db
			->select('*')
			->from('tbluser u')
			->join('tblarticle t1','u.UserId=t1.UserId')
			->where($uid)
			->get()
			->result();
		}

		public function get_like_article_m()
		{
			return $this->db
			->get('tblarticlelike')
			->result();
		}

		public function get_comment_article_m()
		{
			return $this->db
			->get('tblarticlecomment')
			->result();
		}

		public function get_view_article_m()
		{
			return $this->db
			->get('tblarticleview')
			->result();
		}

		public function profile_follower_m($uid)
		{
			return $this->db
			->select('*')
			->from('tblfollow t1')
			->join('tbluser u','u.UserId=t1.FollowerId')
			->where($uid)
			->get()
			->result();
		}

		public function profile_following_m($uid)
		{
			return $this->db
			->select('*')
			->from('tblfollow t1')
			->join('tbluser u','u.UserId=t1.UserId')
			->where($uid)
			->get()
			->result();
		}

		public function profile_playlist_m($uid)
		{
			return $this->db
			->select('*')
			->from('tbluser u')
			->join('tblplaylist t1','u.UserId=t1.UserId')
			->where($uid)
			->get()
			->result();
		}

		public function get_post_playlist_m()
		{
			return $this->db
			->get('tblplaylistpost')
			->result();
		}
		
		public function article_read_more_m($aid)
		{
			return $this->db
			->where($aid)
			->get('tblarticle')
			->result();
		}

		public function get_user_data_m($uid)
		{
			return $this->db
						->select('*')
						->from('tbluser t1')
						->join('tblcity c','t1.CityId=c.CityId','left')
						->join('tblstate s','c.StateId=s.StateId','left')
						->where($uid)
						->get()
						->result();
		}
	}
?>
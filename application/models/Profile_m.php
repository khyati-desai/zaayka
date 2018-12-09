<?php
	class Profile_m extends CI_Model
	{
		public function get_user_m($uid)
		{
			return $this->db->select('*')
							->from('tbluser u')
							->join('tblcity c','u.CityId=c.CityId')
							->join('tblstate s','c.StateId=s.StateId')
							->where($uid)
							->get()
							->result();
		}

		public function get_city_m($stid=false)
		{
			if($stid!=false)
				$this->db->where($stid);
			return $this->db->get('tblcity')
							->result();
		}

		public function get_state_m()
		{
			return $this->db->get('tblstate')
							->result();
		}

		public function get_followers_follow_m($uid,$uid2)
		{
			$this->db->select('UserId')->from('tblfollow f')->where($uid2);
			$sub=$this->db->get_compiled_select();
			

			return $this->db->select('*')
							->from('tbluser cu')
							->join('tblfollow u','u.FollowerId=cu.UserId')
							->where("u.FollowerId NOT IN ($sub)")
							->where($uid)
							->get()
							->result();
		}

		public function get_followers_unfollow_m($uid,$uid2)
		{
			$this->db->select('UserId')->from('tblfollow f')->where($uid2);
			$sub=$this->db->get_compiled_select();
			

			return $this->db->select('*')
							->from('tbluser cu')
							->join('tblfollow u','u.FollowerId=cu.UserId')
							->where("u.FollowerId IN ($sub)")
							->where($uid)
							->get()
							->result();
		}

		public function get_following_m($uid)
		{
			return $this->db->select('*')
							->from('tblfollow f')
							->join('tbluser u','u.UserId=f.UserId')
							->where($uid)
							->get()
							->result();
		}

		public function get_username($uid)
		{
			return $this->db->select('UserName,UserEmail,UserContactNo')
							->from('tbluser')
							->where($uid)
							->get()
							->result();
		}

		public function update_basic_m($uid,$user_data_new)
		{
			$this->db->set($user_data_new)
					->where($uid)
					->update('tbluser');
		}

		public function get_password_m($uid)
		{
			return $this->db->select('UserPassword')
							->from('tbluser')
							->where($uid)
							->get()
							->result();
		}

		public function del_follow($f_id)
		{
			$this->db->where($f_id)
					->delete('tblfollow');
			//die($this->db->last_query());
		}

		public function add_follow($f_id)
		{
			$this->db->insert('tblfollow',$f_id);
			//die($this->db->last_query());
		}


		public function get_follow2($id)
		{
			return $this->db
				->where($id)
				->get('tblfollow')
				->result();
		}

		public function get_history_data_m($id)
		{
			return $this->db->select('u.*,r.RecipeTitle,r.RecipeDescription,r.VideoUrl,usr.UserName,usr.UserId as UserIdRecipe')
							->from('tblhistory u')
							->join('tblrecipe r','u.RecipeId=r.RecipeId')
							->join('tbluser	usr','usr.UserId=r.UserId')
							->where($id)
							->get()
							->result();
		}

		public function dlt_history_m($hid)
		{
			$this->db->where($hid)
					->delete('tblhistory');
		}

		public function clr_history_m($chid)
		{
			$this->db->where($chid)
					->delete('tblhistory');
		}

		public function user_follows_m($uid)
		{
			return $this->db->select('*')
							->from('tblfollow f')
							->where($uid)
							->get()
							->result();
		}

		// recipe data
		public function get_recipe_m($uid)
		{
			 return $this->db
			->select('r.*,u.UserName')
			->from('tblrecipe r')
			->join('tbluser u','u.UserId=r.UserId')
			->where($uid)
			->get()
			->result();
		}

		public function get_recipe_comment_m()
		{
			$uid['u.UserStatus']=0;
			$uid['r.CommentStatus']=0;
			return $this->db
			->select('r.RecipeId')
			->from('tblrecipecomment r')
			->join('tbluser u','u.UserId=r.UserId')
			->where($uid)
			->get()
			->result();
		}


		public function get_recipe_like_m()
		{
			
			$uid['u.UserStatus']=0;
			return $this->db
			->select('r.RecipeId')
			->from('tblrecipelike r')
			->join('tbluser u','u.UserId=r.UserId')
			->where($uid)
			->get()
			->result();
		}

		public function get_recipe_rate_m()
		{
			$uid['u.UserStatus']=0;
			return $this->db
			->select('r.RecipeId,r.Rate')
			->from('tblreciperate r')
			->join('tbluser u','u.UserId=r.UserId')
			->where($uid)
			->get()
			->result();
		}

		public function get_recipe_view_m()
		{
			$uid['u.UserStatus']=0;
			return $this->db
			->select('r.RecipeId')
			->from('tblrecipeview r')
			->join('tbluser u','u.UserId=r.UserId')
			->where($uid)
			->get()
			->result();
		}
		//recipe data end

		//article data
		public function get_article_m($uid)
		{
			 return $this->db
			->select('a.*,u.UserName')
			->from('tblarticle a')
			->join('tbluser u','u.UserId=a.UserId')
			->where($uid)
			->get()
			->result();
		}

		public function get_article_comment_m()
		{
			$uid['u.UserStatus']=0;
			$uid['a.ArticleCommentStatus']=0;
			return $this->db
			->select('a.ArticleId')
			->from('tblarticlecomment a')
			->join('tbluser u','u.UserId=a.UserId')
			->where($uid)
			->get()
			->result();
		}


		public function get_article_like_m()
		{
			
			$uid['u.UserStatus']=0;
			return $this->db
			->select('a.ArticleId')
			->from('tblarticlelike a')
			->join('tbluser u','u.UserId=a.UserId')
			->where($uid)
			->get()
			->result();
		}
		//article data end
	}
?>
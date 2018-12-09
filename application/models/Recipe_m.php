<?php
	/**
	* 
	*/
	class Recipe_m extends CI_Model
	{
		public function get_recipe_m($rid)
		{
			$data=[
				'r.RecipeStatus'=>0
			];
			 return $this->db
			->select('r.*,u.UserName')
			->from('tblrecipe r')
			->join('tbluser u','u.UserId=r.UserId')
			->where($rid)
			->where($data)
			->get()
			->result();
		}

		public function get_recipe_comment_m($rid)
		{
			$rid['r.CommentStatus']=0;
			$rid['u.UserStatus']=0;
			
			return $this->db
			->select('u.UserName,u.UserImage,r.*')
			->from('tblrecipecomment r')
			->join('tbluser u','u.UserId=r.UserId')
			->where($rid)
			->order_by('CommentCreatedDate','desc')
			->get()
			->result();
		}

		public function get_recipe_like_m($rid)
		{
			$rid['u.UserStatus']=0;

			return $this->db
			->select('u.UserName,u.UserImage,r.*')
			->from('tblrecipelike r')
			->join('tbluser u','u.UserId=r.UserId','left')
			->where($rid)
			->get()
			->result();
		}

		public function get_recipe_rate_m($rid)
		{
			$rid['r.RateStatus']=0;
			$rid['u.UserStatus']=0;
			// echo "<pre>";
			// print_r($rid);
			// die("abc");

			return $this->db
			->select('u.UserName,u.UserImage,r.*')
			->from('tblreciperate r')
			->join('tbluser u','u.UserId=r.UserId')
			->where($rid)
			->get()
			->result();
		}

		public function get_recipe_view_m($rid)
		{
			$rid['u.UserStatus']=0;

			return $this->db
			->select('u.UserName,u.UserImage,r.*')
			->from('tblrecipeview r')
			->join('tbluser u','u.UserId=r.UserId')
			->where($rid)
			->get()
			->result();
		}

		public function get_recipe_report_m($rid)
		{
			return $this->db
			->select('u.UserId')
			->from('tblreportrecipe r')
			->join('tbluser u','u.UserId=r.UserId')
			->where($rid)
			->get()
			->result();
		}

		public function get_my_like_m($ruid)
		{
			return $this->db
			->select('r.*')
			->from('tblrecipelike r')
			->where($ruid)
			->get()
			->result();
		}
	
		public function toggle_like_exist($data)
		{
			$this->db->delete('tblrecipelike',$data);
		}

		public function toggle_like_dne($data)
		{
			$this->db->insert('tblrecipelike',$data);
		}
		
		public function count_likes_on_recipe($rid)
		{
			$rid['u.UserStatus']=0;
			return $this->db->select('r.RecipeId,u.*')
					->from('tblrecipelike r')
					->join('tbluser u','u.UserId=r.UserId')
					->where($rid)
					->get()
					// ->result()
					->num_rows();
		}

		public function comment_insert_m($data)
		{
			$this->db->insert('tblrecipecomment',$data);
		}
		
		public function add_rate_m($data)
		{
			$this->db->insert('tblreciperate',$data);
		}
		
		public function delete_comment_m($old_data,$new_data)
		{
			$this->db->set($new_data)
				->where($old_data)
				->update('tblrecipecomment');
		}
		public function add_report_m($data)
		{
			$this->db->insert('tblreportrecipe',$data);
		}


		public function get_category_upload_m($cat)
		{
			return $this->db->where($cat)	
			                ->get('tblcategory')
							->result();
		}

		public function get_category_upload1_m()
		{
			return $this->db->get('tblcategory')
							->result();
		}

		public function get_subcategory_upload_m($id)
		{
			$sid=[
				'CategoryId'=>$id
			];
			return $this->db->where($sid)
							->get('tblsubcategory')
							->result();
		}

		public function add_recipe_m($data)
		{
			$this->db->insert('tblrecipe',$data);
		}
		public function delete_recipe_m($odata,$ndata)
		{
			$this->db->set($ndata)
				->where($odata)
				->update('tblrecipe');		
		}
		public function get_recipe_info_m($rid)
		{
			return $this->db
			->select('*')
			->from('tblrecipe r')
			->join('tblsubcategory s','s.SubcategoryId=r.SubcategoryId')
			->where($rid)
			->get()
			->result();
		}
		public function get_category1_m($cat)
		{
			return $this->db
			->select('*')
			->from('tblsubcategory')
			->where($cat)
			->get()
			->result();
		}
		public function update_recipe_m($ndata,$odata)
		{
			$this->db->set($ndata)
				->where($odata)
				->update('tblrecipe');			
		}
		
		public function display_recipe_m($where_title,$where_user,$where_min,$where_max,$where_sub)
		{
			if($where_title!=null)
				$this->db->where('RecipeTitle LIKE "%'.$where_title.'%"');
			if($where_user!=null)
				$this->db->where('UserName LIKE "%'.$where_user.'%"');
			if($where_min!=null)
				$this->db->where('AverageTime >='.$where_min);
			if($where_max!=null)
				$this->db->where('AverageTime <='.$where_max);
			if($where_sub!=null)
				$this->db->where_in('SubcategoryId',$where_sub);
			return $this->db->select('r.*,u.UserName')
					->from('tblrecipe r')
					->join('tbluser u','r.UserId=u.UserId')
					->get()
					->result();

			/*die($this->db->last_query());*/
		}

		public function display_recipe_follow_m($uid,$where_title,$where_user,$where_min,$where_max,$where_sub)
		{
			$this->db->select('UserId')->from('tblfollow f')->where($uid);
			$sub=$this->db->get_compiled_select();
			if($where_title!=null)
				$this->db->where('RecipeTitle LIKE "%'.$where_title.'%"');
			if($where_user!=null)
				$this->db->where('UserName LIKE "%'.$where_user.'%"');
			if($where_min!=null)
				$this->db->where('AverageTime >='.$where_min);
			if($where_max!=null)
				$this->db->where('AverageTime <='.$where_max);
			if($where_sub!=null)
				$this->db->where_in('SubcategoryId',$where_sub);
			
			

			return $this->db->select('r.*,u.UserName')
							->from('tblrecipe r')
							->join('tbluser u','u.UserId=r.UserId')
							->where("r.UserId IN ($sub)")
							->get()
							->result();
		}

		public function get_category_m()
		{
			return $this->db->get('tblcategory')
							->result();
		}

		public function get_subcategory_m($uid)
		{
			return $this->db->where($uid)
							->get('tblsubcategory')
							->result();
		}

		public function get_saved($id)
		{
			return $this->db->where($id)
							->get('tblsave')
							->result();
		}

		public function add_save($id)
		{
			$this->db->insert('tblsave',$id);
		}

		public function del_save($id)
		{
			$this->db->where($id)
					->delete('tblsave');
		}

		public function display_recipe_saved_m()
		{
			$id=[
				's.UserId'=>$this->ss->UserId,
				'r.RecipeStatus'=>0
			];
			return $this->db->select('r.*,u.UserName')
							->from('tblrecipe r')
							->join('tbluser u','r.UserId=u.UserId')
							->join('tblsave s','r.RecipeId=s.RecipeId')
							->where($id)
							->get()
							->result();
		}

		public function get_saved2($ruid)
		{
			return $this->db->where($ruid)
							->get('tblsave r')
							->result();
		}

		public function get_watch_later_m($pid)
		{
			return $this->db->where($pid)
							->get('tblwatchlater')
							->result();
		}

		public function add_to_watch_later_m($pid)
		{
			$this->db->insert('tblwatchlater',$pid);
		}

		public function get_playlist($uid)
		{
			$data=[
				'PlaylistStatus'=>0
			];
			return $this->db->where($uid)
							->where($data)
							->get('tblplaylist')
							->result();
		}

		public function get_playlist_recipe_m($data)
		{
			return $this->db->where($data)
							->get('tblplaylistpost')
							->result();
		}

		public function add_to_playlist_m($data)
		{
			$this->db->insert('tblplaylistpost',$data);
		}

		public function add_new_playlist_m($id)
		{
			$this->db->insert('tblplaylist',$id);

			return $this->db->insert_id();
		}

		public function display_recipe_watch_later_m()
		{
			$id=[
				'w.UserId'=>$this->ss->UserId,
				'r.RecipeStatus'=>0
			];
			return $this->db->select('r.*,u.UserName')
							->from('tblrecipe r')
							->join('tbluser u','r.UserId=u.UserId')
							->join('tblwatchlater w','r.RecipeId=w.RecipeId')
							->where($id)
							->get()
							->result();
		}

		public function get_wl($id)
		{
			return $this->db->where($id)
							->get('tblwatchlater')
							->result();
		}

		public function add_wl($id)
		{
			$this->db->insert('tblwatchlater',$id);
		}

		public function del_wl($id)
		{
			$this->db->where($id)
					->delete('tblwatchlater');
		}

		public function add_to_history_m($id)
		{
			$this->db->insert('tblhistory',$id);
		}

		public function add_to_view_m($id)
		{
			$this->db->insert('tblrecipeview',$id);
		}
	}
?>
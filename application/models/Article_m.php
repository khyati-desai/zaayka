<?php
	/**
	* 
	*/
	class Article_m extends CI_Model
	{
		public function display_article_m($where_title,$where_user)
		{
			if($where_title!=null)
				$this->db->where('ArticleTitle LIKE "%'.$where_title.'%"');
			if($where_user!=null)
				$this->db->where('UserName LIKE "%'.$where_user.'%"');
			return $this->db->select('r.*,u.UserName')
					->from('tblarticle r')
					->join('tbluser u','r.UserId=u.UserId')
					->get()
					->result();

			/*die($this->db->last_query());*/
		}

		public function get_article_m($aid)
		{
			$data=[
				'a.ArticleStatus'=>0
			];
			 return $this->db
			->select('a.*,u.UserName')
			->from('tblarticle a')
			->join('tbluser u','u.UserId=a.UserId')
			->where($aid)
			->get()
			->result();
		}

		public function get_article_comment_m($aid)
		{
			$aid['a.ArticleCommentStatus']=0;
			$aid['u.UserStatus']=0;
		
			return $this->db
			->select('u.UserName,u.UserImage,a.*')
			->from('tblarticlecomment a')
			->join('tbluser u','u.UserId=a.UserId')
			->where($aid)
			->order_by('a.ArticleCommentCreatedDate','desc')
			->get()
			->result();
		}

		public function get_article_like_m($aid)
		{
			$aid['u.UserStatus']=0;

			return $this->db
			->select('u.UserName,u.UserImage,a.*')
			->from('tblarticlelike a')
			->join('tbluser u','u.UserId=a.UserId','left')
			->where($aid)
			->get()
			->result();
		}

		public function get_article_report_m($aid)
		{
			return $this->db
			->select('u.UserId')
			->from('tblreportarticle a')
			->join('tbluser u','u.UserId=a.UserId')
			->where($aid)
			->get()
			->result();
		}

		public function get_my_like_m($auid)
		{
			return $this->db
			->select('a.*')
			->from('tblarticlelike a')
			->where($auid)
			->get()
			->result();
		}
	
		public function toggle_like_exist($data)
		{
			$this->db->delete('tblarticlelike',$data);
		}

		public function toggle_like_dne($data)
		{
			$this->db->insert('tblarticlelike',$data);
		}
		
		public function count_likes_on_article($aid)
		{
			$aid['u.UserStatus']=0;
			return $this->db->select('a.ArticleId,u.*')
					->from('tblarticlelike a')
					->join('tbluser u','u.UserId=a.UserId')
					->where($aid)
					->get()
					// ->result()
					->num_rows();
		}

		public function increase_view_m($id)
		{
			$this->db->set('NumberOfViews','NumberOfViews+1',FALSE)
					->where('ArticleId',$id)
					->update('tblarticle');
		}

		public function comment_insert_m($data)
		{
			$this->db->insert('tblarticlecomment',$data);
		}

		public function delete_comment_m($old_data,$new_data)
		{
			$this->db->set($new_data)
				->where($old_data)
				->update('tblarticlecomment');
		}
		
		public function add_report_m($data)
		{
			$this->db->insert('tblreportarticle',$data);
		}

		public function add_article_m($data)
		{
			$this->db->insert('tblarticle',$data);
		}
		public function delete_article_m($odata,$ndata)
		{
			$this->db->set($ndata)
				->where($odata)
				->update('tblarticle');		
		}
		public function get_article_info_m($aid)
		{
			return $this->db
			->select('*')
			->from('tblarticle a')
			// ->join('tblsubcategory s','s.SubcategoryId=a.SubcategoryId')
			->where($aid)
			->get()
			->result();
		}

		public function update_article_m($ndata,$odata)
		{
			$this->db->set($ndata)
				->where($odata)
				->update('tblarticle');			
		}
	}
?>
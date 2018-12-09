<?php
	
	
	class Article_m extends CI_Model
	{
		public function get_article_m()
		{
			return $this->db
			->get('tblarticle')
			->result();
		}
		
		public function article_read_more_m($aid)
		{
			$data['article_data']=$this->db
			->select('*')
			->from('tbluser u')
			->join('tblarticle a','u.UserId=a.UserId')
			->where($aid)
			->get()
			->result();
			
			$data['comment_data']=$this->db
			->select('*')
			->from('tbluser u')
			->join('tblarticlecomment ac','u.UserId=ac.UserId')
			->where($aid)
			->get()
			->result();

			$data['like_data']=$this->db
			->select('*')
			->from('tbluser u')
			->join('tblarticlelike al','u.UserId=al.UserId')
			->where($aid)
			->get()
			->result();	

			return $data;
		}


		public function toggle_status_m($aid)
		{
			$this->db->set('ArticleStatus','1-ArticleStatus',false)
			->where($aid)
			->update('tblarticle');
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
	}
?>
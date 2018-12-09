<?php
	/**
	* 
	*/
	class Comment_m extends CI_Model
	{
		public function toggle_status_recipe_comment_m($cid)
		{
			$this->db->set('CommentStatus','CommentStatus XOR 1',false)
					->where($cid)
					->update('tblrecipecomment');
		}

		public function toggle_status_article_comment_m($aid)
		{
			$this->db->set('ArticleCommentStatus','ArticleCommentStatus XOR 1',false)
					->where($aid)
					->update('tblarticlecomment');
		}

		public function get_comment_recipe_m()
		{
			return $this->db
					->select('rc.*,r.RecipeTitle,u.UserName')
					->from('tblrecipecomment rc')
					->join('tblrecipe r','rc.RecipeId=r.RecipeId','left')
					->join('tbluser u','rc.UserId=u.UserId','left')
					->get()
					->result();
		}

		public function get_comment_article_m()
		{
			return $this->db
					->select('ac.*,a.ArticleTitle,u.UserName')
					->from('tblarticlecomment ac')
					->join('tblarticle a','ac.ArticleId=a.ArticleId','left')
					->join('tbluser u','ac.UserId=u.UserId','left')
					->get()
					->result();
		}		
	}
?>
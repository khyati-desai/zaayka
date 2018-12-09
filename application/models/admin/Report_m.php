<?php

	class Report_m extends CI_Model
	{
		public function get_report_user_m()
		{
			return $this->db
			->select('r.*,count(r.ReportUserId) as tot_report, u.*')
			->from('tblreportuser r')
			->join('tbluser u','u.UserId=r.ReportedUserId','left')
			->group_by('ReportedUserId')
			->where('r.ReportUserStatus=0')
			->get()
			->result();
		}

		public function reported_user_profile_m($ruid,$uid,$uid2,$uid3)
		{
			$data['report_user_data']=$this->db
			->select('r.*,u.*,s.StateName,c.CityName')
			->from('tblreportuser r')
			->join('tbluser u','u.UserId=r.ReportedUserId','left')
			->join('tblcity c','u.CityId=c.CityId','left')
			->join('tblstate s','c.StateId=s.StateId','left')
			->where($ruid)
			->get()
			->result();

			$data['follower_user_data']=$this->db
			->select('t1.FollowerId')
			->from('tblfollow t1')
			->join('tbluser u','u.UserId=t1.FollowerId')
			->where($uid)
			->get()
			->result();

			$data['following_user_data']=$this->db
			->select('t1.UserId')
			->from('tblfollow t1')
			->join('tbluser u','u.UserId=t1.UserId')
			->where($uid2)
			->get()
			->result();

			$data['recipe_user_data']=$this->db
			->select('*')
			->from('tblrecipe')
			->where($uid3)
			->get()
			->result();

			$data['article_user_data']=$this->db
			->select('*')
			->from('tblarticle')
			->where($uid3)
			->get()
			->result();

			return $data;
		}

		public function get_reporter_m($rid)
		{
			return $this->db
			->select('*')
			->from('tblreportuser r')
			->join('tbluser u','u.UserId=r.UserId','left')
			->where($rid)
			->get()
			->result();
		}

		// public function get_user_to_report_m($id)
		// {

		// 	return $this->db
		// 	->select('u.UserId,u.UserStatus')
		// 	->from('tblreportuser r')
		// 	->join('tbluser u','u.UserId=r.ReportedUserId','left')
		// 	->where($id)
		// 	->get()
		// 	->result();	
		// }

		public function cancel_user_report_m($data_old,$data_new)
		{
			$this->db->set($data_new)
				->where($data_old)
				->update('tblreportuser');
		}

		public function block_user_report_m($report_table_data_new,$report_table_data_old,$user_table_data_new,$user_table_data_old)
		{
			$this->db->set($report_table_data_new)
				->where($report_table_data_old)
				->update('tblreportuser');

			$this->db->set($user_table_data_new)
				->where($user_table_data_old)
				->update('tbluser');
		}

		//Reported Recipe Code
		public function get_report_recipe_m()
		{
			return $this->db
			->select('rep.*,count(rep.ReportedRecipeId) as tot_report, rec.RecipeTitle')
			->from('tblreportrecipe rep')
			->join('tblrecipe rec','rec.RecipeId=rep.RecipeId','left')
			->group_by('RecipeId')
			->where('rep.ReportRecipeStatus=0')
			->get()
			->result();
		}

		public function reported_recipe_profile_m($ruid)
		{
			return $this->db
			->select('rep.*,u.UserName,u.UserImage,r.*,s.SubCategoryName')
			->from('tblreportrecipe rep')
			->join('tblrecipe r','r.RecipeId=rep.RecipeId','left')
			->join('tbluser u','r.UserId=u.UserId','left')
			->join('tblsubcategory s','r.SubCategoryId=s.SubCategoryId','left')
			->where($ruid)
			->get()
			->result();
		}

		public function get_reporter_recipe_m($rid)
		{
			return $this->db
			->select('*')
			->from('tblreportrecipe r')
			->join('tbluser u','u.UserId=r.UserId','left')
			->where($rid)
			->get()
			->result();
		}

		public function cancel_recipe_report_m($data_old,$data_new)
		{
			$this->db->set($data_new)
				->where($data_old)
				->update('tblreportrecipe');
		}

		public function block_recipe_report_m($report_table_data_new,$report_table_data_old,$recipe_table_data_new,$recipe_table_data_old)
		{
			$this->db->set($report_table_data_new)
				->where($report_table_data_old)
				->update('tblreportrecipe');

			$this->db->set($recipe_table_data_new)
				->where($recipe_table_data_old)
				->update('tblrecipe');
		}

		//Article Report Code
		public function get_report_article_m()
		{
			return $this->db
			->select('rep.*,count(rep.ReportedArticleId) as tot_report, a.ArticleTitle')
			->from('tblreportarticle rep')
			->join('tblarticle a','a.ArticleId=rep.ArticleId','left')
			->group_by('ArticleId')
			->where('rep.ReportArticleStatus=0')
			->get()
			->result();
		}


		public function reported_article_profile_m($auid)
		{
			return $this->db
			->select('rep.*,u.UserName,u.UserImage,a.*,s.SubCategoryName')
			->from('tblreportarticle rep')
			->join('tblarticle a','a.ArticleId=rep.ArticleId','left')
			->join('tbluser u','u.UserId=a.UserId','left')
			->join('tblsubcategory s','a.SubCategoryId=s.SubCategoryId','left')
			->where($auid)
			->get()
			->result();
		}

		public function get_reporter_article_m($aid)
		{
			return $this->db
			->select('*')
			->from('tblreportarticle a')
			->join('tbluser u','u.UserId=a.UserId','left')
			->where($aid)
			->get()
			->result();
		}


		public function cancel_article_report_m($data_old,$data_new)
		{
			$this->db->set($data_new)
				->where($data_old)
				->update('tblreportarticle');
		}

		public function block_article_report_m($report_table_data_new,$report_table_data_old,$article_table_data_new,$article_table_data_old)
		{
			$this->db->set($report_table_data_new)
				->where($report_table_data_old)
				->update('tblreportarticle');

			$this->db->set($article_table_data_new)
				->where($article_table_data_old)
				->update('tblarticle');
		}

	}
?>
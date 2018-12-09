<?php
	defined('BASEPATH') or exit('error');

	class Report extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Report_m','rm');
		}

		public function index($id)
		{
			if($id==1)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/report_user_v');
				$this->load->view('admin/footer');
				$this->ss->set_userdata('last_url_user',site_url('admin/Report/index/1'));
			}
			elseif($id==2)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/report_recipe_v');
				$this->load->view('admin/footer');
				$this->ss->set_userdata('last_url',site_url('admin/Report/index/2'));
			}
			else
			{
				$this->load->view('admin/header');
				$this->load->view('admin/report_article_v');
				$this->load->view('admin/footer');	
				$this->ss->set_userdata('last_url',site_url('admin/Report/index/3'));
			}
		}

		//Reported User Code
		public function get_report_user()
		{
			$data=$this->rm->get_report_user_m();
			echo json_encode(['aaData'=>$data]);
		}

		public function reported_user_profile($id)
		{
			$ruid=[
				'r.ReportedUserId'=>$id,
				'r.ReportUserStatus'=>0
			];

			$uid=[
				't1.UserId'=>$id
			];

			$uid2=[
				't1.FollowerId'=>$id
			];

			$uid3=[
				'UserId'=>$id
			];

			$report_user_data=$this->rm->reported_user_profile_m($ruid,$uid,$uid2,$uid3);
			$this->ss->set_userdata('last_url_user',site_url('admin/Report/reported_user_profile/').$id);

			$this->load->view('admin/header');
			$this->load->view('admin/reported_user_profile_v',$report_user_data);
			$this->load->view('admin/footer');
		}

		public function get_reporter($id)
		{
			$uid=[
				'r.ReportedUserId'=>$id,
				'r.ReportUserStatus'=>0
			];
			$data=$this->rm->get_reporter_m($uid);
			// echo "<pre>";
			// print_r($data);
			// die(count($data));
			echo json_encode(['aaData'=>$data]);
		}
		
		public function cancel_user_report($id)
		{
			$data_old=[
				'ReportedUserId'=>$id
			];

			$data_new=[
				'ReportUserStatus'=>1,
				'AdminId'=>$this->ss->AdminId
			];
			
			$this->rm->cancel_user_report_m($data_old,$data_new);
			redirect('admin/Report/index/1');
		}

		public function block_user_report($id)
		{
			$uid=[
				'ReportedUserId'=>$id	
			];
			
			//$data=$this->rm->get_user_to_report_m($uid);
			
			$report_table_data_old=[
				'ReportedUserId'=>$id
			];

			$report_table_data_new=[
				'ReportUserStatus'=>1,
				'AdminId'=>$this->ss->AdminId
			];

			$user_table_data_old=[
				'UserId'=>$id
			];

			$user_table_data_new=[
				'UserStatus'=>1
			];

			$this->rm->block_user_report_m($report_table_data_new,$report_table_data_old,$user_table_data_new,$user_table_data_old);
			redirect('admin/Report/index/1');	
		}

		//Report Recipe Code
		public function get_report_recipe()
		{
			$recipe_data=$this->rm->get_report_recipe_m();
			echo json_encode(['aaData'=>$recipe_data]);
		}
		
		public function reported_recipe_profile($id)
		{
			$ruid=[
				'rep.RecipeId'=>$id,
				'rep.ReportRecipeStatus'=>0
			];

			$data['report_recipe_data']=$this->rm->reported_recipe_profile_m($ruid);
			$this->ss->set_userdata('last_url_user',site_url('admin/Report/reported_recipe_profile/').$id);
			$this->ss->set_userdata('last_url',site_url('admin/Report/reported_recipe_profile/').$id);

			$this->load->view('admin/header');
			$this->load->view('admin/reported_recipe_profile_v',$data);
			$this->load->view('admin/footer');
		}

		public function get_reporter_recipe($id)
		{
			$uid=[
				'r.RecipeId'=>$id,
				'r.ReportRecipeStatus'=>0
			];
			$data=$this->rm->get_reporter_recipe_m($uid);
			echo json_encode(['aaData'=>$data]);
		}

		public function cancel_recipe_report($id)
		{
			$data_old=[
				'RecipeId'=>$id
			];

			$data_new=[
				'ReportRecipeStatus'=>1,
				'AdminId'=>$this->ss->AdminId
			];
			
			$this->rm->cancel_recipe_report_m($data_old,$data_new);
			redirect('admin/Report/index/2');
		}

		public function block_recipe_report($id)
		{
			$uid=[
				'RecipeId'=>$id	
			];
			
			$report_table_data_old=[
				'RecipeId'=>$id
			];

			$report_table_data_new=[
				'ReportRecipeStatus'=>1,
				'AdminId'=>$this->ss->AdminId
			];

			$recipe_table_data_old=[
				'RecipeId'=>$id
			];

			$recipe_table_data_new=[
				'RecipeStatus'=>1
			];

			$this->rm->block_recipe_report_m($report_table_data_new,$report_table_data_old,$recipe_table_data_new,$recipe_table_data_old);
			redirect('admin/Report/index/2');	
		}

		//Article Report Code
		public function get_report_article()
		{
			$data=$this->rm->get_report_article_m();
			echo json_encode(['aaData'=>$data]);
		}

		public function reported_article_profile($id)
		{
			$auid=[
				'rep.ArticleId'=>$id,
				'rep.ReportArticleStatus'=>0
			];

			$data['report_article_data']=$this->rm->reported_article_profile_m($auid);
			// echo "<pre>";
			// print_r($data);
			// die('abc');
			
			$this->ss->set_userdata('last_url_user',site_url('admin/Report/reported_article_profile/').$id);
			$this->ss->set_userdata('last_url',site_url('admin/Report/reported_article_profile/').$id);

			$this->load->view('admin/header');
			$this->load->view('admin/reported_article_profile_v',$data);
			$this->load->view('admin/footer');
		}

		public function get_reporter_article($id)
		{
			$uid=[
				'a.ArticleId'=>$id,
				'a.ReportArticleStatus'=>0
			];
			$data=$this->rm->get_reporter_article_m($uid);
			echo json_encode(['aaData'=>$data]);
		}


		public function cancel_article_report($id)
		{
			$data_old=[
				'ArticleId'=>$id
			];

			$data_new=[
				'ReportArticleStatus'=>1,
				'AdminId'=>$this->ss->AdminId
			];
			
			$this->rm->cancel_article_report_m($data_old,$data_new);
			redirect('admin/Report/index/3');
		}


		public function block_article_report($id)
		{
			$uid=[
				'ArticleId'=>$id	
			];
			
			$report_table_data_old=[
				'ArticleId'=>$id
			];

			$report_table_data_new=[
				'ReportArticleStatus'=>1,
				'AdminId'=>$this->ss->AdminId
			];

			$article_table_data_old=[
				'ArticleId'=>$id
			];

			$article_table_data_new=[
				'ArticleStatus'=>1
			];

			$this->rm->block_article_report_m($report_table_data_new,$report_table_data_old,$article_table_data_new,$article_table_data_old);
			redirect('admin/Report/index/3');	
		}
	}
?>
<?php
defined('BASEPATH') or die('error');

	/**
	* 
	*/
	class User extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/User_m','um');
			$this->load->helper('dataicon');
			if(!$this->ss->AdminId)
			{
				redirect('admin/Login');
			}
		}

		public function index()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/datatable_user_v');
			$this->load->view('admin/footer');
		}

		public function get_user()
		{
			$user_data=$this->um->get_user_m();
			echo json_encode(['aaData'=>$user_data]);
		}

		public function toggle_status($id)
		{
			$uid=[
				'UserId'=>$id
			];
			/*echo "<pre>";
			print_r($aid);
			die('hello');*/
			$this->um->toggle_status_m($uid);
		}

		public function toggle_status_user_profile($id)
		{
			$uid=[
				'UserId'=>$id
			];
			$this->um->toggle_status_m($uid);
			redirect('admin/User/profile/'.$id);
		}


		public function profile($id)
		{
				
			$uid=[
				't1.UserId'=>$id
			];

			$uid3=[
				't1.FollowerId'=>$id
			];

			$data['recipe_user_data']=$this->um->profile_recipe_m($uid);
			$data['recipe_like_data']=$this->um->get_like_recipe_m();
			$data['recipe_comment_data']=$this->um->get_comment_recipe_m();
			$data['recipe_view_data']=$this->um->get_view_recipe_m();
			
			$data['article_like_data']=$this->um->get_like_article_m();
			$data['article_comment_data']=$this->um->get_comment_article_m();
			$data['article_view_data']=$this->um->get_view_article_m();
			
			
			$data['recipe_rate_data']=$this->um->get_rate_recipe_m();
			$data['article_user_data']=$this->um->profile_article_m($uid);
			$data['follower_user_data']=$this->um->profile_follower_m($uid);
			$data['following_user_data']=$this->um->profile_following_m($uid3);
			$data['playlist_user_data']=$this->um->profile_playlist_m($uid);
			$data['playlist_post_data']=$this->um->get_post_playlist_m();
			$data['user_data']=$this->um->get_user_data_m($uid);

			/*echo "<pre>";
			print_r($data['playlist_user_data']);
			die('abc');*/
			$this->ss->set_userdata('last_url',site_url('admin/User/Profile/').$id);
			//$data['recipe_user_data']=$this->um->profile_recipe_m($uid);
			$this->load->view('admin/header');
			$this->load->view('admin/user_profile_a_v',$data);
			$this->load->view('admin/footer');
			
		}

		public function article_read_more($id)
		{
			$rid=[
				'ArticleId'=>$id
			];

			$data['article_data']=$this->um->article_read_more_m($rid);
			
			$this->load->view('admin/header');
			$this->load->view('admin/article_read_more_v',$data);
			$this->load->view('admin/footer');
		}

		public function toggle_status_follow($id,$upid)
		{
			$uid=[
				'UserId'=>$id
			];
			/*echo "<pre>";
			print_r($aid);
			die('hello');*/
			$this->um->toggle_status_m($uid);
			redirect('admin/User/profile/'.$upid);
		}
	}
?>
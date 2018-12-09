<?php
	defined('BASEPATH') or exit("error");

	class Article extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Article_m','am');
			$this->load->helper('createdtime');
		}

		public function index()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/article_v');
			$this->load->view('admin/footer');
		}

		public function get_article()
		{
			$data['article_data']=$this->am->get_article_m();
			$data['article_like_data']=$this->am->get_like_article_m();
			$data['article_comment_data']=$this->am->get_comment_article_m();
			
			$this->ss->set_userdata('last_url',site_url('admin/Article/get_article/'));
			$this->load->view('admin/header');
			$this->load->view('admin/article_v',$data);
			$this->load->view('admin/footer');
		}

		public function article_read_more($id)
		{
			$aid=[
				'ArticleId'=>$id
			];
			$data=$this->am->article_read_more_m($aid);
			
			// $data['user_name']=$this->ss->UserName;
			// echo "<pre>";
			// print_r($data);
			// die($data['recipe_data'][0]->VideoUrl);	
			
			$this->load->view('admin/header');
			$this->load->view('admin/article_read_more_v',$data);
			$this->load->view('admin/footer');
		}

		//read more view
		public function toggle_status($id)
		{
			$aid=[
				'ArticleId'=>$id
			];
			$this->am->toggle_status_m($aid);
			redirect('admin/Article/article_read_more/'.$id);
		}

		//article view
		public function toggle_status_article($id)
		{
			$aid=[
				'ArticleId'=>$id
			];
			$this->am->toggle_status_m($aid);
			redirect('admin/Article/get_article/'.$id);
		}

		//user view
		public function toggle_status_2($id,$uid)
		{
			$aid=[
				'ArticleId'=>$id
			];
			$this->am->toggle_status_m($aid);
			redirect('admin/User/profile/'.$uid);
		}

	}
?>
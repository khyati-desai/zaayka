<?php
	defined('BASEPATH') or exit('error');

	class Recipe extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Recipe_m','rm');
			$this->load->helper('createdtime');
		}

		public function index()
		{
			
		}

		public function get_recipe()
		{
			$data['recipe_data']=$this->rm->get_recipe_m();
			$data['recipe_like_data']=$this->rm->get_like_recipe_m();
			$data['recipe_comment_data']=$this->rm->get_comment_recipe_m();
			$data['recipe_view_data']=$this->rm->get_view_recipe_m();
			$data['recipe_rate_data']=$this->rm->get_rate_recipe_m();
			$this->ss->set_userdata('last_url',site_url('admin/Recipe/get_recipe/'));
			// echo "<pre>";
			// print_r($data['recipe_data'][0]);
			// die();
			$this->load->view('admin/header');
			$this->load->view('admin/recipe_v',$data);
			$this->load->view('admin/footer');
		}
		
		public function recipe_read_more($id)
		{
			$rid=[
				'RecipeId'=>$id
			];
			$data=$this->rm->recipe_read_more_m($rid);
			
			/*$u_data['UserId']=$data['recipe_data'][0]->UserId;
			$data['user_data']=$this->um->get_user_details_m($u_data);*/

			
			// $data['user_name']=$this->ss->UserName;
			// echo "<pre>";
			// print_r($data);
			// die($data['recipe_data'][0]->UserId);

			$this->load->view('admin/header');
			$this->load->view('admin/recipe_read_more_v',$data);
			$this->load->view('admin/footer');
		}

		public function toggle_status($id)
		{
			$rid=[
				'RecipeId'=>$id
			];

			$this->rm->toggle_status_m($rid);
			redirect('admin/Recipe/recipe_read_more/'.$id);
		}

		public function toggle_status_recipe($id)
		{
			$rid=[
				'RecipeId'=>$id
			];
			$this->rm->toggle_status_m($rid);
			redirect('admin/Recipe/get_recipe');
		}
		
		public function toggle_status_2($id,$uid)
		{
			$rid=[
				'RecipeId'=>$id
			];

			$this->rm->toggle_status_m($rid);
			redirect('admin/User/profile/'.$uid);
		}	
	}
?>
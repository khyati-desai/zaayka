<?php
	defined('BASEPATH') or die('error');

	/**
	* 
	*/
	class Playlist extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Playlist_m','pm');
			if(!$this->ss->UserId)
				{
					redirect('Login_user');
				}
		}

		public function index()
		{
			$uid=[
				'UserId'=>$this->ss->UserId,
				'PlaylistStatus'=>0
			];
			$data['playlist_data']=$this->pm->get_playlist_m($uid);

			$this->load->view('header_user');
			$this->load->view('playlist_display_v',$data);
			$this->load->view('footer_user');
		}

		public function dlt_playlist($id)
		{
			$pid=[
				'PlaylistId'=>$id
			];

			$this->pm->dlt_playlist_m($pid);

			redirect('Playlist/');
		}

		public function display_playlist_recipes($id)
		{
			$ppid=[
				'pp.PlaylistId'=>$id,
				'p.PlaylistStatus'=>0,
				'r.RecipeStatus'=>0
			];

			$pid=[
				'PlaylistId'=>$id,
				'PlaylistStatus'=>0
			];
			$data['pl_data']=$this->pm->get_playlist_m($pid);
			$data['pr_data']=$this->pm->display_playlist_recipes_m($ppid);

			if(count($data['pl_data'])>0)
			{
				$this->load->view('header_user');
				$this->load->view('playlist_recipes_display_v',$data);
				$this->load->view('footer_user');
			}
			else
			{
				redirect('PageNotFound/');
			}
		}

		public function dlt_playlist_recipe($id,$pid)
		{
			$ppid=[
				'PlaylistPostId'=>$id
			];

			$this->pm->dlt_playlist_recipe_m($ppid);

			redirect('Playlist/display_playlist_recipes/'.$pid);
		}
	}
?>
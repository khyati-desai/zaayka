<?php
	defined('BASEPATH') or exit('error');

	/**
	* 
	*/
	class Playlist extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Playlist_m','pm');
			$this->load->helper('dataicon');
			if(!$this->ss->AdminId)
			{
				redirect('admin/Login');
			}
		}

		public function index()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/datatable_playlist_v');
			$this->load->view('admin/footer');
		}

		public function get_playlist_recipes($id)
		{
			$pid=[
				'p2.PlaylistId'=>$id
			];
			$data=$this->pm->get_playlist_recipes_m($pid);
			$this->ss->set_userdata('last_url',site_url('admin/Playlist/get_playlist_recipes/').$id);
			$this->load->view('admin/header');
			$this->load->view('admin/playlist_v',$data);
			$this->load->view('admin/footer');
		}

		public function get_playlist()
		{
			$data=$this->pm->get_playlist_m();
			/*echo "<pre>";
			print_r($data);
			die('hello');*/

			echo json_encode(['aaData'=>$data]);
		}

		public function toggle_status($id,$uid=false)
		{
			$pid=[
				'PlaylistId'=>$id
			];
			$this->pm->toggle_status_m($pid);
			if($uid!=false)
				redirect('admin/User/profile/'.$uid);
		}
	}
?>
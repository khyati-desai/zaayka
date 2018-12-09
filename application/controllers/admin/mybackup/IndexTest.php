<?php
	defined('BASEPATH') or die('error');

	/**
	* 
	*/
	class IndexTest extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
		}

		public function index()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/recipe_read_more_v');
			$this->load->view('admin/footer');
			//
		}
	}
?>
<?php
	defined('BASEPATH') or die('error');

	/**
	* 
	*/
	class PageNotFound extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->load->view('header_user');
			$this->load->view('page_not_found');
			$this->load->view('footer_user');
		}
	}
?>
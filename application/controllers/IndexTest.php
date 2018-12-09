<?php
	defined('BASEPATH') or die("ERROR");

	class IndexTest extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			
		}

		public function index()
		{
			// $this->load->view('header_user');
			$this->load->view('extra_user');
			//$this->load->view('test_v');
			//$this->load->view('footer_user');
		}
	}

?>
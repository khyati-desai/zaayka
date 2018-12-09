<?php
	defined('BASEPATH') or exit('error');
	/**
	* 
	*/
	class Logout extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->ss->sess_destroy();
			redirect('admin/Login');
		}

		public function index()
		{

		}
	}
?>
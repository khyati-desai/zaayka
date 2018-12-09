<?php
	defined('BASEPATH') or exit('error');
	/**
	* 
	*/
	class Logout_user extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->ss->sess_destroy();
			redirect('Login_user');
		}

		public function index()
		{

		}
	}
?>
<?php
	defined('BASEPATH') or exit('Error');
	/**
	* 
	*/
	class Login extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Login_m','lm');
			if($this->ss->AdminId)
			{
					redirect('admin/Admin');
			}
		}

		public function index()
		{
			$this->load->view('admin/login_v');
		}

		public function do_login()
		{
			
			$this->fv->set_rules('sAdminEmail','Admin Email','trim|required|min_length[5]|max_length[20]');
			$this->fv->set_rules('sAdminPassword','Admin Password','trim|required|min_length[5]|max_length[20]|alpha_dash');
			if($this->fv->run()==FALSE)
			{
				$this->load->view('admin/login_v');
			}
			else
			{
				//die("success");
				$admin_data_nec=[
					'AdminEmail'=>$this->input->post('sAdminEmail'),
					'AdminName'=>$this->input->post('sAdminEmail'),
					'AdminContactNo'=>$this->input->post('sAdminEmail'),
				];
				$admin_data_pwd=[
					'AdminPassword'=>$this->input->post('sAdminPassword'),
				];
				$data=$this->lm->do_login_m($admin_data_nec,$admin_data_pwd);
				if(count($data)==1)
				{
					if($data[0]->AdminStatus==0)
					{
						$this->ss->set_userdata('AdminId',$data[0]->AdminId);
						$this->ss->set_userdata('AdminEmail',$data[0]->AdminEmail);
						$this->ss->set_userdata('AdminImage',$data[0]->AdminImage);
						$this->ss->set_userdata('AdminLevel',$data[0]->AdminLevel);
							redirect('admin/Admin');
					}
					else
					{
						$data['error']='You have been blocked by admin';
						$this->load->view('admin/login_v',$data);
					}
				}
				else
				{
					$data['error']='Invalid email or password';
					$this->load->view('admin/login_v',$data);
					//redirect('Login');
				}
			}
		}
	}
?>
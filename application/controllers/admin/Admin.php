<?php
	defined('BASEPATH') or exit('error');

	/**
	* 
	*/
	class Admin extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Admin_m','am');
			$this->load->helper('form');
			if(!$this->ss->AdminId)
			{
				redirect('admin/Login');
			}
			$set['upload_path']='./resource/admin/image/';
			$set['allowed_types']='jpg|png|gif';
			$this->load->library('upload',$set,'up');
			$this->load->helper('dataicon');
		}

		public function index()
		{
			if($this->ss->AdminLevel==0)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/datatable_v');
				$this->load->view('admin/footer');
			}
			else
			{
				$this->get_admin_to_update();
			}
		}

		public function get_admin()
		{
			$alevel=[
				'a1.AdminLevel'=>1
			];
			$admin_data=$this->am->get_admin_m($alevel);
			foreach ($admin_data as $ad)
			{
				$ad->AdminLevel=$ad->AdminLevel==1?'SubAdmin':'SuperAdmin';	
			}
				
			echo json_encode(['aaData'=>$admin_data]);
		}

		public function toggle_status($id)
		{
			$aid=[
				'AdminId'=>$id
			];
			/*echo "<pre>";
			print_r($aid);
			die('hello');*/
			$this->am->toggle_status_m($aid);
		}

		public function add_admin()
		{
			$this->fv->set_rules('aAdminName','Admin Name','trim|required|min_length[5]|max_length[20]|alpha');
			$this->fv->set_rules('aAdminEmail','Admin Email','trim|required|min_length[5]|max_length[20]|valid_email');
			$this->fv->set_rules('aAdminPassword','Admin Password','trim|required|min_length[5]|max_length[20]|alpha_dash');
			$this->fv->set_rules('aAdminContactNo','Admin Contact','trim|required|exact_length[10]|numeric');
			if($this->fv->run()==FALSE)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/datatable_v');
				$this->load->view('admin/footer');
			}
			else
			{
				$admin_data=[
					'AdminName'=>$this->input->post('aAdminName'),
					'AdminEmail'=>$this->input->post('aAdminEmail'),
					'AdminPassword'=>$this->input->post('aAdminPassword'),
					'AdminContactNo'=>$this->input->post('aAdminContactNo'),
					'AdminLevel'=>$this->input->post('aAdminLevel'),
					'AddedByAdminId'=>$this->ss->AdminId
				];
				if($this->up->do_upload('aAdminImage'))
				{
					$id=$this->up->data();
					$admin_data['AdminImage']=$id['file_name'];
				}
				else
				{
					$err=$this->up->display_errors('file_name');
					if($err == NULL)
					{
						die($this->up->display_errors());			
					}
				}
				$this->am->add_admin_m($admin_data);
				redirect('admin/Admin');
			}
		}

		public function get_admin_to_update($error=FALSE)
		{
			$aid=[
				'AdminId'=>$this->ss->AdminId
			];

			if($error != FALSE)
			{
				$data=$error;
			}
			$data['admin_data']=$this->am->get_admin_to_update_m($aid);
			
			$this->load->view('admin/header');
			$this->load->view('admin/update_admin_v',$data);
			$this->load->view('admin/footer');
			/*echo "<pre>";
			print_r($data);
			die('hello');*/
		}

		public function update_basic()
		{
			$this->fv->set_rules('uAdminName','Admin Name','trim|required|min_length[5]|max_length[20]|alpha');
			$this->fv->set_rules('uAdminEmail','Admin Email','trim|required|min_length[5]|max_length[20]|valid_email');
			$this->fv->set_rules('uAdminContactNo','Admin Contact','trim|required|exact_length[10]|numeric');
			if($this->fv->run()==FALSE)
			{
				$error['basic']="Basic Error";
				$this->get_admin_to_update($error);
			}
			else
			{
				$admin_data_new=[
					'AdminName'=>$this->input->post('uAdminName'),
					'AdminEmail'=>$this->input->post('uAdminEmail'),
					'AdminContactNo'=>$this->input->post('uAdminContactNo')
				];
				$admin_data_old=[
					'AdminId'=>$this->ss->AdminId
				];
				$this->am->update_basic_m($admin_data_old,$admin_data_new);
				redirect('admin/Admin/get_admin_to_update');
				/*echo "<pre>";
				print_r($admin_data_new);
				print_r($admin_data_old);
				die('hello');*/
			}	
		}

		public function update_profile()
		{
			if($this->up->do_upload('uAdminImage'))
			{
				$img_id=$this->up->data();
				$admin_data_new['AdminImage']=$img_id['file_name'];
				$admin_data_old=[
					'AdminId'=>$this->ss->AdminId
				];
				$this->am->update_profile_m($admin_data_old,$admin_data_new);
				$this->ss->AdminImage=$img_id['file_name'];
				redirect('admin/Admin/get_admin_to_update/');
			}
			else
			{
				$err=$this->up->display_errors('file_name');
				if($err == NULL)
				{
					die($this->up->display_errors());
				}
				else
				{
					redirect('admin/Admin/get_admin_to_update/');		
				}
			}
		}

		public function update_password()
		{

			$this->fv->set_rules('uAdminPasswordOld','Admin Password','trim|required|min_length[5]|max_length[20]|alpha_dash');
			$this->fv->set_rules('uAdminPasswordNew','Admin New Password','trim|required|min_length[5]|max_length[20]|alpha_dash');
			$this->fv->set_rules('uAdminPasswordConfirm','Confirm Password','trim|required|matches[uAdminPasswordNew]');
			if($this->fv->run()==FALSE)
			{
				$error['password']="Password error";
				$this->get_admin_to_update($error);
			}
			else
			{
				$admin_data_old=[
				'AdminId'=>$this->ss->AdminId
				];

				$current_password=$this->am->get_password_m($admin_data_old);

				$admin_data_new=[
					'AdminPassword'=>$this->input->post('uAdminPasswordNew')
				];

				if($current_password[0]->AdminPassword==$this->input->post('uAdminPasswordOld'))
				{
					$this->am->update_password_m($admin_data_old,$admin_data_new);
					redirect('admin/Admin/get_admin_to_update');
				}

				else
				{
					$error['incorrect_pwd']="Current password is incorrect";
					$this->get_admin_to_update($error);
				}
			}
		}
		// public function update_admin($id)
		// {
		// 	$this->fv->set_rules('uAdminName','Admin Name','trim|required|min_length[5]|max_length[20]|alpha');
		// 	/*$this->fv->set_rules('uAdminEmail','Admin Email','trim|required|min_length[5]|max_length[20]|valid_email');*/
		// 	$this->fv->set_rules('uAdminPassword','Admin Password','trim|required|min_length[5]|max_length[20]|alpha_dash');
		// 	if($this->fv->run()==FALSE)
		// 	{
		// 		/*$this->load->view('admin/header');
		// 		$this->load->view('admin/update_admin');
		// 		$this->load->view('admin/footer');*/
		// 		$this->get_admin_to_update($id);
		// 	}
		// 	else
		// 	{
		// 		$admin_data_new=[
		// 			'AdminName'=>$this->input->post('uAdminName'),
		// 			/*'AdminEmail'=>$this->input->post('uAdminEmail'),*/
		// 			'AdminPassword'=>$this->input->post('uAdminPassword')
		// 		];
		// 		if($this->up->do_upload('uAdminImage'))
		// 		{
		// 			$img_id=$this->up->data();
		// 			$admin_data_new['AdminImage']=$img_id['file_name'];
		// 		}
		// 		else
		// 		{
		// 			$err=$this->up->display_errors('file_name');
		// 			if($err == NULL)
		// 			{
		// 				die($this->up->display_errors());			
		// 			}
		// 		}
		// 		$admin_data_old=[
		// 			'AdminId'=>$id
		// 		];
		// 		$this->am->update_admin_m($admin_data_old,$admin_data_new);
		// 		redirect('admin/Admin');
		// 	}	
		// }
	}
?>
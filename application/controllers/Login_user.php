<?php
	defined('BASEPATH') or die("ERROR");

	class Login_user extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Login_user_m','lum');
			$this->load->helper('form');
			if($this->ss->UserId)
				redirect('User');
			$set['upload_path']='./resource/user/image/';
			$set['allowed_types']='jpg|png|gif';
			$this->load->library('upload',$set,'up');
		}

		public function index()
		{
			$data=$this->lum->get_st_ct_m();
			/*echo "<pre>";
			print_r($data);
			die('hello');*/
			$this->load->view('header_user');
			$this->load->view('login_user_v',$data);
			$this->load->view('footer_user');
		}
		public function do_login()
		{
			//die('hello');
			$this->fv->set_rules('sUserName','Name Field','trim|required|min_length[5]|max_length[200]');
			$this->fv->set_rules('sUserPassword','User Password','trim|required|min_length[5]|max_length[20]');
			$this->fv->set_error_delimiters('<div style="color:red">','</div>');
			if($this->fv->run()==FALSE)
			{
				$this->load->view('header_user');
				$this->load->view('login_user_v');
				$this->load->view('footer_user');
			}
			else
			{
				//die("success");
				$user_data_nec=[
					'UserEmail'=>$this->input->post('sUserName'),
					'UserName'=>$this->input->post('sUserName'),
					'UserContactNo'=>$this->input->post('sUserName'),
				];
				$user_data_pwd=[
					'UserPassword'=>$this->input->post('sUserPassword'),
				];
				$data=$this->lum->do_login_m($user_data_nec,$user_data_pwd);
				if(count($data)==1)
				{
					if($data[0]->UserStatus==0)
					{
						$this->ss->set_userdata('UserId',$data[0]->UserId);
						$this->ss->set_userdata('UserEmail',$data[0]->UserEmail);
						$this->ss->set_userdata('UserImage',$data[0]->UserImage);
							redirect('User');
					}
					else
					{
						$data['error']='You have been blocked by admin';
						$this->load->view('header_user');
						$this->load->view('login_user_v',$data);
						$this->load->view('footer_user');
					}
				}
				else
				{
					$data['error']='Invalid email or password';
					$this->load->view('header_user');
					$this->load->view('login_user_v',$data);
					$this->load->view('footer_user');
					//redirect('Login');
				}
			}
		}		

		public function get_city($stid)
		{
			$stdata=[
				'StateId'=>$stid
			];
			$ctdata=$this->lum->get_city_m($stdata);
			//echo "<option value=0>Select a city</option>";
			foreach($ctdata as $ct)
			{
				echo "<option value=$ct->CityId>$ct->CityName</option>";
			}
		}

		public function add_user()
		{
			$this->fv->set_rules('aUserName','User Name','trim|required|min_length[5]|max_length[20]|is_unique[tbluser.UserName]');
			$this->fv->set_rules('aUserEmail','User Email','trim|required|min_length[5]|max_length[200]|valid_email');
			$this->fv->set_rules('aUserPassword','User Password','trim|required|min_length[5]|max_length[20]');
			$this->fv->set_rules('aUserPasswordC','Confirm Password','trim|required|matches[aUserPassword]');
			$this->fv->set_rules('aUserContactNo','User Contact','trim|required|exact_length[10]|numeric');
			$this->fv->set_error_delimiters('<div style="color:red">','</div>');
			$this->fv->set_message('is_unique','Oops! This username is already taken.');
			if($this->fv->run()==FALSE)
			{
				$data=$this->lum->get_st_ct_m();
				$data['regis_error']="Registration error";
				$this->load->view('header_user');
				$this->load->view('login_user_v',$data);
				$this->load->view('footer_user');
			}
			else
			{
				//die('success');
				$user_data=[
					'UserName'=>$this->input->post('aUserName'),
					'UserEmail'=>$this->input->post('aUserEmail'),
					'UserPassword'=>$this->input->post('aUserPassword'),
					'UserContactNo'=>$this->input->post('aUserContactNo'),
					'CityId'=>$this->input->post('aCityId'),
				];
				if($this->up->do_upload('aUserImage'))
				{
					$id=$this->up->data();
					$user_data['UserImage']=$id['file_name'];
					$this->ss->set_userdata('UserImage',$user_data['UserImage']);
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
						$this->ss->set_userdata('UserImage','default.jpg');		
					}
				}
				if($this->up->do_upload('aUserCover'))
				{
					$id=$this->up->data();
					$user_data['UserCoverImage']=$id['file_name'];
				}
				else
				{
					$err=$this->up->display_errors('file_name');
					if($err == NULL)
					{
						die($this->up->display_errors());			
					}
				}
				/*echo "<pre>";
				print_r($user_data);
				die('hello');*/
				$this->lum->add_user_m($user_data);
				// $this->ss->set_userdata('UserId',$this->input->post('aUserName'));
				// $this->ss->set_userdata('UserEmail',$this->input->post('aUserEmail'));
				/*$this->ss->set_userdata('UserImage',$data[0]->UserImage);*/
				redirect('Login_user');
			}
		}
	}
?>
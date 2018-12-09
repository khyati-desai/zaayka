<?php
	defined('BASEPATH') or die('error');

	/**
	* 
	*/
	class Profile extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Profile_m','pm');
			$this->load->helper('form');
			if(!$this->ss->UserId)
				redirect('Login_user');
			$set['upload_path']='./resource/user/image/';
			$set['allowed_types']='jpg|png|gif';
			$this->load->library('upload',$set,'up');
		}

		public function index($id=false)
		{
			if($id!=false)
			{
				$uid=[
					'u.UserId'=>$id
				];

				$uid2=[
					'f.FollowerId'=>$id
				];

				$uid3=[
					'f.FollowerId'=>$this->ss->UserId,
					'f.UserId'=>$id
				];

				$rid=[
					'r.UserId'=>$id,
					'r.RecipeStatus'=>0,
					'u.UserStatus'=>0
				];

				$aid=[
					'a.UserId'=>$id,
					'a.ArticleStatus'=>0,
					'u.UserStatus'=>0

				];	

				$data['user_id']=$id;

				$data['user_follows']=$this->pm->user_follows_m($uid3);
				/*echo "<pre>";
				print_r($data['user_follows']);
				die('hello');*/
			}
			else
			{
				$uid=[
					'u.UserId'=>$this->ss->UserId
				];

				$uid2=[
					'f.FollowerId'=>$this->ss->UserId
				];

				$rid=[
					'r.UserId'=>$this->ss->UserId,
					'r.RecipeStatus'=>0
				];	

				$aid=[
					'a.UserId'=>$this->ss->UserId,
					'a.ArticleStatus'=>0
				];	
				$data['user_id']=$this->ss->UserId;
			}
			$data['user_data']=$this->pm->get_user_m($uid);
			if(count($data['user_data'])==1)
			{
				$ucityid=[
					'StateId'=>$data['user_data'][0]->StateId
				];
				/*$data['user_city']=$this->pm->get_city_m($ucityid);*/
				$data['states']=$this->pm->get_state_m();
				$data['cities']=$this->pm->get_city_m($ucityid);
				$data['user_followers_follow']=$this->pm->get_followers_follow_m($uid,$uid2);
				$data['user_followers_unfollow']=$this->pm->get_followers_unfollow_m($uid,$uid2);
				$data['user_following']=$this->pm->get_following_m($uid2);
				$data['history_data']=$this->pm->get_history_data_m($uid);
				/*echo "<pre>";
				print_r($data['history_data']);
				die('hello');*/
				//recipe data
			$data['recipe_data']=$this->pm->get_recipe_m($rid);
			$data['recipe_comment']=$this->pm->get_recipe_comment_m();
			$data['recipe_like']=$this->pm->get_recipe_like_m();
			$data['recipe_rate']=$this->pm->get_recipe_rate_m();
			$data['recipe_view']=$this->pm->get_recipe_view_m();
			//article data
			$data['article_data']=$this->pm->get_article_m($aid);
			$data['article_comment']=$this->pm->get_article_comment_m();
			$data['article_like']=$this->pm->get_article_like_m();

			
				$this->load->view('header_user');
				$this->load->view('profile_user_v',$data);
				$this->load->view('footer_user');
			}
			else
			{
				redirect('PageNotFound');
			}
		}

		public function get_city($stid)
		{
			$stdata=[
				'StateId'=>$stid
			];
			$ctdata=$this->pm->get_city_m($stdata);
			//echo "<option value=0>Select a city</option>";
			foreach($ctdata as $ct)
			{
				echo "<option value=$ct->CityId>$ct->CityName</option>";
			}
		}

		public function update_basic()
		{
			$uid=[
				'UserId'=>$this->ss->UserId
			];
			$original_value=$this->pm->get_username($uid);
			if($this->input->post('uUserName') != $original_value[0]->UserName) {
			       $is_unique_uname =  '|is_unique[tbluser.UserName]';
			    } else {
			       $is_unique_uname =  '';
			    }
			if($this->input->post('uUserEmail') != $original_value[0]->UserEmail) {
			       $is_unique_email =  '|is_unique[tbluser.UserEmail]';
			    } else {
			       $is_unique_email =  '';
			    }
			if($this->input->post('uUserContactNo') != $original_value[0]->UserContactNo) {
			       $is_unique_contact =  '|is_unique[tbluser.UserContactNo]';
			    } else {
			       $is_unique_contact =  '';
			    }
			/*echo "<pre>";
			print_r($original_value);
			die('hello');*/
			$this->fv->set_rules('uUserName','User Name','trim|required|min_length[5]|max_length[20]|alpha_dash'.$is_unique_uname);
			$this->fv->set_rules('uUserEmail','User Email','trim|required|min_length[5]|max_length[20]|valid_email'.$is_unique_email);
			/*$this->fv->set_rules('uUserPassword','User Password','trim|required|min_length[5]|max_length[20]|alpha_dash');
			$this->fv->set_rules('uUserPasswordC','Confirm Password','trim|required|matches[uUserPassword]');*/
			$this->fv->set_rules('uUserContactNo','User Contact','trim|required|exact_length[10]|numeric'.$is_unique_contact);
			$this->fv->set_error_delimiters('<div style="color:red">','</div>');
			$this->fv->set_message('is_unique','%s should be unique.');
			if($this->fv->run()==FALSE)
			{
				$this->get_user_to_update();
				/*die('error hai');*/
			}
			else
			{
				//die('success');
				$user_data_new=[
					'UserName'=>$this->input->post('uUserName'),
					'UserEmail'=>$this->input->post('uUserEmail'),
					'UserContactNo'=>$this->input->post('uUserContactNo'),
					'CityId'=>$this->input->post('uCityId'),
				];
				/*echo "<pre>";
				print_r($user_data);
				die('hello');*/
				$this->pm->update_basic_m($uid,$user_data_new);
				$this->ss->set_userdata('UserEmail',$this->input->post('uUserEmail'));
				redirect('Profile/');
			}
		}

		public function update_password()
		{
			$this->fv->set_rules('uUserPasswordOld','User` Password','trim|required|min_length[5]|max_length[20]|alpha_dash');
			$this->fv->set_rules('uUserPasswordNew','User` New Password','trim|required|min_length[5]|max_length[20]|alpha_dash');
			$this->fv->set_rules('uUserPasswordNewC','Confirm Password','trim|required|matches[uUserPasswordNew]');
			if($this->fv->run()==FALSE)
			{
				//$error['password']="Password error";
				//$this->get_admin_to_update($error);
				$this->get_user_to_update();
			}
			else
			{
				$user_data_old=[
				'UserId'=>$this->ss->UserId
				];

				$current_password=$this->pm->get_password_m($user_data_old);

				$user_data_new=[
					'UserPassword'=>$this->input->post('uUserPasswordNew')
				];

				if($current_password[0]->UserPassword==$this->input->post('uUserPasswordOld'))
				{
					$this->pm->update_basic_m($user_data_old,$user_data_new);
					redirect('Profile/');
				}

				else
				{
					$error="Current password is incorrect";
					$this->get_user_to_update($error);
				}
			}
		}

		public function get_user_to_update($error=false)
		{
			$uid=[
				'u.UserId'=>$this->ss->UserId
			];

			$uid2=[
				'f.FollowerId'=>$this->ss->UserId
			];

			$data['user_data']=$this->pm->get_user_m($uid);
			$data['error']=$error;
			if(count($data['user_data'])==1)
			{
				$ucityid=[
					'StateId'=>$data['user_data'][0]->StateId
				];
				/*$data['user_city']=$this->pm->get_city_m($ucityid);*/
				$data['states']=$this->pm->get_state_m();
				$data['cities']=$this->pm->get_city_m($ucityid);
				$data['user_followers_follow']=$this->pm->get_followers_follow_m($uid,$uid2);
				$data['user_followers_unfollow']=$this->pm->get_followers_unfollow_m($uid,$uid2);
				$data['user_following']=$this->pm->get_following_m($uid2);
				/*echo "<pre>";
				print_r($data);
				die('hello');*/
				$this->load->view('header_user');
				$this->load->view('profile_user_v',$data);
				$this->load->view('footer_user');
			}
		}

		public function update_profile()
		{
			$user_data_old=[
				'UserId'=>$this->ss->UserId
			];
			if($this->up->do_upload('uUserImage'))
			{
				$img_id=$this->up->data();
				$user_data_new['UserImage']=$img_id['file_name'];
				$this->pm->update_basic_m($user_data_old,$user_data_new);
				$this->ss->UserImage=$img_id['file_name'];
			}
			if($this->up->do_upload('uUserCover'))
			{
				$img_id=$this->up->data();
				$user_data_new['UserCoverImage']=$img_id['file_name'];
				$this->pm->update_basic_m($user_data_old,$user_data_new);
			}
			/*echo "<pre>";
			print_r($img_id);
			die('hello');*/
			redirect('Profile/');
		}
		public function follow2($id)
		{
			$id=substr($id,7);
			$op=$this->pm->get_follow2(['FollowerId'=>$this->ss->UserId,'UserId'=>$id]);
			if(count($op)==0)
			{
				$this->pm->add_follow(['FollowerId'=>$this->ss->UserId,'UserId'=>$id]);
				echo '<button class="btn mybtn2" id="follow-'.$id.'">Unfollow</button>';
			}

			else
			{
				$this->pm->del_follow(['FollowerId'=>$this->ss->UserId,'UserId'=>$id]);
				echo '<button class="btn mybtn3" id="follow-'.$id.'">Follow</button>';
			}
		}

		public function follow3($id)
		{
			$id=substr($id,11);
			$op=$this->pm->get_follow2(['FollowerId'=>$this->ss->UserId,'UserId'=>$id]);
			if(count($op)==0)
			{
				$this->pm->add_follow(['FollowerId'=>$this->ss->UserId,'UserId'=>$id]);
				echo '<button class="btn mybtn2" id="btn-follow-'.$id.'">Unfollow</button>';
			}

			else
			{
				$this->pm->del_follow(['FollowerId'=>$this->ss->UserId,'UserId'=>$id]);
				echo '<button class="btn mybtn3" id="btn-follow-'.$id.'">Follow</button>';
			}
		}

		public function dlt_history($id)
		{
			$hid=[
				'historyId'=>$id
			];
			$this->pm->dlt_history_m($hid);
			//print_r($hid);
		}
		
		public function clr_history()
		{
			$chid=[
				'UserId'=>$this->ss->UserId
			];
			$this->pm->clr_history_m($chid);
		}
	}
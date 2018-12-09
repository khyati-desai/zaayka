<?php
	defined('BASEPATH') or die('error');

	class Competition_user extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Competition_user_m','cm');
			$this->load->helper('form');
			$this->load->helper('createdtime');
			if(!$this->ss->UserId)
				redirect('Login_user');
			$set['upload_path']='./resource/user/image/';
			$set['allowed_types']='jpg|png|gif|mp4';
			// $set['encrypt_name']=TRUE;
			$this->load->library('upload',$set,'up');
		}

		public function index($id=false,$order=false)
		{
			$data=$this->get_competition($id,$order);
			if(count($data['competition_data'])>0)
			{
				// for($i=0,$j=0;$i<count($data['competition_data']);$i++)
				// {
				// 	if($data['competition_data'][$i]->CompetitionProgress!="Ended")
				// 	{
				// 		$cdata['competition_data'][$j]=$data['competition_data'][$i];
				// 		$j++;
				// 	}
				// }
				// if(count($cdata['competition_data'])>0)
				// {
					if($id!=false)
					{
						// $cdata['competition_video_data']=$data['competition_video_data'];
						if($data['competition_data'][0]->WinnerId != null)
						{
							$winid=[
								'UserId'=>$data['competition_data'][0]->WinnerId
							];
							$data['winner_data']=$this->cm->get_winner_user($winid);
						}
						$this->load->view('header_user');
						$this->load->view('competition_read_more_v',$data);
						$this->load->view('footer_user');
					}
					else
					{
						$this->load->view('header_user');
						$this->load->view('competition_all_v',$data);
						$this->load->view('footer_user');
						/*echo "<pre>";
						print_r($data);
						die("hello");*/
					}
				// }
				// else
				// {
				// 	redirect('PageNotFound');
				// }
			}
			else
			{
				redirect('PageNotFound');
			}
		}
		
		public function get_competition($id=false,$order=false)
		{
			$cid=[
				'c.CompetitionId'=>$id
			];
			$data=$this->cm->get_competition_m($cid);
			foreach ($data as $d)
			{
				$d->TotalLikes=$this->cm->get_total_videos($d->CompetitionId);
				$d->CompetitionCreatedDate=get_time_ago(strtotime($d->CompetitionCreatedDate));
				$d->TotalVideos=$this->cm->get_total_c_videos($d->CompetitionId);
				$s_time=intval(time()-strtotime($d->CompetitionStartDate));
				$e_time=intval(time()-strtotime($d->CompetitionEndDate));
				if($s_time >=0 && $e_time>0)
				{
					$d->CompetitionProgress='Ended';
					$d->Color="grey";
				}
				else if($s_time >0 && $e_time<=0)
				{
					$d->CompetitionProgress='In Progress';	
					$RemainingDays=intval((time()-strtotime($d->CompetitionEndDate))/(24*60*60));
					if($RemainingDays <=0 &&  $RemainingDays >-5)
						$d->Color='red';
					else if($RemainingDays <=-5 && $RemainingDays >-10)
						$d->Color='yellow';
					else
						$d->Color="grey";
				}
				else
				{
					$d->CompetitionProgress='Yet to start';	
					$RemainingDays=intval((time()-strtotime($d->CompetitionStartDate))/(24*60*60));
					$d->Color="grey";
				}
				if($d->CompetitionStatus==0)
				{
					$d->CompetitionStatus='Active';	
				}
				else if($d->CompetitionStatus==1)
				{
					$d->CompetitionStatus='Force Stopped';
				}
			}

			if($id!=false)
			{
				$cdata['competition_video_data']=$this->cm->get_videos_m($cid,$order);
			}
			$cdata['competition_data']=$data;
/*			echo "<pre>";
			print_r($cdata);
			die('hello');*/
			return $cdata;
		}

		public function get_video($id)
		{
			$vid=[
				'CompetitionVideoId'=>$id
			];
			$data=$this->cm->get_video_read_more_m($vid);
			if(count($data['video_data'])>0)
			{
				$data['competition_data']=$this->get_competition2($data['video_data'][0]->CompetitionId);	
				$data['liked']=$this->cm->get_liked(['UserId'=>$this->ss->UserId,'CompetitionVideoId'=>$id]);
				/*echo "<pre>";
				print_r($data);
				die("hello");*/
				$this->load->view('header_user');
				$this->load->view('video_view_more_v',$data);
				$this->load->view('footer_user');
			}
			else
			{
				redirect('PageNotFound');
			}
			/*echo "<pre>";
			print_r($data);
			die("hello");*/
		}

		public function get_competition2($id)
		{
			$cid=[
				'c.CompetitionId'=>$id
			];
			$data=$this->cm->get_competition_m($cid);
			foreach ($data as $d)
			{
				$d->TotalLikes=$this->cm->get_total_videos($d->CompetitionId);
				$d->CompetitionCreatedDate=get_time_ago(strtotime($d->CompetitionCreatedDate));
				$d->TotalVideos=$this->cm->get_total_c_videos($d->CompetitionId);
				$s_time=intval(time()-strtotime($d->CompetitionStartDate));
				$e_time=intval(time()-strtotime($d->CompetitionEndDate));
				if($s_time >=0 && $e_time>0)
				{
					$d->CompetitionProgress='Ended';
					$d->Color="grey";
				}
				else if($s_time >0 && $e_time<=0)
				{
					$d->CompetitionProgress='In Progress';	
					$RemainingDays=intval((time()-strtotime($d->CompetitionEndDate))/(24*60*60));
					if($RemainingDays <=0 &&  $RemainingDays >-5)
						$d->Color='red';
					else if($RemainingDays <=-5 && $RemainingDays >-10)
						$d->Color='yellow';
					else
						$d->Color="grey";
				}
				else
				{
					$d->CompetitionProgress='Yet to start';	
					$RemainingDays=intval((time()-strtotime($d->CompetitionStartDate))/(24*60*60));
					$d->Color="grey";
				}
				if($d->CompetitionStatus==0)
				{
					$d->CompetitionStatus='Active';	
				}
				else if($d->CompetitionStatus==1)
				{
					$d->CompetitionStatus='Force Stopped';
				}
			}

			$cdata['competition_data']=$data;
/*			echo "<pre>";
			print_r($cdata);
			die('hello');*/
			return $cdata['competition_data'];
		}

		public function like_unlike_video($id)
		{
			$lid=[
				'CompetitionVideoId'=>$id,
				'UserId'=>$this->ss->UserId
			];
			$vid=[
				'CompetitionVideoId'=>$id
			];
			$op=$this->cm->get_liked($lid);
			if(count($op)==0)
			{
				$this->cm->like_video($lid);
				$like_data=$this->cm->get_liked($vid);
				?>
					<i class="fa fa-heart"></i>
				<?php
					echo count($like_data)." Likes";
			}

			else
			{
				$this->cm->unlike_video($lid);
				$like_data=$this->cm->get_liked($vid);
				?>
					<i class="fa fa-heart-o"></i>
				<?php
					echo count($like_data)." Likes";
			}
		}

		public function participated_competition()
		{
			$cid=[
				'cv.UserId'=>$this->ss->UserId
			];

			$data=$this->cm->participated_competition_m($cid);
			foreach ($data as $d)
			{
				$d->TotalLikes=$this->cm->get_total_videos($d->CompetitionId);
				$d->CompetitionCreatedDate=get_time_ago(strtotime($d->CompetitionCreatedDate));
				$d->TotalVideos=$this->cm->get_total_c_videos($d->CompetitionId);
				$s_time=intval(time()-strtotime($d->CompetitionStartDate));
				$e_time=intval(time()-strtotime($d->CompetitionEndDate));
				if($s_time >=0 && $e_time>0)
				{
					$d->CompetitionProgress='Ended';
					$d->Color="grey";
				}
				else if($s_time >0 && $e_time<=0)
				{
					$d->CompetitionProgress='In Progress';	
					$RemainingDays=intval((time()-strtotime($d->CompetitionEndDate))/(24*60*60));
					if($RemainingDays <=0 &&  $RemainingDays >-5)
						$d->Color='red';
					else if($RemainingDays <=-5 && $RemainingDays >-10)
						$d->Color='yellow';
					else
						$d->Color="grey";
				}
				else
				{
					$d->CompetitionProgress='Yet to start';	
					$RemainingDays=intval((time()-strtotime($d->CompetitionStartDate))/(24*60*60));
					$d->Color="grey";
				}
				if($d->CompetitionStatus==0)
				{
					$d->CompetitionStatus='Active';	
				}
				else if($d->CompetitionStatus==1)
				{
					$d->CompetitionStatus='Force Stopped';
				}
			}

			$cdata['competition_data']=$data;
			$this->load->view('header_user');
			$this->load->view('competition_all_v',$cdata);
			$this->load->view('footer_user');
		}

		public function upload_video_form($cid,$err=false)
		{
			$data['competition_data']=$this->get_competition2($cid);
			if(count($data['competition_data'])>0)
			{
				if($data['competition_data'][0]->CompetitionProgress=="Ended" || $data['competition_data'][0]->CompetitionProgress=="Yet to start")
				{
				?>
				<script type="text/javascript">
					alert("Video cannot be uploaded after the competition is over or not yet started..");
					document.location.href='<?=site_url("User/");?>';
				</script>
				<?php
				}
				else
				{
					if($err!=false)
					{
						$cdata['err']="Please Select a video to upload";
					}
					$cdata['cid']=$cid;
					$this->load->view('header_user');
					$this->load->view('upload_comp_video_v',$cdata);
					$this->load->view('footer_user');	
				}
			}
			else
			{
				redirect("PageNotFound/");
			}
		}

		public function add_video($cid)
		{
			$this->fv->set_rules('aVideoTitle','Title Field','trim|required');
			$this->fv->set_rules('NicEdit','Description Field','trim|required');
			$this->fv->set_error_delimiters('<div style="color:red">','</div>');
			if($this->fv->run()==FALSE)
			{
				$this->upload_video_form($cid);
			}
			else
			{
				if($_FILES['aRecipeVideo']['name'] !="")
				{
					$vdata=[
						'CompetitionVideoTitle'=>$this->input->post('aVideoTitle'),
						'CompetitionVideoDescription'=>$this->input->post('NicEdit'),
						'CompetitionId'=>$cid,
						'UserId'=>$this->ss->UserId
					];
					copy($_FILES['aRecipeVideo']['tmp_name'], "./resource/user/image/".$_FILES['aRecipeVideo']['name']) or die('cannot upload video');
					$vdata['VideoUrl']= $_FILES['aRecipeVideo']['name'];
					$this->cm->add_video_m($vdata);
					redirect('Competition_user/index/'.$cid);
				}
				else
				{
					$this->upload_video_form($cid,true);	
				}
			}
		}
	}
?>
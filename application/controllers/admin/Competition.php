<?php
	defined('BASEPATH') or die('error');
	class Competition extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Competition_m','cm');
			$this->load->helper('form');
			$this->load->helper('dataicon');
			$this->load->helper('createdtime');
			if(!$this->ss->AdminId)
				redirect('admin/Login');
		}

		public function index()
		{
			$this->ss->set_userdata('last_url_comp',site_url('admin/Competition/'));
			$this->load->view('admin/header');
			$this->load->view('admin/datatable_competition_v');
			$this->load->view('admin/footer');
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

			if($id==false)
			{
				echo json_encode(['aaData'=>$data]);
			}
			else
			{
				$cdata['competition_data']=$data;
				$cdata['competition_video_data']=$this->cm->get_videos_m($cid,$order);
				/*echo "<pre>";
				print_r($cdata['competition_video_data']);
				die('hello');*/
				$this->ss->set_userdata('last_url',site_url('admin/Competition/get_competition/'.$id.'/'.$order));
				$this->load->view('admin/header');
				$this->load->view('admin/competition_v',$cdata);
				$this->load->view('admin/footer');
			}
		}

		public function get_video_read_more($id)
		{
			$vid=[
				'CompetitionVideoId'=>$id
			];

			$data=$this->cm->get_video_read_more_m($vid);
			$this->ss->set_userdata('last_url_user',site_url('admin/Competition/get_video_read_more/').$id);

			/*echo "<pre>";
			print_r($data);
			die('hello');*/
			$this->load->view('admin/header');
			$this->load->view('admin/competition_video_view_more_v',$data);
			$this->load->view('admin/footer');
		}

		public function toggle_status($id)
		{
			$cid=[
				'CompetitionId'=>$id
			];
			$this->cm->toggle_status_m($cid);
			redirect('admin/Competition/get_competition/'.$id);
		}

		public function toggle_status_video($id,$id2=false)
		{
			$vid=[
				'CompetitionVideoId'=>$id
			];
			$this->cm->toggle_status_video_m($vid);
			if($id2==false)
			{
				redirect('admin/Competition/get_video_read_more/'.$id);
			}
			else
			{
				redirect('admin/Competition/get_competition/'.$id2);
			}
		}

		public function add_competition_vl()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/add_competition_v');
			$this->load->view('admin/footer');
		}

		public function declare_winner($id)
		{
			$cid=[
				'c.CompetitionId'=>$id
			];
			$data=$this->cm->get_competition_m($cid);
			if($data[0]->WinnerId==null)
			{
				echo $this->cm->competition_winner($id);
			}
			else
			{
				echo false;
			}
		}

		public function add_competition()
		{
			$this->fv->set_rules('aCompetitionTitle','Competition Title','trim|required|min_length[5]|max_length[20]|alpha_numeric');
			$this->fv->set_rules('aCompetitionStartDate','Start Date','required');
			$this->fv->set_rules('aCompetitionEndDate','End Date','required');
			$this->fv->set_rules('aCompetitionDescription','Competition Description','required|min_length[20]');
			if($this->fv->run()==FALSE)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/add_competition_v');
				$this->load->view('admin/footer');
			}
			else
			{
				$sdate=strtotime($this->input->post('aCompetitionStartDate'));
				$edate=strtotime($this->input->post('aCompetitionEndDate'));
				if(($sdate-$edate)>=0)
				{
					$data=[
						'error'=>"Start Date should be less than End Date"
					];
					/*echo "<pre>";
					print_r($data);
					die('hello');*/
					$this->load->view('admin/header');
					$this->load->view('admin/add_competition_v',$data);
					$this->load->view('admin/footer');
				}
				else
				{
					$c_data=[
						'CompetitionTitle'=>$this->input->post('aCompetitionTitle'),
						'CompetitionStartDate'=>date('Y-m-d',strtotime($this->input->post('aCompetitionStartDate'))),
						'CompetitionEndDate'=>date('Y-m-d',strtotime($this->input->post('aCompetitionEndDate'))),
						'CompetitionDescription'=>$this->input->post('aCompetitionDescription'),
						'AdminId'=>$this->ss->AdminId
					];
					$this->cm->add_competition_m($c_data);
					redirect('admin/Competition');
				}
			}
		}

		public function get_competition_to_update($id,$err=false)
		{
			$cid=[
				'CompetitionId'=>$id
			];
			if($err!=false)
			{
				$data=$err;
			}

			$data['c_data']=$this->cm->get_competition_to_update_m($cid);
			/*echo "<pre>";
			print_r($data);
			die('hello');*/

			$this->load->view('admin/header');
			$this->load->view('admin/update_competition_v',$data);
			$this->load->view('admin/footer');
		}

		public function update_competition($id)
		{
			$this->fv->set_rules('uCompetitionTitle','Competition Title','trim|required|min_length[5]|max_length[20]|alpha_numeric');
			$this->fv->set_rules('uCompetitionStartDate','Start Date','required');
			$this->fv->set_rules('uCompetitionEndDate','End Date','required');
			$this->fv->set_rules('uCompetitionDescription','Competition Description','required|min_length[20]');
			if($this->fv->run()==FALSE)
			{
				$this->get_competition_to_update($id);
			}
			else
			{
				$sdate=strtotime($this->input->post('uCompetitionStartDate'));
				$edate=strtotime($this->input->post('uCompetitionEndDate'));
				if(($sdate-$edate)>=0)
				{
					$data=[
						'error'=>"Start Date should be less than End Date"
					];
					/*echo "<pre>";
					print_r($data);
					die('hello');*/
					/*$this->load->view('admin/header');
					$this->load->view('admin/add_competition_v',$data);
					$this->load->view('admin/footer');*/
					$this->get_competition_to_update($id,$data);
				}
				else
				{
					$c_data_new=[
						'CompetitionTitle'=>$this->input->post('uCompetitionTitle'),
						'CompetitionStartDate'=>date('Y-m-d',strtotime($this->input->post('uCompetitionStartDate'))),
						'CompetitionEndDate'=>date('Y-m-d',strtotime($this->input->post('uCompetitionEndDate'))),
						'CompetitionDescription'=>$this->input->post('uCompetitionDescription'),
						'AdminId'=>$this->ss->AdminId
					];
					$c_data_old=[
						'CompetitionId'=>$id
					];
					$this->cm->update_competition_m($c_data_old,$c_data_new);
					redirect('admin/Competition/get_competition/'.$id);
				}
			}
		}
	}
?>
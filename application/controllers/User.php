<?php
	defined('BASEPATH') or die("ERROR");

	class User extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('User_m','um');
			$this->load->model('Competition_user_m','cm');
			$this->load->helper('createdtime');
			if(!$this->ss->UserId)	
				redirect('Login_user');
		}

		public function index()
		{
			$data=$this->get_competition();
			for($i=0,$j=0;$i<count($data['competition_data']);$i++)
			{
				if($data['competition_data'][$i]->CompetitionProgress!="Ended")
				{
					$cdata['competition_data'][$j]=$data['competition_data'][$i];
					$j++;
				}
			}
			/*echo "<pre>";
			print_r($cdata);
			die("hello");*/
			$this->load->view('header_user');
			$this->load->view('Home_user_v',$cdata);
			$this->load->view('footer_user');
		}

		public function get_user()
		{
			$where_user=$this->input->post('sUserName');
			$where_uemail=$this->input->post('sUserEmail');
			$st=$this->input->post('sStateId');
			if($st==-1 or $st==null)
			{
				$where_city=null;
			}
			else
			{
				$ct=$this->input->post('citychk');
				if($ct==null)
				{
					$wc=$this->um->get_city_m(['StateId'=>$st]);
					for($i=0;$i<count($wc);$i++)
					{
						$where_city[$i]=$wc[$i]->CityId;
					}
				}
				else
				{
					$where_city=$ct;
				}
			}

			$data['users']=$this->um->get_user_m($where_user,$where_uemail,$where_city);
			$data['states']=$this->um->get_state_m();
			$this->load->view('header_user');
			$this->load->view('user_all',$data);
			$this->load->view('footer_user');	
		}

		public function get_city($id)
		{
			$sid=[
				'StateId'=>$id
			];

			$cities=$this->um->get_city_m($sid);
			if(count($cities)>0)
			{
?>
					<div class="dropdown">
		              <button class=" dropdown-toggle form-control" style="background:none;border:none;outline: none;border-bottom:1px solid #9e9e9e;text-align: left;" data-toggle="dropdown" type="button">
		                Select a City
		                <div class="caret"></div>
		              </button>
		              <ul class="dropdown-menu col-md-12">
<?php
				foreach($cities as $c)
				{
?>
		                <li><a href="#" data-value="<?=$c->CityId?>" tabIndex="-1"><input style="height:auto!important;width:auto!important" type="checkbox" value="<?=$c->CityId?>" name="citychk[]"/><?=$c->CityName?></a></li>
<?php
				}
?>
		              </ul>
			        </div>
<?php		
			}	
		}

		public function report_user($id)
		{
			if($this->input->post('aReason')!="")
			{
				$rid=[
					'UserId'=>$this->ss->UserId,
					'ReportedUserId'=>$id,
					'Reason'=>$this->input->post('aReason')
				];
				$this->um->report_user_m($rid);
			}
			redirect('Profile/index/'.$id);
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
					$d->RemainingDays=null;
					$d->Color="grey";
				}
				else if($s_time >0 && $e_time<=0)
				{
					$d->CompetitionProgress='In Progress';	
					$d->RemainingDays=intval((time()-strtotime($d->CompetitionEndDate))/(24*60*60));
					if($d->RemainingDays <=0 &&  $d->RemainingDays >-5)
						$d->Color='red';
					else if($d->RemainingDays <=-5 && $d->RemainingDays >-10)
						$d->Color='yellow';
					else
						$d->Color="grey";
				}
				else
				{
					$d->CompetitionProgress='Yet to start';	
					$d->RemainingDays=intval((time()-strtotime($d->CompetitionStartDate))/(24*60*60));
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
			/*$cdata['competition_video_data']=$this->cm->get_videos_m($cid,$order);*/
			/*echo "<pre>";
			print_r($cdata['competition_video_data']);
			die('hello');*/
/*			$this->ss->set_userdata('last_url',site_url('admin/Competition/get_competition/'.$id.'/'.$order));
			$this->load->view('admin/header');
			$this->load->view('admin/competition_v',$cdata);
			$this->load->view('admin/footer');*/

			return $cdata;
		}
	}
?>
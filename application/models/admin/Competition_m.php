<?php
	class Competition_m extends CI_Model
	{
		public function get_competition_m($cid=false)
		{
			if($cid['c.CompetitionId']!=false)
				$this->db->where($cid);
			return $this->db
				->select('c.*,a.AdminName')
				->from('tblcompetition c')
				->join('tbladmin a','a.AdminId=c.AdminId')
				->get()
				->result();
		}

		public function get_competition_to_update_m($cid)
		{
			return $this->db->where($cid)
							->get('tblcompetition')
							->result();
		}

		public function get_total_videos($cid)
		{
			$comp_id=[
				'cv.CompetitionId'=>$cid
			];
			$data= $this->db
						->select('*')
						->from('tblcompetitionlike cl')
						->join('tblcompetitionvideo cv','cv.CompetitionVideoId=cl.CompetitionVideoId')
						->where($comp_id)
						->get()
						->result();
						return count($data);
		}

		public function get_total_c_videos($cid)
		{
			$comp_id=[
				'cv.CompetitionId'=>$cid
			];
			$data= $this->db
						->select('*')
						->from('tblcompetitionvideo cv')
						->where($comp_id)
						->get()
						->result();
						return count($data);
		}

		public function get_videos_m($cid,$order=false)
		{
				if($order==1)
					$this->db->order_by('CompetitionVideoCreatedDate','desc');
				if($order==2)
					$this->db->order_by('TotalLikes','desc');
				if($order==3)
					$this->db->order_by('CompetitionVideoCreatedDate','asc');
			return $this->db
						->select('c.*,u.*,count(cl.CompetitionLikeId) as TotalLikes')
						->from('tblcompetitionvideo c')
						->join('tbluser u','c.UserId=u.UserId')
						->join('tblcompetitionlike cl','c.CompetitionVideoId=cl.CompetitionVideoId','left')
						->where($cid)
						->group_by('cl.CompetitionVideoId')
						->get()
						->result();
		}

		public function get_video_read_more_m($vid)
		{
			$data['video_data']=$this->db
									->select('*')
									->from('tbluser u')
									->join('tblcompetitionvideo cv','cv.UserId=u.UserId')
									->where($vid)
									->get()
									->result();

			$data['like_data']=$this->db
									->select('*')
									->from('tbluser u')
									->join('tblcompetitionlike cl','cl.UserId=u.UserId')
									->where($vid)
									->get()
									->result();
			return $data;
		}

		public function toggle_status_video_m($vid)
		{
			$this->db->set('CompetitionVideoStatus','CompetitionVideoStatus XOR 1',false)
					->where($vid)
					->update('tblcompetitionvideo');
		}

		public function add_competition_m($c_data)
		{
			$this->db->insert('tblcompetition',$c_data);
		}

		public function toggle_status_m($cid)
		{
			$this->db->set('CompetitionStatus','CompetitionStatus XOR 1',false)
					->where($cid)
					->update('tblcompetition');
		}

		public function update_competition_m($c_data_old,$c_data_new)
		{
			$this->db->set($c_data_new)
					->where($c_data_old)
					->update('tblcompetition');
		}

		public function competition_winner($id)
		{
			$whereid=[
				'c.CompetitionId'=>$id,
				'cv.CompetitionVideoStatus'=>0
			];
			$vdata=$this->db->select('cv.CompetitionVideoId,cv.UserId,cv.CompetitionId')
					->from('tblcompetitionvideo cv')
					->join('tblcompetition c','cv.CompetitionId=c.CompetitionId')
					->where($whereid)
					->get()
					->result();

			$lvid=[
				'cv.CompetitionId'=>$id,
				'cv.CompetitionVideoStatus'=>0
			];
			$lvdata=$this->db->select('count(cl.CompetitionVideoId) as CLVID,cv.CompetitionId,u.UserId')
							->from('tblcompetitionlike cl')
							->join('tblcompetitionvideo cv','cv.CompetitionVideoId=cl.CompetitionVideoId')
							->join('tbluser u','u.UserId=cv.UserId')
							->where($lvid)
							->group_by('cl.CompetitionVideoId')
							->order_by('CLVID','desc')
							->get()
							->result();
			if(count($lvdata)>0)
			{
				$odata=[
					'CompetitionId'=>$lvdata[0]->CompetitionId
				];

				$ndata=[
					'WinnerId'=>$lvdata[0]->UserId
				];

				$this->db->set($ndata)
						->where($odata)
						->update('tblcompetition');
			}
			return true;
		}
	}
?>
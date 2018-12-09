<?php
	class Competition_user_m extends CI_Model
	{
		public function get_competition_m($cid=false)
		{
			$data['c.CompetitionStatus']=0;
			if($cid['c.CompetitionId']!=false)
				$this->db->where($cid);
			return $this->db
				->select('c.*')
				->from('tblcompetition c')
				->where($data)
				->get()
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

		public function get_liked($lid)
		{
			return $this->db->where($lid)
							->get('tblcompetitionlike')
							->result();
		}

		public function like_video($lid)
		{
			$this->db->insert('tblcompetitionlike',$lid);
		}

		public function unlike_video($lid)
		{
			$this->db->where($lid)
					->delete('tblcompetitionlike');
		}

		public function participated_competition_m($cid)
		{
			return $this->db->select('c.*')
							->from('tblcompetition c')
							->join('tblcompetitionvideo cv','c.CompetitionId=cv.CompetitionId')
							->where($cid)
							->get()
							->result();
		}

		public function add_video_m($vdata)
		{
			$this->db->insert('tblcompetitionvideo',$vdata);
		}

		public function get_winner_user($id)
		{
			return $this->db->select('*')
							->from('tbluser u')
							->where($id)
							->get()
							->result();
		}
	}
?>
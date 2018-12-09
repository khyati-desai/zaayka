<?php
	/**
	* 
	*/
	class Playlist_m extends CI_Model
	{
		public function get_playlist_recipes_m($pid)
		{
			$data['playlist_data']=$this->db
						->select('p2.*')
						->from('tblplaylist p2')
						->where($pid)
						->get()
						->result();

			$data['playlistpost_data']=$this->db
						->select('p2.*,r.*')
						->from('tblplaylist p1')
						->join('tblplaylistpost p2','p1.PlaylistId=p2.PlaylistId')
						->join('tblrecipe r','p2.RecipeId=r.RecipeId')
						->where($pid)
						->get()
						->result();

			return $data;
		}

		public function get_playlist_m()
		{
			return $this->db
						->select('p1.*,count(p2.PlaylistId) as tot_recipes,u.UserName')
						->from('tblplaylist p1')
						->join('tblplaylistpost p2','p1.PlaylistId=p2.PlaylistId','left')
						->join('tbluser u','p1.UserId=u.UserId')
						->group_by('p2.PlaylistId')
						->get()
						->result();
		}

		public function toggle_status_m($aid)
		{
			$this->db->set('PlaylistStatus','PlaylistStatus XOR 1',false)
				->where($aid)
				->update('tblplaylist');		
		}
	}
?>
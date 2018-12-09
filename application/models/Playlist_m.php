<?php
	/**
	* 
	*/
	class Playlist_m extends CI_Model
	{
		public function get_playlist_m($id)
		{
			return $this->db->where($id)
							->get('tblplaylist')
							->result();
		}

		public function dlt_playlist_m($id)
		{
			$this->db->where($id)
					->delete('tblplaylistpost');

			$this->db->where($id)
					->delete('tblplaylist');
		}

		public function display_playlist_recipes_m($id)
		{
			return $this->db->select('pp.*,r.*')
							->from('tblplaylistpost pp')
							->join('tblplaylist p','p.PlaylistId=pp.PlaylistId')
							->join('tblrecipe r','r.RecipeId=pp.RecipeId')
							->where($id)
							->get()
							->result();
		}

		public function dlt_playlist_recipe_m($id)
		{
			$this->db->where($id)
					->delete('tblplaylistpost');
		}
	}
?>
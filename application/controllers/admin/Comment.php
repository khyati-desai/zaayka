<?php
	defined('BASEPATH') or exit('error');

	class Comment extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/Comment_m','cm');
			$this->load->helper('dataicon');
		}

		public function index($id)
		{
			if($id==1)
			{
				$this->load->view('admin/header');
				$this->load->view('admin/datatable_comment_recipe_v');
				$this->load->view('admin/footer');
				$this->ss->set_userdata('last_url_user',site_url('admin/Comment/index/').$id);
				$this->ss->last_url=null;
			}
			else
			{
				$this->load->view('admin/header');
				$this->load->view('admin/datatable_comment_article_v');
				$this->load->view('admin/footer');
				$this->ss->set_userdata('last_url_user',site_url('admin/Comment/index/').$id);
			}
		}

		public function toggle_status_comment($id,$status_c)
		{
			$cid=[
				'RecipeCommentId'=>$id
			];

			$this->cm->toggle_status_recipe_comment_m($cid);
			if($status_c==0)
			{
			?>
				<i class="fa fa-toggle-off" onclick="toggle_c(<?=$id?>,1)" style="font-size:2.5rem; color: #a6acaf; float: right;position: relative"></i>
			<?php
			}
			else
			{
			?>
				<i class="fa fa-toggle-on" onclick="toggle_c(<?=$id?>,0)" style="font-size:2.5rem; color: #3498db; float: right;position: relative"></i>
			<?php
			}
		}

		public function toggle_status_article_comment($id,$status_c)
		{
			$cid=[
				'ArticleCommentId'=>$id
			];

			$this->cm->toggle_status_article_comment_m($cid);
			if($status_c==0)
			{
			?>
				<i class="fa fa-toggle-off" onclick="toggle_c(<?=$id?>,1)" style="font-size:2.5rem; color: #a6acaf; float: right;position: relative"></i>
			<?php
			}
			else
			{
			?>
				<i class="fa fa-toggle-on" onclick="toggle_c(<?=$id?>,0)" style="font-size:2.5rem; color: #3498db; float: right;position: relative"></i>
			<?php
			}
		}

		public function get_comment_recipe()
		{
			$comment_recipe_data=$this->cm->get_comment_recipe_m();
			echo json_encode(['aaData'=>$comment_recipe_data]);
		}

		public function get_comment_article()
		{
			$comment_article_data=$this->cm->get_comment_article_m();
			echo json_encode(['aaData'=>$comment_article_data]);
		}

		public function toggle_status_recipe_comment_2($id)
		{
			$cid=[
				'RecipeCommentId'=>$id
			];
			$this->cm->toggle_status_recipe_comment_m($cid);
		}
    
		public function toggle_status_article_comment_2($id)
		{
			$aid=[
				'ArticleCommentId'=>$id
			];
			$this->cm->toggle_status_article_comment_m($aid);
		}
	}
?>
<?php
	defined('BASEPATH') or die('error');

	/**
	* 
	*/
	class Article_user extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Article_m','am');
			$this->load->helper('form');
			$this->load->helper('createdtime');
			if(!$this->ss->UserId)
				{
					redirect('Login_user');
				}
			$set['upload_path']='./resource/user/image/';
			$set['allowed_types']='jpg|png|gif';
			// $set['encrypt_name']=TRUE;
			$this->load->library('upload',$set,'up');
		}

		public function index($id)
		{
			$aid=[
				'a.ArticleId'=>$id
			];

			$auid=[
				'a.UserId'=>$this->ss->UserId,
				'a.ArticleId'=>$id
			];

			//	$data['user_id']=$this->ss->UserId;	
			
			// die($this->ss->UserId);
			$data['article_data']=$this->am->get_article_m($aid);
			$data['article_comment']=$this->am->get_article_comment_m($aid);
			$data['article_like']=$this->am->get_article_like_m($aid);
			$data['article_report']=$this->am->get_article_report_m($aid);
			$data['my_like']=$this->am->get_my_like_m($auid);
			$data['likes']=$this->am->count_likes_on_article($aid);

			if (count($data['my_like'])>0) {
				//data Exists
				// $this->ss->set_userdata('flag',1);
				$data['flag']=1;
			}
			else
			{
				//DNE
				// $this->ss->set_userdata('flag',0);
				$data['flag']=0;
			}
			// echo "<pre>";
			// print_r($data['article_data']);
			// die('abc');
			$this->am->increase_view_m($id);
			$this->load->view('header_user');
			$this->load->view('article_read_more_u_v',$data);
			$this->load->view('footer_user');
		}

		public function like_modal_update($aid)
		{
			$art_id=[
				'a.ArticleId'=>$aid
			];
			$likes=$this->am->count_likes_on_article($art_id);
			$article_like=$this->am->get_article_like_m($art_id);

		?>
			<!-- Like Moda code -->
					<div class="modal-content" style="height: 55rem;overflow: hidden;overflow-y:scroll;">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3 class="modal-title">Liked By 
								<?=$likes;?>
							People</h4>
						</div>
						<div class="modal-body">
							<?php
								if ($likes>0) {
							?>

							<table id="like_table">
								<thead>
									<tr>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($article_like as $l) {
										?>
										<tr>
											<th>
												<div class="row">
													<div class="col-md-5"><img src="<?=base_url('/resource/user/image/'),$l->UserImage;?>" height="50rem" width="50rem" style="border-radius:50%;margin-bottom: 2rem;">
													</div>
													<div class="col-md-2" style="font-size: 3rem;font-family:'Amatic SC', cursive;">
														<a href="<?=site_url('/Profile/index/'),$l->UserId;?>"><?=$l->UserName?></a>
													</div>
												</div>
											</th>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
							<?php
								}
							?>
						</div>
					</div>
				
					<script type="text/javascript">
					  $(document).ready( function () {
					      $('#like_table').DataTable({
					        responsive:true
					      });
					  });
					</script>
			<!-- Like Modal code end -->
		<?php
		}


		public function toggle_like($aid,$uid,$f)
		{
			$data=[
				'ArticleId'=>$aid,
				'UserId'=>$uid
			];
			
			$art_id=[
				'a.ArticleId'=>$aid
			];

			if ($f==1) 
			{
				$this->am->toggle_like_exist($data);
				$f=0;
			}
			else
			{
				$this->am->toggle_like_dne($data);	
				$f=1;
			}

			$likes=$this->am->count_likes_on_article($art_id);

			if($f==0)
			{
				?>
					<i class="fa fa-heart-o" onclick="toggle_l(<?=$aid?>,<?=$uid?>,<?=$f?>)" style="color:#EB581D;"></i>
					<span style="color: #9d9d9d;"><?=$likes;?></span>
				<?php
			}
			else
			{
				?>
					<i class="fa fa-heart" onclick="toggle_l(<?=$aid?>,<?=$uid?>,<?=$f?>)" style="color:#EB581D;"></i>
					<span style="color: #9d9d9d;"><?=$likes;?></span>
				<?php
			}
		}


		public function comment_insert($id)
		{
				$data_comment=[
					'ArticleComment'=>$this->input->post('TArea'),
					'UserId'=>$this->ss->UserId,
					'ArticleId'=>$id
				];

				$this->am->comment_insert_m($data_comment);	
				$data['article_comment']=$this->am->get_article_comment_m($id);
				redirect('/Article_user/index/'.$id);
		}

		public function delete_comment($cid,$aid)
		{
			$old_data=[
				'ArticleId'=>$aid,
				'ArticleCommentId'=>$cid
			];
			$new_data=[
				'ArticleCommentStatus'=>-1//for delete status=-1
			];
			$this->am->delete_comment_m($old_data,$new_data);
			redirect('/Article_user/index/'.$aid);
		}

		public function add_report($aid)
		{
			$data_report=[
				'ArticleId'=>$aid,
				'UserId'=>$this->ss->UserId
			];

			if ($_POST['txt_report']=='') {
				$data_report['Reason']=$this->input->post('rep');
			}
			else{
				$data_report['Reason']=$this->input->post('txt_report');
			}
			$this->am->add_report_m($data_report);
			redirect('/Article_user/index/'.$aid);
		}


		//upload article
		public function upload_article()
		{
			$this->load->view('header_user');
			$this->load->view('upload_article_v');
			$this->load->view('footer_user');
		}


		function add_article()
		{
			$data=[
				'ArticleTitle'=>$this->input->post('aArticleTitle'),
				//'SubcategoryId'=>$this->input->post('aSubCategoryId'),
				'ArticleDescription'=>$this->input->post('NicEdit'),
				'UserId'=>$this->ss->UserId
			];

			if($this->up->do_upload('aArticleImage'))
			{
				$id=$this->up->data();
				$data['FeaturedImage']=$id['file_name'];
			}

			$this->am->add_article_m($data);
			redirect('/Profile/');
		}

		public function get_subcategory_upload($id)
		{
			$subcat=$this->am->get_subcategory_upload_m($id);

			foreach($subcat as $sub)
			{
			?>
				<option value="<?=$sub->SubcategoryId?>"><?=$sub->SubCategoryName?></option>
			<?php
			}
		}

		public function delete_article($id)
		{
			$odata=[
				'ArticleId'=>$id
			];
			
			$ndata=[
				'ArticleStatus'=>-1
			];

			$this->am->delete_article_m($odata,$ndata);
		}

		public function get_article_info($id)
		{
			$aid=[
				'ArticleId'=>$id
			];
			$data['article_data']=$this->am->get_article_info_m($aid);
			$this->ss->set_userdata('last_url',site_url('Article_user/index/'.$id));
			$this->load->view('header_user');
			$this->load->view('update_article_v',$data);
			$this->load->view('footer_user');
		}
		public function update_article($id)
		{
			$odata=[
				'ArticleId'=>$id
			];
			$ndata=[
				'ArticleTitle'=>$this->input->post('aArticleTitle'),
				'ArticleDescription'=>$this->input->post('NicEdit'),
			];
			if($this->up->do_upload('aArticleImage'))
			{
				$id=$this->up->data();
				$ndata['FeaturedImage']=$id['file_name'];
			}

			$this->am->update_article_m($ndata,$odata);
			redirect('/Profile/');
		}

		public function display_article()
		{
			$where_title=$this->input->post('sArticleTitle');
			$where_user=$this->input->post('sUserName');
			$data['articles']=$this->am->display_article_m($where_title,$where_user);
			/*echo "<pre>";
			print_r($data['recipes']);
			die('hello');*/
			$this->load->view('header_user');
			$this->load->view('article_all_v',$data);
			$this->load->view('footer_user');
		}
	}
?>
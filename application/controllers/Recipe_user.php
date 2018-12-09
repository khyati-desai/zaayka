<?php
	defined('BASEPATH') or die('error');

	class Recipe_user extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Recipe_m','rm');
			$this->load->helper('form');
			$this->load->helper('createdtime');
			if(!$this->ss->UserId)
				{
					redirect('Login_user');
				}
			$set['upload_path']='./resource/user/image/';
			$set['allowed_types']='jpg|png|gif|mp4';
			// $set['encrypt_name']=TRUE;
			$this->load->library('upload',$set,'up');
		}

		public function index($id)
		{
			$rid=[
				'r.RecipeId'=>$id
			];
			
			$ruid=[
				'r.UserId'=>$this->ss->UserId,
				'r.RecipeId'=>$id
			];

			$uid=[
				'UserId'=>$this->ss->UserId,
				'PlaylistStatus'=>0
			];

			$idata=[
				'UserId'=>$this->ss->UserId,
				'RecipeId'=>$id	
			];
			/*	$data['user_id']=$this->ss->UserId;	*/
			// die($this->ss->UserId);
			$data['recipe_data']=$this->rm->get_recipe_m($rid);
			$data['recipe_comment']=$this->rm->get_recipe_comment_m($rid);
			$data['recipe_like']=$this->rm->get_recipe_like_m($rid);
			$data['recipe_rate']=$this->rm->get_recipe_rate_m($rid);
			$data['recipe_view']=$this->rm->get_recipe_view_m($rid);
			$data['recipe_report']=$this->rm->get_recipe_report_m($ruid);
			$data['my_like']=$this->rm->get_my_like_m($ruid);
			$data['likes']=$this->rm->count_likes_on_recipe($rid);
			$data['saved']=$this->rm->get_saved2($ruid);
			$data['playlist_data']=$this->rm->get_playlist($uid);

			//$this->ss->set_userdata('UserImage',$data['recipe_data'][0]->UserImage);
			/*$this->ss->set_userdata('last_url',site_url('Profile/index/'.$uid));*/

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
			/*echo "<pre>";
			print_r($data);
			die('abc');*/
			if(count($data['recipe_data'])>0)
			{
				$this->rm->add_to_history_m($idata);
				$this->rm->add_to_view_m($idata);
				$this->load->view('header_user');
				$this->load->view('recipe_read_more_u_v',$data);
				$this->load->view('footer_user');
			}
			else
			{
				redirect('PageNotFound/');
			}
		}

		public function like_modal_update($rid)
		{
			$recp_id=[
				'r.RecipeId'=>$rid
			];
			$likes=$this->rm->count_likes_on_recipe($recp_id);
			$recipe_like=$this->rm->get_recipe_like_m($recp_id);

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
							<table id="like_table">
								<thead>
									<tr>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($recipe_like as $l) {
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

		public function toggle_like($rid,$uid,$f)
		{
			$data=[
				'RecipeId'=>$rid,
				'UserId'=>$uid
			];
			
			$recp_id=[
				'r.RecipeId'=>$rid
			];

			if ($f==1) 
			{
				$this->rm->toggle_like_exist($data);
				$f=0;
			}
			else
			{
				$this->rm->toggle_like_dne($data);	
				$f=1;
			}

			$likes=$this->rm->count_likes_on_recipe($recp_id);

			if($f==0)
			{
				?>
					<i class="fa fa-heart-o" onclick="toggle_l(<?=$rid?>,<?=$uid?>,<?=$f?>)" style="color:#EB581D;"></i>
					<span style="color: #9d9d9d;"><?=$likes;?></span>
				<?php
			}
			else
			{
				?>
					<i class="fa fa-heart" onclick="toggle_l(<?=$rid?>,<?=$uid?>,<?=$f?>)" style="color:#EB581D;"></i>
					<span style="color: #9d9d9d;"><?=$likes;?></span>
				<?php
			}
		}

		public function comment_insert($id)
		{
				$data_comment=[
					'Comment'=>$this->input->post('TArea'),
					'UserId'=>$this->ss->UserId,
					'RecipeId'=>$id
				];

				$this->rm->comment_insert_m($data_comment);	
				$data['recipe_comment']=$this->rm->get_recipe_comment_m($id);
				redirect('/Recipe_user/index/'.$id);
		}

		public function add_rate($rate,$rid)
		{
			$data_rate=[
				'RecipeId'=>$rid,
				'Rate'=>$rate,
				'UserId'=>$this->ss->UserId
			];
			$this->rm->add_rate_m($data_rate);
			redirect('/Recipe_user/index/'.$rid);
		}

		public function delete_comment($cid,$rid)
		{
			$old_data=[
				'RecipeId'=>$rid,
				'RecipeCommentId'=>$cid
			];
			$new_data=[
				'CommentStatus'=>-1//for delete status=-1
			];
			$this->rm->delete_comment_m($old_data,$new_data);
			redirect('/Recipe_user/index/'.$rid);
		}

		public function add_report($rid)
		{
			$data_report=[
				'RecipeId'=>$rid,
				'UserId'=>$this->ss->UserId
			];

			if ($_POST['txt_report']=='') {
				$data_report['Reason']=$this->input->post('rep');
			}
			else{
				$data_report['Reason']=$this->input->post('txt_report');
			}
			$this->rm->add_report_m($data_report);
			redirect('/Recipe_user/index/'.$rid);
		}

		//upload recipe
		public function upload_recipe()
		{
			$data['cat']=$this->rm->get_category_upload1_m();
			$data['subcat']=$this->rm->get_subcategory_upload_m($data['cat'][0]->CategoryId);

			$this->load->view('header_user');
			$this->load->view('upload_recipe_v',$data);
			$this->load->view('footer_user');
		}

		function add_recipe()
		{
			$data=[
				'RecipeTitle'=>$this->input->post('aRecipeTitle'),
				'SubcategoryId'=>$this->input->post('aSubCategoryId'),
				'RecipeDescription'=>$this->input->post('NicEdit'),
				'AverageTime'=>$this->input->post('aRecipeTime'),
				//'VideoUrl'=>$this->input->post('aRecipeVideo'),
				'UserId'=>$this->ss->UserId
			];
			if($this->up->do_upload('aRecipeImage'))
			{
				$id=$this->up->data();
				$data['RecipeImage']=$id['file_name'];
			}

			if($_FILES['aRecipeVideo']['name'] !="")
			{
				copy($_FILES['aRecipeVideo']['tmp_name'], "./resource/user/image/".$_FILES['aRecipeVideo']['name']) or die('cannot upload video');
				$data['VideoUrl']= $_FILES['aRecipeVideo']['name'];
			}

			$this->rm->add_recipe_m($data);
			redirect('/Profile/');
		}

		public function get_subcategory_upload($id)
		{
			$subcat=$this->rm->get_subcategory_upload_m($id);

			foreach($subcat as $sub)
			{
			?>
				<option value="<?=$sub->SubcategoryId?>"><?=$sub->SubCategoryName?></option>
			<?php
			}
		}

		public function delete_recipe($id)
		{
			$odata=[
				'RecipeId'=>$id
			];
			
			$ndata=[
				'RecipeStatus'=>-1
			];

			$this->rm->delete_recipe_m($odata,$ndata);
		}

		//delete recipe from read more without ajax
		public function delete_recipe_read_more($id)
		{
			$odata=[
				'RecipeId'=>$id
			];
			
			$ndata=[
				'RecipeStatus'=>-1
			];

			$this->rm->delete_recipe_m($odata,$ndata);
			redirect('Profile/index');
		}

		public function get_recipe_info($id)
		{
			$rid=[
				'RecipeId'=>$id
			];
			$data['recipe_data']=$this->rm->get_recipe_info_m($rid);
			$c=$data['recipe_data'][0]->CategoryId;
			$cat=[
				'CategoryId'=>$c
			];

			// get_category_m($cat);
			$data['sub_cats']=$this->rm->get_category_upload_m($cat);
			$data['cat']=$this->rm->get_category_m();
			$data['subcat']=$this->rm->get_subcategory_upload_m($data['sub_cats'][0]->CategoryId);

			// echo "<pre>";
			// print_r($data);
			// die();

			$this->load->view('header_user');
			$this->load->view('update_recipe_v',$data);
			$this->load->view('footer_user');
		}

		public function update_recipe($id)
		{
			$odata=[
				'RecipeId'=>$id
			];
			$ndata=[
				'RecipeTitle'=>$this->input->post('aRecipeTitle'),
				'RecipeDescription'=>$this->input->post('NicEdit'),
				'SubcategoryId'=>$this->input->post('aSubCategoryId'),
				'AverageTime'=>$this->input->post('aRecipeTime')
			];
			if($this->up->do_upload('aRecipeImage'))
			{
				$id=$this->up->data();
				$ndata['RecipeImage']=$id['file_name'];
			}


			$this->rm->update_recipe_m($ndata,$odata);
			redirect('/Profile/');
			// echo "<pre>";
			// print_r($ndata);
			// die();

		}

		public function display_recipe()
		{
			$where_title=$this->input->post('sRecipeTitle');
			$where_user=$this->input->post('sUserName');
			$where_min=$this->input->post('sMinTime');
			$where_max=$this->input->post('sMaxTime');
			$cat=$this->input->post('sCategoryId');
			/*echo $cat;
			die('hello');*/
			if($cat==-1)
				$where_sub=null;
			else
				$where_sub=$this->input->post('subcatchk');

			/*echo "<pre>";
			print_r($sub);
			die('hello');*/
			$data['recipes']=$this->rm->display_recipe_m($where_title,$where_user,$where_min,$where_max,$where_sub);
			$data['categories']=$this->rm->get_category_m();

			foreach($data['recipes'] as $r)
			{
				$save_data=$this->rm->get_saved(['UserId'=>$this->ss->UserId,'RecipeId'=>$r->RecipeId]);
				if(count($save_data)==0)
				{
					$r->Count=0;
				}
				else
				{
					$r->Count=1;
				}
			}
			/*echo "<pre>";
			print_r($data['recipes']);
			die('hello');*/
			$this->load->view('header_user');
			$this->load->view('recipe_all_v',$data);
			$this->load->view('footer_user');
		}

		public function display_recipe_follow()
		{
			$uid=[
				'FollowerId'=>$this->ss->UserId
			];
			$where_title=$this->input->post('sRecipeTitle');
			$where_user=$this->input->post('sUserName');
			$where_min=$this->input->post('sMinTime');
			$where_max=$this->input->post('sMaxTime');
			$cat=$this->input->post('sCategoryid');
			if($cat==-1)
				$where_sub=null;
			else
				$where_sub=$this->input->post('subcatchk');

			$data['recipes']=$this->rm->display_recipe_follow_m($uid,$where_title,$where_user,$where_min,$where_max,$where_sub);
			/*echo "<pre>";
			print_r($data['recipes']);
			die('hello');*/
			foreach($data['recipes'] as $r)
			{
				$save_data=$this->rm->get_saved(['UserId'=>$this->ss->UserId,'RecipeId'=>$r->RecipeId]);
				if(count($save_data)==0)
				{
					$r->Count=0;
				}
				else
				{
					$r->Count=1;
				}
			}
			$this->load->view('header_user');
			$this->load->view('recipe_all_v',$data);
			$this->load->view('footer_user');
		}

		public function get_subcategory($id)
		{
			$cid=[
				'CategoryId'=>$id
			];

			$subcat=$this->rm->get_subcategory_m($cid);
			if(count($subcat)>0)
			{
?>
					<div class="dropdown">
		              <button class=" dropdown-toggle form-control" style="background:none;border:none;outline: none;border-bottom:1px solid #9e9e9e;text-align: left;" data-toggle="dropdown" type="button">
		                Select a Subcategory
		                <div class="caret"></div>
		              </button>
		              <ul class="dropdown-menu col-md-12">
<?php
				foreach($subcat as $s)
				{
?>
		                <li><a href="#" data-value="<?=$s->SubcategoryId?>" tabIndex="-1"><input style="height:auto!important;width:auto!important" type="checkbox" value="<?=$s->SubcategoryId?>" name="subcatchk[]"/><?=$s->SubCategoryName?></a></li>
<?php
				}
?>
		              </ul>
			        </div>
<?php		
			}	
		}

		public function save_recipe($id)
		{
			$uid=$this->ss->UserId;
			$op=$this->rm->get_saved(['UserId'=>$uid,'RecipeId'=>$id]);
			if(count($op)==0)
			{
				$this->rm->add_save(['UserId'=>$uid,'RecipeId'=>$id]);
				echo '<button class="saved-btn btn" title="Remove from Saved" id="'.$id.'" style="outline: none;">
                    <span class="fa fa-bookmark"></span>
                  </button>';
			}

			else
			{
				$this->rm->del_save(['UserId'=>$uid,'RecipeId'=>$id]);
				echo '<button class="save-btn btn" title="Save" id="'.$id.'" style="outline: none;">
                    <span class="fa fa-bookmark"></span>
                  </button>';
			}
		}

		public function saved_recipe_display()
		{
			$data['recipes']=$this->rm->display_recipe_saved_m();
			//$data['categories']=$this->rm->get_category_m();
			/*echo "<pre>";
			print_r($data['recipes']);
			die('hello');*/
			$this->load->view('header_user');
			$this->load->view('saved_recipes_all',$data);
			$this->load->view('footer_user');			
		}

		public function save_unsave($id)
		{
			$uid=$this->ss->UserId;
			$id=substr($id,5);
			$op=$this->rm->get_saved(['UserId'=>$uid,'RecipeId'=>$id]);
			if(count($op)==0)
			{
				$this->rm->add_save(['UserId'=>$uid,'RecipeId'=>$id]);
				echo '<p id="save-'.$id.'">
                      <i class="fa fa-bookmark" style="color:#EB581D; margin-right: 0.3rem;"></i>
                      Unsave
                    </p>';
			}

			else
			{
				$this->rm->del_save(['UserId'=>$uid,'RecipeId'=>$id]);
				echo '<p id="save-'.$id.'">
                      <i class="fa fa-bookmark-o" style="color:#EB581D; margin-right: 0.3rem;"></i>
                      Save
                    </p>';
			}	
		}

		public function add_to_watch_later($id)
		{
			$id=substr($id,3);
			$uid=$this->ss->UserId;
			$pid=[
				'RecipeId'=>$id,
				'UserId'=>$uid
			];
			$op=$this->rm->get_watch_later_m($pid);
			if(count($op)==0)
			{
				$this->rm->add_to_watch_later_m($pid);
				echo true;
			}
			else
			{
				echo false;
			}
		}

		public function add_to_playlist($id)
		{
			$pos=strpos($id,"-");
			$pid=substr($id,1,($pos-1));
			$rid=substr($id,($pos+2));
			$data=[
				'PlaylistId'=>$pid,
				'RecipeId'=>$rid,
			];
			$op=$this->rm->get_playlist_recipe_m($data);
			if(count($op)==0)
			{
				$this->rm->add_to_playlist_m($data);
				echo true;
			}
			else
			{
				echo false;
			}	
		}

		public function add_new_playlist($id)
		{
			$this->fv->set_rules('aPlaylistTitle','Playlist Title','required');
			$this->fv->set_error_delimiters('<div style="color:red; font-size:1.5rem;">','</div>');

			if($this->fv->run()==FALSE)
			{
				$this->index($id);
			}
			else
			{
				$pid=[
					'PlaylistTitle'=>$this->input->post('aPlaylistTitle'),
					'UserId'=>$this->ss->UserId
				];

				$playid=$this->rm->add_new_playlist_m($pid);
				$playpost=[
					'PlaylistId'=>$playid,
					'RecipeId'=>$id
				];
				$this->rm->add_to_playlist_m($playpost);
				redirect('Recipe_user/index/'.$id);
			}
		}

		public function display_watch_later()
		{
			$data['recipes']=$this->rm->display_recipe_watch_later_m();
			$this->load->view('header_user');
			$this->load->view('watch_later_all_v',$data);
			$this->load->view('footer_user');			
		}

		public function wl_recipe($id)
		{
			$uid=$this->ss->UserId;
			$op=$this->rm->get_wl(['UserId'=>$uid,'RecipeId'=>$id]);
			if(count($op)==0)
			{
				$this->rm->add_wl(['UserId'=>$uid,'RecipeId'=>$id]);
				echo '<button class="saved-btn btn" title="Remove from WatchLater" id="'.$id.'" style="outline: none;">
                    <span class="fa fa-clock-o"></span>
                  </button>';
			}

			else
			{
				$this->rm->del_wl(['UserId'=>$uid,'RecipeId'=>$id]);
				echo '<button class="save-btn btn" title="Add to WatchLater" id="'.$id.'" style="outline: none; color:white;">
                    <span class="fa fa-clock-o"></span>
                  </button>';
			}	
		}
	}
?>
<?php
  $rp=base_url('resource/admin/asset');
?>
<div class="page">
  <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
  <div class="page-content container-fluid">
    <div class="row">
      <div class="col-md-12 animation-example animation-hover hover">
        <div style="margin-bottom:4rem;">
            <a href="<?=$this->ss->last_url_user;?>">
              <button class="btn btn-primary animation-scale-down" style="float: left;position: relative;"><i class="icon wb-arrow-left"></i>Back
              </button>
            </a> 
              <a href="<?php echo site_url('admin/User/toggle_status_user_profile/'),$user_data[0]->UserId;?>">
              <?php
              if($user_data[0]->UserStatus==0)
              {
                ?>
                <i class="fa fa-toggle-on" style="color:#3498db;font-size:2.5rem;float: right;position: relative; margin-right: 3rem;"></i>
                <?php
              }
              else
              {
                ?>
                <i class="fa fa-toggle-off" style="color:#a6acaf;font-size:2.5rem;float: right;position: relative; margin-right: 3rem;"></i>
                <?php
              }
              ?>
            </a>
        </div>
        <div class="card" style="height: 38rem;">
          <img class="card-img-top w-full" src="<?=base_url('resource/user/image/'),$user_data[0]->UserCoverImage;?>" style="height: 30rem;">
          <div class="card-block wall-person-info">
            <a class="avatar bg-white img-bordered person-avatar">
              <img src="<?=base_url('resource/user/image/'),$user_data[0]->UserImage;?>">
            </a>
            <h2 class="person-name">
              <a href="#"><?=$user_data[0]->UserName;?></a>
            </h2>
            <p class="card-text">
              <div>
                <div>
                <a href="#" class="blue-grey-400">
                  <i class="site-menu-icon icon fa-envelope" aria-hidden="true"></i>
                  <span><?=$user_data[0]->UserEmail;?></span>
                </a>
                </div>
                <div>
                <a href="#" class="blue-grey-400">
                  <i class="site-menu-icon fa fa-phone" aria-hidden="true"></i>
                  <span><?=$user_data[0]->UserContactNo;?></span>
                </a>
                </div>

                <div>
                <a href="#" class="blue-grey-400">
                  <i class="site-menu-icon icon wb-map" aria-hidden="true"></i>
                  <span><?php echo $user_data[0]->CityName.",".$user_data[0]->StateName;?></span>
                  </a>
                </div>
              </div>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">

        <!-- Panel -->
        <div class="panel">
          <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab" href="#recipes"
                aria-controls="recipes" role="tab">Recipes(<?=count($recipe_user_data);?>)
               <!--   <span class="badge badge-pill badge-danger">5</span> -->
               </a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#articles" aria-controls="articles"
                role="tab">Articles(<?=count($article_user_data);?>)</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#followers" aria-controls="followers"
                role="tab">Followers(<?=count($follower_user_data);?>)</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#following" aria-controls="following"
                role="tab">Following(<?=count($following_user_data);?>)</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#playlist" aria-controls="playlist"
                role="tab">Playlists(<?=count($playlist_user_data);?>)</a></li>
                </ul>

                  <div class="tab-content">
                    <div class="tab-pane active animation-slide-left" id="recipes" role="tabpanel">
                      <!-- Panel Basic -->
                      <div class="panel">
                        <header class="panel-heading">
                          <div class="panel-actions"></div>
                        </header>
                        <div class="panel-body" style="margin-top: 1rem;">
                          <table id="recipe_table" class="table table-hover dataTable table-striped w-full">
                            <thead>
                              <tr>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php
                              foreach($recipe_user_data as $rud)
                              {
                                ?>
                                <tr style="">
                                  <td style="margin-top: 2rem;border-top:none;">
                                    <div class="profile-brief" style="border:1px solid #eee;box-shadow: 0 0 10px rgba(0,0,0,.2);border-radius: 10px;">
                                      <div class="media">
                                        <a class="pr-20">
                                          <img class="w-160" src="<?=base_url('resource/user/image/'),$rud->RecipeImage;?>" alt="..." style="height:150px;border-radius: 10px;">
                                        </a>
                                        <div class="media-body pl-20" style="padding:10px;">
                                          <h3 class="mt-0 mb-5"><?=$rud->RecipeTitle;?>
                                            <a href="<?php echo site_url('admin/Recipe/toggle_status_2/'),$rud->RecipeId.'/'.$user_data[0]->UserId?>">
                                              <?php
                                                if($rud->RecipeStatus==0)
                                                {
                                              ?>
                                                <i class="fa fa-toggle-on" style="color:#3498db;font-size:2.5rem;float: right;position: relative;"></i>
                                              <?php
                                                }
                                                else
                                                {
                                              ?>
                                                <i class="fa fa-toggle-off" style="color:#a6acaf;font-size:2.5rem;float: right;position: relative;"></i>
                                              <?php
                                                }
                                              ?>
                                            </a>
                                          </h3>
                                          <p><b>Recipe Description: </b><?=substr($rud->RecipeDescription, 0,50);?>...</p>
                                          <p style="line-height: 0;"><b>Created Date: </b><?=$rud->RecipeCreatedDate;?></p>
                                          <p  class="card-text type-link" style="font-size: 130%;">
                                             <a href="#"><i class="icon fa-commenting" aria-hidden="true" style="color:#66D5EB;"></i>
                                            <span>
                                              <?php
                                              $cnt=0;
                                                foreach($recipe_comment_data as $c){
                                                    if ($rud->RecipeId==$c->RecipeId) {
                                                        $cnt++;
                                                    } 
                                                  }
                                                  echo $cnt;
                                              ?>
                                            </span>
                                          </a>
                                          <a href="#">
                                              <i class="icon fa-heart" 4iaria-hidden="true" style="color: #C82A65;"></i>
                                            <span>
                                              <?php
                                              $cnt=0;
                                                foreach($recipe_like_data as $l){
                                                    if ($rud->RecipeId==$l->RecipeId) {
                                                        $cnt++;
                                                    } 
                                                  }
                                                  echo $cnt;
                                              ?>
                                            </span>
                                          </a>
                                          <a href="#">
                                              <i class="icon fa-eye" 4iaria-hidden="true" style="color:   #58373C;"></i>
                                            <span>
                                              <?php
                                              $cnt=0;
                                                foreach($recipe_view_data as $v){
                                                    if ($rud->RecipeId==$v->RecipeId) {
                                                        $cnt++;
                                                    } 
                                                  }
                                                  echo $cnt;
                                              ?>
                                            </span>
                                          </a>
                                          <a href="#">
                                              <i class="icon fa-star" 4iaria-hidden="true" style="color: #F5E32B;"></i>
                                            <span>
                                              <?php 
                                              $tot_rate=0;
                                                foreach($recipe_rate_data as $r){
                                                  if ($rud->RecipeId==$r->RecipeId) {
                                                      $tot_rate++;
                                                  } 
                                                }
                                                
                                                if ($tot_rate==0)
                                                {
                                                  echo 0;
                                                }
                                                else
                                                {
                                                  $cnt_rate=0;
                                                  foreach ($recipe_rate_data as $r) {
                                                    if ($rud->RecipeId==$r->RecipeId) {
                                                      $cnt_rate=$cnt_rate+$r->Rate;
                                                    }
                                                  }

                                                echo $cnt_rate/$tot_rate;
                                                }
                                              ?>
                                            </span>
                                          </a>
                                          </p>
                                          <a href="<?=site_url('admin/Recipe/recipe_read_more/'),$rud->RecipeId;?>" class="btn btn-outline btn-inverse" style="background-color: #48C9B0;margin-top: .5rem;">READ MORE</a>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>

                            <tfoot>
                              <tr>
                                <th></th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                      <!-- End Panel Basic -->
                    </div>

                    <div class="tab-pane animation-slide-left" id="articles" role="tabpanel">
                      <!-- Panel Basic -->
                      <div class="panel">
                        <header class="panel-heading">
                          <div class="panel-actions"></div>
                        </header>
                        <div class="panel-body" style="margin-top: 1rem;">
                          <table id="article_table" class="table table-hover dataTable table-striped w-full">
                            <thead>
                              <tr>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php
                              foreach($article_user_data as $aud)
                              {
                              ?>
                              <tr style="">
                                  <td style="margin-top: 2rem;border-top:none;">
                                    <div class="profile-brief" style="border:1px solid #eee;box-shadow: 0 0 10px rgba(0,0,0,.2);border-radius: 10px;">
                                      <div class="media">
                                        <a class="pr-20">
                                          <img class="w-160" src="<?=base_url('resource/user/image/'),$aud->FeaturedImage;?>" alt="..." style="height:150px;border-radius: 10px;">
                                        </a>
                                        <div class="media-body pl-20" style="padding:10px;">
                                          <h3 class="mt-0 mb-5"><?=$aud->ArticleTitle;?>
                                                      <a href="<?php
                                               echo site_url('admin/Article/toggle_status_2/'),$aud->ArticleId.'/'.$user_data[0]->UserId;?>">
                                                 <?php
                                                    if ($aud->ArticleStatus==0) {
                                                  ?>
                                                  <i class="fa fa-toggle-on" style="color:#3498db;font-size:2.5rem;float: right;position: relative;"></i>
                                                  <?php
                                                    }
                                                    else
                                                    {
                                                  ?>
                                                  <i class="fa fa-toggle-off" style="color:#a6acaf;font-size:2.5rem;float: right;position: relative;"></i>
                                                  <?php
                                                    }
                                                  ?>              
                                              </a>
                                          </h3>
                                          <p><b>Article Description: </b><?=substr($aud->ArticleDescription, 0,50);?>...</p>
                                          <p style="line-height: 0;"><b>Created Date: </b><?=$aud->ArticleCreatedDate;?></p>
                                          <p  class="card-text type-link" style="font-size: 130%;">
                                             <a href="#"><i class="icon fa-commenting" aria-hidden="true" style="color:#66D5EB;"></i>
                                            <span>
                                              <?php
                                              $cnt=0;
                                                foreach($article_comment_data as $c){
                                                    if ($aud->ArticleId==$c->ArticleId) {
                                                        $cnt++;
                                                    } 
                                                  }
                                                  echo $cnt;
                                              ?>
                                            </span>
                                            </a>
                                            <a href="#">
                                              <i class="icon fa-heart" 4iaria-hidden="true" style="color: #C82A65;"></i>
                                            <span>
                                              <?php
                                              $cnt=0;
                                                foreach($article_like_data as $l){
                                                    if ($aud->ArticleId==$l->ArticleId) {
                                                        $cnt++;
                                                    } 
                                                  }
                                                  echo $cnt;
                                              ?>
                                            </span>
                                          </a>
                                         
                                        </p>
                                          <a href="<?=site_url('admin/Article/article_read_more/'),$aud->ArticleId;?>" class="btn btn-outline btn-inverse" style="background-color: #48C9B0;margin-top: .5rem;">READ MORE</a>
                                          <!-- <div class="row">
                                            <div class="col-md-12 text-right">
                                              
                                            </div>
                                          </div> -->
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>  
                              <?php
                              }
                              ?>
                            </tbody>

                            <tfoot>
                              <tr>
                                <th></th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                      <!-- End Panel Basic -->
                    </div>

                    <div class="tab-pane animation-slide-left" id="followers" role="tabpanel">
                      <!-- Panel Basic -->
                      <div class="panel">
                        <header class="panel-heading">
                          <div class="panel-actions"></div>
                        </header>
                        <div class="panel-body" style="margin-top: 1rem;">
                          <table id="follower_table" class="table table-hover dataTable table-striped w-full">
                            <thead>
                              <tr>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php
                                foreach ($follower_user_data as $fud)
                                {
                              ?>    
                                  <tr style="">
                                      <td style="margin-top: 2rem;border-top:none;">
                                        <div class="profile-brief" style="border:1px solid #eee;box-shadow: 0 0 10px rgba(0,0,0,.2);border-radius: 10px;">
                                          <li class="list-group-item">
                                            <div class="media">
                                              <div class="pr-0 pr-sm-20 align-self-center">
                                                <div class="avatar avatar-online">
                                                  <img src="<?=base_url('resource/user/image/'),$fud->UserImage;?>" alt="...">
                                                  <i class="avatar avatar-busy"></i>
                                                </div>
                                              </div>
                                              <div class="media-body align-self-center">
                                                <h4 class="mt-0 mb-5">
                                                  <a href="<?=site_url('admin/User/profile/'),$fud->UserId;?>" style="text-decoration: none; color: black;">
                                                    <?=$fud->UserName;?>
                                                  </a>
                                                  <!-- <a href="<?php echo site_url('admin/User/toggle_status_follow/'),$fud->UserId.'/'.$user_data[0]->UserId?>">
                                                    <?php
                                                      if($fud->UserStatus==0)
                                                      {
                                                    ?>
                                                      <i class="fa fa-toggle-on" style="color:#3498db;font-size:2.5rem;float: right;position: relative;"></i>
                                                    <?php
                                                      }
                                                      else
                                                      {
                                                    ?>
                                                      <i class="fa fa-toggle-off" style="color:#a6acaf;font-size:2.5rem;float: right;position: relative;"></i>
                                                    <?php
                                                      }
                                                    ?>
                                                  </a> -->
                                                </h4>
                                                <p style="margin-top: 7px;">
                                                  <i class="icon wb-envelope" aria-hidden="true"></i>
                                                  <?=$fud->UserEmail;?>
                                                </p>
                                                <p style="margin-top: -13px">
                                                  <i class="icon fa-phone" aria-hidden="true"></i>
                                                  <?=$fud->UserContactNo;?>
                                                </p>
                                              </div>
                                              <!-- <div class="pl-0 pl-sm-20 mt-15 mt-sm-0 align-self-center">
                                                <button type="button" class="btn btn-outline btn-success btn-sm">Follow</button>
                                              </div> -->
                                            </div>
                                          </li>
                                        </div>
                                      </td>
                                  </tr>
                              <?php
                                }
                              ?>
                            </tbody>

                            <tfoot>
                              <tr>
                                <th></th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                      <!-- End Panel Basic -->
                    </div>

                    <div class="tab-pane animation-slide-left" id="following" role="tabpanel">
                      <!-- Panel Basic -->
                      <div class="panel">
                        <header class="panel-heading">
                          <div class="panel-actions"></div>
                        </header>
                        <div class="panel-body" style="margin-top: 1rem;">
                          <table id="following_table" class="table table-hover dataTable table-striped w-full">
                            <thead>
                              <tr>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php
                                foreach ($following_user_data as $flud)
                                {
                              ?>
                                  <tr style="">
                                      <td style="margin-top: 2rem;border-top:none;">
                                        <div class="profile-brief" style="border:1px solid #eee;box-shadow: 0 0 10px rgba(0,0,0,.2);border-radius: 10px;">
                                          <li class="list-group-item">
                                            <div class="media">
                                              <div class="pr-0 pr-sm-20 align-self-center">
                                                <div class="avatar avatar-online">
                                                  <img src="<?=base_url('resource/user/image/'),$flud->UserImage;?>" alt="...">
                                                  <i class="avatar avatar-busy"></i>
                                                </div>
                                              </div>
                                              <div class="media-body align-self-center">
                                                <h4 class="mt-0 mb-5">
                                                  <a href="<?=site_url('admin/User/profile/'),$flud->UserId;?>" style="text-decoration: none; color: black;">
                                                    <?=$flud->UserName;?>
                                                  </a>
                                                  <!-- <a href="<?php echo site_url('admin/User/toggle_status_follow/'),$flud->UserId.'/'.$user_data[0]->UserId?>">
                                                    <?php
                                                      if($flud->UserStatus==0)
                                                      {
                                                    ?>
                                                      <i class="fa fa-toggle-on" style="color:#3498db;font-size:2.5rem;float: right;position: relative;"></i>
                                                    <?php
                                                      }
                                                      else
                                                      {
                                                    ?>
                                                      <i class="fa fa-toggle-off" style="color:#a6acaf;font-size:2.5rem;float: right;position: relative;"></i>
                                                    <?php
                                                      }
                                                    ?>
                                                  </a> -->
                                                </h4>
                                                <p style="margin-top: 7px;">
                                                  <i class="icon wb-envelope" aria-hidden="true"></i>
                                                  <?=$flud->UserEmail;?>
                                                </p>
                                                <p style="margin-top: -13px">
                                                  <i class="icon fa-phone" aria-hidden="true"></i>
                                                  <?=$flud->UserContactNo;?>
                                                </p>
                                              </div>
                                              <!-- <div class="pl-0 pl-sm-20 mt-15 mt-sm-0 align-self-center">
                                                <button type="button" class="btn btn-outline btn-success btn-sm">Follow</button>
                                              </div> -->
                                            </div>
                                          </li>
                                        </div>
                                      </td>
                                  </tr>
                              <?php
                                }
                              ?>
                            </tbody>

                            <tfoot>
                              <tr>
                                <th></th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                      <!-- End Panel Basic -->
                    </div>

                    <div class="tab-pane animation-slide-left" id="playlist" role="tabpanel">
                      <!-- Panel Basic -->
                      <div class="panel">
                        <header class="panel-heading">
                          <div class="panel-actions"></div>
                        </header>
                        <div class="panel-body" style="margin-top: 1rem;">
                          <table id="playlist_table" class="table table-hover dataTable table-striped w-full">
                            <thead>
                              <tr>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
                              <?php
                              foreach($playlist_user_data as $pud)
                              {
                                ?>
                                <tr style="">
                                  <td style="margin-top: 2rem;border-top:none;">
                                    <div class="profile-brief" style="border:1px solid #eee;box-shadow: 0 0 10px rgba(0,0,0,.2);border-radius: 10px;">
                                          <li class="list-group-item">
                                            <div class="media">
                                              <div class="media-body align-self-center">
                                                <h4 class="mt-0 mb-5">
                                                  <a href="#" style="text-decoration: none; color: black;">
                                                    <?=$pud->PlaylistTitle;?>
                                                  </a>
                                                  
                                                </h4>
                                                <p style="line-height: 2;"><b>Created Date: </b><?=$pud->PlaylistCreatedDate;?></p>
                                                <p style="font-size: 1.1rem;">
                                                   <i class="icon fa-cutlery" aria-hidden="true" style="color:#66D5EB;"></i>
                                                    <span>
                                                      <?php
                                                      $cnt=0;
                                                        foreach($playlist_post_data as $p){
                                                            if ($pud->PlaylistId==$p->PlaylistId) {
                                                                $cnt++;
                                                            } 
                                                          }
                                                          echo $cnt." recipes";
                                                      ?>
                                                    </span>
                                                </p>
                                                <p>
                                                  <a href="<?=site_url('admin/Playlist/get_playlist_recipes/'),$pud->PlaylistId;?>" class="btn btn-outline btn-inverse" style="background-color: #48C9B0;">View Playlist</a>
                                                  <a href="<?php echo site_url('admin/Playlist/toggle_status/'),$pud->PlaylistId.'/'.$user_data[0]->UserId?>">
                                                    <?php
                                                      if($pud->PlaylistStatus==0)
                                                      {
                                                    ?>
                                                      <i class="fa fa-toggle-on" style="color:#3498db;font-size:2.5rem;float: right;position: relative;"></i>
                                                    <?php
                                                      }
                                                      else
                                                      {
                                                    ?>
                                                      <i class="fa fa-toggle-off" style="color:#a6acaf;font-size:2.5rem;float: right;position: relative;"></i>
                                                    <?php
                                                      }
                                                    ?>
                                                  </a>
                                                </p>
                                              </div>
                                            </div>
                                          </li>
                                        </div>
                                  </td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>

                            <tfoot>
                              <tr>
                                <th></th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                      <!-- End Panel Basic -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel -->
            </div>
          </div>
        </div>
      </div>
<script type="text/javascript">
  $(document).ready( function () {
      $('#recipe_table').DataTable({responsive:true});
      $('#article_table').DataTable({responsive:true});
      $('#follower_table').DataTable({responsive:true});
      $('#following_table').DataTable({responsive:true});
      $('#playlist_table').DataTable({responsive:true});
  });
</script>
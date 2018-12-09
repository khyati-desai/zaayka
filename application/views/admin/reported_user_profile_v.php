<?php
  $rp=base_url('resource/user/asset');
?>

  <!-- Page -->
  <div class="page">
    <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
    <div class="page-content container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <!-- Page Widget -->
          <div class="card card-shadow text-center">
            <div class="card-block">
              <a class="avatar avatar-lg">
                <img class="avatar avatar-lg" src="<?=base_url('resource/user/image/'),$report_user_data[0]->UserImage;?>" alt="..." style="height:4rem; width: 4rem;">
              </a>
              <h4 class="profile-user">
                <a href="<?=site_url('admin/user/profile/'),$report_user_data[0]->ReportedUserId?>"><?=$report_user_data[0]->UserName;?></a>
              </h4>
                <div class="col-md-12" style="text-align:left; margin-top: 30px; margin-bottom: 25px;">
                <p>
                  <i class="site-menu-icon icon fa-envelope" aria-hidden="true"></i>
                  <span><?=$report_user_data[0]->UserEmail;?></span>
                </p>
                <p>
                  <i class="site-menu-icon icon fa-phone" aria-hidden="true"></i>
                  <span><?=$report_user_data[0]->UserContactNo;?></span>
                </p>
                <p>
                  <i class="site-menu-icon icon wb-map" aria-hidden="true"></i>
                  <span><?=$report_user_data[0]->CityName;?>,<?=$report_user_data[0]->StateName;?></span>
                </p>

                <p title="User Register Date" data-toggle="tooltip" data-placement="bottom">
                  <i class="site-menu-icon icon fa-calendar" aria-hidden="true"></i>
                  <span><?=$report_user_data[0]->UserRegisterDate;?></span>
                </p>
                <!--   <a href="<?=site_url('admin/User/profile/'),$report_recipe_data[0]->RecipeId;?>" class="btn btn-outline btn-inverse" style="background-color: #48C9B0;margin-top:.5rem; height: 2.5rem;">GO TO PROFILE</a> -->
                </div>
              <div class="profile-social">
              </div>
                <a href="<?php echo site_url('admin/Report/block_user_report/'),$report_user_data[0]->ReportedUserId;?>">
                  <button type="button" class="btn btn-danger btn-lg">Block</button>
                </a>
                <a href="<?php echo site_url('admin/Report/cancel_user_report/'),$report_user_data[0]->ReportedUserId;?>">
                <button type="button" class="btn btn-info btn-lg">Cancel</button>
                </a>
                
            </div>

            <div class="card-shadow card-footer">
              <div class="row no-space">
                <div class="col-3" style="border-right:0.1px solid; border-color: #D6EAF8;">
                    <div>
                      <strong class="profile-stat-count"><?=count($follower_user_data);?></strong>
                    </div>
                    <div>
                      <span><font color="#3498DB">Follower</font></span>
                    </div>
                </div>
                <div class="col-3" style="border-right:0.1px solid; border-color: #D6EAF8;">
                    <div>
                      <strong class="profile-stat-count"><?=count($following_user_data);?></strong>
                    </div>
                    <div>
                      <span><font color="#3498DB">Following</font></span>
                    </div>
                </div>
                <div class="col-3" style="border-right:0.1px solid; border-color: #D6EAF8;">
                    <div>
                      <strong class="profile-stat-count"><?=count($recipe_user_data);?></strong>
                    </div>
                    <div>
                      <span><font color="#3498DB">Recipes</font></span>
                    </div>
                </div>

                <div class="col-3">
                  <div>
                    <strong class="profile-stat-count"><?=count($article_user_data);?></strong>
                  </div>
                  <div>
                    <span><font color="#3498DB">Articles</font></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Page Widget -->
        </div>

        <div class="col-lg-8">
          <!-- Panel -->
          <div class="panel">
            <div class="panel-body nav-tabs-animate nav-tabs-horizontal">
            <table id="user_table" class="table table-hover dataTable table-striped w-full">
              <thead>
                <tr>
                  <th>Reporter Name</th>
                  <th>Reason</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Reporter Name</th>
                  <th>Reason</th>
                  <th>Image</th>
                </tr>
              </tfoot>
            </table>
            </div>
          </div>
          <!-- End Panel -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->


<script type="text/javascript">

  $(function(){
    //alert('hello');
    $('#user_table').DataTable({
      responsive:true,
      sAjaxSource:'<?=site_url("admin/Report/get_reporter/"),$report_user_data[0]->ReportedUserId;?>',
      aoColumns:[
        {data:null,render:function(data,type,row){
          var s="<?=site_url('admin/user/profile/');?>";
          return '<a style="text-decoration:none;color:black;" href="'+s+'/'+data.UserId+'">'+data.UserName+'</a>';
        }},
        {mData:'Reason'},
        {data:null,render:function(data,type,row){
          var b="<?=base_url('resource/User/image');?>";
          var img='<img src="'+b+'/'+data.UserImage+'" height="80" width="80">';
          return img;
        }}
      ]
    });
  });

</script>
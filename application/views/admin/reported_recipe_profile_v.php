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
              <h2 class="profile-user" style="text-transform: uppercase;">
                <?=$report_recipe_data[0]->RecipeTitle;?>
              </h2>
                <img src="<?=base_url('resource/user/image/'),$report_recipe_data[0]->RecipeImage;?>" alt="..." style="height: 10rem;width: 10rem;margin-top: 1rem;">
              
              <div class="col-md-12" style="margin-top:2rem;margin-bottom: 4rem;">
                 <img src="<?=base_url('resource/user/image/'),$report_recipe_data[0]->UserImage;?>" alt="..." style="height: 2rem;width:2rem;border-radius: 50%;float: right;float: left;">
                <p style="margin-left: 0.5rem;float:left;font-size:1.4rem;font-weight: bolder;"><?=$report_recipe_data[0]->UserName;?></p>
              </div>
                <div class="col-md-12" style="text-align:left; margin-top: 30px; margin-bottom: 25px;">
                <p title="Recipe Posted Date" data-toggle="tooltip" data-placement="bottom">
                  <i class="site-menu-icon icon wb-calendar" aria-hidden="true"></i>
                  <span><?=$report_recipe_data[0]->RecipeCreatedDate;?></span>
                </p>
                <p title="Average cooking time" data-toggle="tooltip" data-placement="bottom">
                  <i class="site-menu-icon icon wb-time" aria-hidden="true"></i>
                  <span><?=$report_recipe_data[0]->AverageTime;?></span>
                </p>
                <p title="Category" data-toggle="tooltip" data-placement="bottom">
                  <i class="site-menu-icon icon fa-cutlery" aria-hidden="true"></i>
                  <span><?=$report_recipe_data[0]->SubCategoryName;?></span>
                </p>
                <p align="center">
                  <a href="<?=site_url('admin/Recipe/recipe_read_more/'),$report_recipe_data[0]->RecipeId;?>" class="btn btn-outline btn-inverse" style="background-color: #48C9B0;margin-top:.5rem; height: 2.5rem;">GO TO RECIPE</a>
                </p>
                </div>
              <div class="profile-social">
              </div>
                <a href="<?=site_url('admin/Report/block_recipe_report/'),$report_recipe_data[0]->RecipeId;?>">
                  <button type="button" class="btn btn-danger  btn-lg">Block</button>
                </a>
                <a href="<?=site_url('admin/Report/cancel_recipe_report/'),$report_recipe_data[0]->RecipeId;?>">
                <button type="button" class="btn btn-info btn-lg">Cancel</button>
                </a>
                
            </div>

          
          </div>
          <!-- End Page Widget -->
        </div>

        <div class="col-lg-8">
          <!-- Panel -->
          <div class="panel">
            <div class="panel-body nav-tabs-animate nav-tabs-horizontal">
            <table id="report_recipe_table" class="table table-hover dataTable table-striped w-full">
              <thead>
                <tr>
                  <th>Reporter Name</th>
                  <th>Image</th>
                  <th>Reason</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Reporter Name</th>
                  <th>Image</th>
                  <th>Reason</th>
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
    $('#report_recipe_table').DataTable({
      responsive:true,
      sAjaxSource:'<?=site_url("admin/Report/get_reporter_recipe/"),$report_recipe_data[0]->RecipeId;?>',
      aoColumns:[
        {data:null,render:function(data,type,row){
          var s="<?=site_url('admin/user/profile/');?>";
          return '<a style="text-decoration:none;color:black;" href="'+s+'/'+data.UserId+'">'+data.UserName+'</a>';
        }},
        {data:null,render:function(data,type,row){
          var b="<?=base_url('resource/User/image');?>";
          var img='<img src="'+b+'/'+data.UserImage+'" height="80" width="80">';
          return img;
        }},
        {mData:'Reason'}
      ]
    });
  });

</script>
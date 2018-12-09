<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
    <div class="page-header">
      <h1 class="page-title">COMMENTS ON RECIPES</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">Comment Table</h2>
          
        </header>
        <div class="panel-body">
          <table class="table table-hover table-striped w-full" id="comment_recipe_table">
            <thead>
              <tr>
                <th>Recipe Name</th>
                <th>Comment Content</th>
                <th>UserName</th>
                <th>DateAndTime</th>
                <th>Status</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Recipe Name</th>
                <th>Comment Content</th>
                <th>UserName</th>
                <th>DateAndTime</th>
                <th>Status</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->
<script type="text/javascript">
  $(function(){
    //alert('hello');
    $('#comment_recipe_table').DataTable({
      responsive:true,
      sAjaxSource:'<?=site_url("admin/Comment/get_comment_recipe/");?>',
      aoColumns:[
        {mData:'RecipeTitle'},
        {mData:'Comment'},
        {data:null,render:function(data,type,row){
          var site="<?=site_url('admin/User/profile/');?>"+data.UserId;
          return '<a href="'+site+'" style="text-decoration: none; color:black;">'+data.UserName+'</a>';
        }},
        {mData:'CommentCreatedDate'},
        {data:null,render:function(data,type,row){
          var icon=data.CommentStatus==0?'<i style="font-size:150%; color:#3498db" class="fa fa-toggle-on"></i>':'<i style="font-size:150%; color:#a6acaf" class="fa fa-toggle-off"></i>';
      
          return '<a href="#" class="toggle_status" id="'+data.RecipeCommentId+'">'+icon+'</a>';
        }}
      ],
      dom:'Bfrtip',
      buttons: [
            <?php
              echo get_icons();
            ?>
        ],
    });
  });
$(function(){
    $('#comment_recipe_table').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("admin/Comment/toggle_status_recipe_comment_2/");?>'+$(this).attr("id"),
        success:function(result){
          $('#comment_recipe_table').DataTable().ajax.reload();
        }
      })
    });
  });
</script>
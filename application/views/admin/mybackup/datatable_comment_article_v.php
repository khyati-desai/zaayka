<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">COMMENTS ON ARTICLES</h1>
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
                <th>Id</th>
                <th>Article Name</th>
                <th>Comment Content</th>
                <th>UserName</th>
                <th>DateAndTime</th>
                <th>Status</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Article Name</th>
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
      sAjaxSource:'<?=site_url("admin/Comment/get_comment_article/");?>',
      aoColumns:[
        {mData:'ArticleCommentId'},
        {mData:'ArticleTitle'},
        {mData:'ArticleComment'},
        {data:null,render:function(data,type,row){
          var site="<?=site_url('admin/User/profile/');?>"+data.UserId;
          return '<a href="'+site+'" style="text-decoration: none; color:black;">'+data.UserName+'</a>';
        }},
        {mData:'ArticleCommentCreatedDate'},
        {data:null,render:function(data,type,row){
          var icon=data.ArticleCommentStatus==0?'<i style="font-size:150%; color:#3498db" class="fa fa-toggle-on"></i>':'<i style="font-size:150%; color:#a6acaf" class="fa fa-toggle-off"></i>';
      
          return '<a href="#" class="toggle_status" id="'+data.ArticleCommentId+'">'+icon+'</a>';
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
        url:'<?=site_url("admin/Comment/toggle_status_article_comment_2/");?>'+$(this).attr("id"),
        success:function(result){
          $('#comment_recipe_table').DataTable().ajax.reload();
        }
      })
    });
  });
</script>
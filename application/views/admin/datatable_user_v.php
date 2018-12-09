<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
    <div class="page-header">
      <h1 class="page-title">USERS</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">User Table
            <!-- <button class="btn" data-target="#examplePositionCenter" data-toggle="modal" type="button" style="font-size:10px;position: relative;float: right;"><i class="fa fa-plus"></i></button> --></h2>

          <!-- Modal -->
          
          <!-- End Modal -->
          
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" id="user_table">
            <thead>
              <tr>
                <th>UserName</th>
                <th>Email</th>
                <th>ContactNo</th>
                <th>Image</th>
                <th>Status</th>
                <th>DateAndTime</th>
                <th>State</th>
                <th>City</th>
                <th>More Info</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>ContactNo</th>
                <th>Image</th>
                <th>Status</th>
                <th>DateAndTime</th>
                <th>State</th>
                <th>City</th>
                <th>More Info</th>
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
    $('#user_table').DataTable({
      responsive:true,
      sAjaxSource:'<?=site_url("admin/User/get_user/");?>',
      aoColumns:[
        {mData:'UserName'},
        {mData:'UserEmail'},
        {mData:'UserContactNo'},
        {data:null,render:function(data,type,row){
          var bu="<?=base_url('/resource/user/image');?>";
          var img='<img src="'+bu+'/'+data.UserImage+'" height="75px" width="75px" />';

          return img;
        }},
        {data:null,render:function(data,type,row){
          var icon=data.UserStatus==0?'<i style="font-size:25px; color:#3498db" class="fa fa-toggle-on"></i>':'<i style="font-size:25px; color:#a6acaf" class="fa fa-toggle-off"></i>';
      
          return '<a href="#" class="toggle_status" id="'+data.UserId+'">'+icon+'</a>';
        }},
        {mData:'UserRegisterDate'},
        {mData:'StateName'},
        {mData:'CityName'},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%;" class="icon fa-ellipsis-h"></i>';

          var site='<?=site_url("admin/User/profile/");?>'+data.UserId;
          return '<a href="'+site+'">'+editicon+'</a>';
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
    $('#user_table').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("admin/User/toggle_status/");?>'+$(this).attr("id"),
        success:function(result){
          $('#user_table').DataTable().ajax.reload();
        }
      })
    });
  });
</script>
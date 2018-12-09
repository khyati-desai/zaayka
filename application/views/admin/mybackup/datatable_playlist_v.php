<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">PLAYLISTS</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">
            Playlist Table
          </h2>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" id="playlist_table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>UserName</th>
                <th>Total Recipes</th>
                <th>DateAndTime</th>
                <th>Status</th>
                <th>More Info</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>UserName</th>
                <th>Total Recipes</th>
                <th>DateAndTime</th>
                <th>Status</th>
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
    $('#playlist_table').DataTable({
      sAjaxSource:'<?=site_url("admin/Playlist/get_playlist/");?>',
      aoColumns:[
        {mData:'PlaylistId'},
        {mData:'PlaylistTitle'},
        {data:null,render:function(data,type,row){
          var site="<?=site_url('admin/User/profile/');?>"+data.UserId;
          return '<a href="'+site+'" style="text-decoration: none; color:black;">'+data.UserName+'</a>';
        }},
        {mData:'tot_recipes'},
        {mData:'PlaylistCreatedDate'},
        {data:null,render:function(data,type,row){
          var icon=data.PlaylistStatus==0?'<i style="font-size:25px; color:#3498db" class="fa fa-toggle-on"></i>':'<i style="font-size:25px; color:#a6acaf" class="fa fa-toggle-off"></i>';
      
          return '<a href="#" class="toggle_status" id="'+data.PlaylistId+'">'+icon+'</a>';
        }},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%;" class="icon fa-ellipsis-h"></i>';

          var site='<?=site_url("admin/Playlist/get_playlist_recipes/");?>'+data.PlaylistId;
          return '<a href="'+site+'">'+editicon+'</a>';
        }},
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
    $('#playlist_table').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("admin/Playlist/toggle_status/");?>'+$(this).attr("id"),
        success:function(result){
          $('#playlist_table').DataTable().ajax.reload();
        }
      })
    });
  });
</script>
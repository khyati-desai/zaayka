<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
    <div class="page-header">
      <h1 class="page-title">COMPETITION</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">Competition Table
            <a href="<?=site_url('admin/Competition/add_competition_vl');?>" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" style="font-size:10px;position: relative;float: right;" title="Add Competition"><i class="fa fa-plus"></i></a></h2>
          
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" id="competiton_table">
            <thead>
              <tr>
                <th>Created By</th>
                <th>Title</th>
                <th>Description</th>
                <th>CreatedDateAndTime</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Color</th>
                <th>Total Videos</th>
                <th>Total Likes</th>
                <th>More Info</th>
                <th>Progress</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Created By</th>
                <th>Title</th>
                <th>Description</th>
                <th>CreatedDateAndTime</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Color</th>
                <th>Total Videos</th>
                <th>Total Likes</th>
                <th>More Info</th>
                <th>Progress</th>
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
    $('#competiton_table').DataTable({
      responsive:true,
      sAjaxSource:'<?=site_url("admin/Competition/get_competition/");?>',
      aoColumns:[
        {mData:'AdminName'},
        {mData:'CompetitionTitle'},
        {mData:'CompetitionDescription'},
        {mData:'CompetitionCreatedDate'},
        {mData:'CompetitionStartDate'},
        {mData:'CompetitionEndDate'},
        {mData:'CompetitionStatus'},
        {mData:'Color'},
        {mData:'TotalVideos'},
        {mData:'TotalLikes'},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%; color:black;" class="icon fa-ellipsis-h"></i>';

          var site='<?=site_url("admin/Competition/get_competition/");?>'+data.CompetitionId;
          return '<a href="'+site+'">'+editicon+'</a>';
        }},
        {mData:'CompetitionProgress'}
      ],
      "rowCallback": function( row, data ){
            var obj = eval(data);
            //console.log(objdata);
              if (obj["Color"]== "yellow") {
                //$(row).css({"background-color":"#FFDCDC"});
                 $(row).css({
                  'background-color':'#FBFEB2',
                  'border':'1px ridge',
                  'border-color':'yellow',
                  'color':'black'
                });

            }
            else if(obj["Color"]== "red")
            {
                $(row).css({
                  'background-color':'#F9A6A6',
                  'border':'1px ridge',
                  'border-color':'red',
                  'color':'black'
                });              
            }
            return row;
      },
      "columnDefs": [
            {
                "targets": [ 7 ],
                "visible": false,
                "searchable": false
            },
      ],
      dom:'Bfrtip',
      buttons: [
            <?php
              echo get_icons();
            ?>
        ],
    });
  });
</script>
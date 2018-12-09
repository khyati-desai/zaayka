<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
    <div class="page-header">
      <h1 class="page-title">STATES</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">State Table
            <button class="btn" data-target="#examplePositionCenter" data-toggle="modal" type="button" style="font-size:10px;position: relative;float: right;" title="Add State"><i class="fa fa-plus"></i></button></h2>

          <!-- Modal -->
          <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple modal-center">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalTitle">Add State</h4>
                </div>
                <div class="modal-body">
                  <div class="example-wrap">
                    
                    <div class="example">
                      <?=form_open_multipart('admin/State/add_state');?>
                        <div class="form-group">
                          <label class="form-control-label" for="aStateName">State Name</label>
                          <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                              <i class="icon wb-map"></i>
                            </span>
                            <input type="text" class="form-control" id="aStateName" name="aStateName"
                            placeholder="State Name" autocomplete="off" value="<?=set_value('aStateName');?>"/>
                          </div>
                          <font style="color:red">
                            <?php
                              echo form_error('aStateName');
                            ?>
                          </font>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add State</button>
                        </div>
                      <?=form_close();?>
                    </div>
                  </div>
                </div>
                <!-- <div class="modal-footer">
                </div> -->
              </div>
            </div>
          </div>
          <!-- End Modal -->
          
        </header>
        <div class="panel-body">
          <table class="table table-hover table-striped w-full" id="state_table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Cities</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Edit</th>
                <th>Cities</th>
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
    $('#state_table').DataTable({
      responsive:true,
      sAjaxSource:'<?=site_url("admin/State/get_state/");?>',
      aoColumns:[
        {mData:'StateName'},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%;" class="fa fa-pencil"></i>';

          var site='<?=site_url("admin/State/get_state_to_update/");?>'+data.StateId;
          return '<a href="'+site+'">'+editicon+'</a>';
        }},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%;" class="icon fa-ellipsis-h"></i>';

          var site='<?=site_url("admin/City/index/");?>'+data.StateId;
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
    $('#state_table').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("admin/Category/toggle_status/");?>'+$(this).attr("id"),
        success:function(result){
          $('#category_table').DataTable().ajax.reload();
        }
      })
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    <?php
    $verr=validation_errors();
    if($verr != NULL)
    {
      ?>
      $('#examplePositionCenter').modal('show');
      <?php
    }
    ?>
  });
</script>
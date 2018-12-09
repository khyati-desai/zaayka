<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">CATEGORIES</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">Category Table
            <button class="btn" data-target="#examplePositionCenter" data-toggle="modal" type="button" style="font-size:10px;position: relative;float: right;" title="Add Category"><i class="fa fa-plus"></i></button></h2>

          <!-- Modal -->
          <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple modal-center">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalTitle">Add Category</h4>
                </div>
                <div class="modal-body">
                  <div class="example-wrap">
                    
                    <div class="example">
                      <?=form_open_multipart('admin/Category/add_category');?>
                        <div class="form-group">
                          <label class="form-control-label" for="aCategoryName">Category Name</label>
                          <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                              <i class="icon wb-grid-4"></i>
                            </span>
                            <input type="text" class="form-control" id="aCategoryName" name="aCategoryName"
                            placeholder="Category Name" autocomplete="off" value="<?=set_value('aCategoryName');?>"/>
                          </div>
                          <font style="color:red">
                            <?php
                              echo form_error('aCategoryName');
                            ?>
                          </font>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add Category</button>
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
          <table class="table table-hover table-striped w-full" id="category_table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
                <th>DateAndTime</th>
                <th>Added By</th>
                <th>Edit</th>
                <th>Sub Category</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
                <th>DateAndTime</th>
                <th>Added By</th>
                <th>Edit</th>
                <th>Sub Category</th>
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
    $('#category_table').DataTable({
      sAjaxSource:'<?=site_url("admin/Category/get_category/");?>',
      aoColumns:[
        {mData:'CategoryId'},
        {mData:'CategoryName'},
        {data:null,render:function(data,type,row){
          var icon=data.CategoryStatus==0?'<i style="font-size:150%; color:#3498db" class="fa fa-toggle-on"></i>':'<i style="font-size:150%; color:#a6acaf" class="fa fa-toggle-off"></i>';
      
          return '<a href="#" class="toggle_status" id="'+data.CategoryId+'">'+icon+'</a>';
        }},
        {mData:'CategoryCreatedDate'},
        {mData:'AddedByAdminName'},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%;" class="fa fa-pencil"></i>';

          var site='<?=site_url("admin/Category/get_category_to_update/");?>'+data.CategoryId;
          return '<a href="'+site+'">'+editicon+'</a>';
        }},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%;" class="icon fa-ellipsis-h"></i>';

          var site='<?=site_url("admin/Subcategory/index/");?>'+data.CategoryId;
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
    $('#category_table').on('click','tbody .toggle_status',function(){
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
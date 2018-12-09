<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">SUBCATEGORIES</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">Subcategory Table
            <button class="btn" data-target="#examplePositionCenter" data-toggle="modal" type="button" style="font-size:10px;position: relative;float: right;" title="Add SubCategory"><i class="fa fa-plus"></i></button></h2>

          <!-- Modal -->
          <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple modal-center">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalTitle">Add SubCategory</h4>
                </div>
                <div class="modal-body">
                  <div class="example-wrap">
                    
                    <div class="example">
                      <?php
                        if(isset($my_category))
                          echo form_open_multipart('admin/Subcategory/add_subcategory/'.$my_category[0]->CategoryId);
                        else
                          echo form_open_multipart('admin/Subcategory/add_subcategory'); 
                      ?>
                        <div class="form-group">
                          <label class="form-control-label" for="aSubCategoryName">Subcategory Name</label>
                          <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                              <i class="icon wb-grid-9"></i>
                            </span>
                            <input type="text" class="form-control" id="aSubCategoryName" name="aSubCategoryName"
                            placeholder="Subcategory Name" autocomplete="off" value="<?=set_value('aSubCategoryName');?>"/>
                          </div>
                          <font style="color:red">
                            <?php
                              echo form_error('aSubCategoryName');
                            ?>
                          </font>
                        </div>
                        <div class="form-group">
                          
                            
                            <?php
                              if(isset($categories))
                              {
                            ?>
                                <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                  <i class="icon wb-grid-4"></i>
                                </span>
                                <select name="aCategoryIdCombo" class="form-control">
                            <?php
                                foreach($categories as $cat)
                                {
                            ?>
                                  <option value="<?=$cat->CategoryId?>"><?=$cat->CategoryName?></option>
                            <?php
                                }
                            ?>
                                </select>
                                </div>
                            <?php
                              }
                            ?>                        
                            
                          
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add Subcategory</button>
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
          <table class="table table-hover table-striped w-full" id="subcategory_table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Status</th>
                <th>DateAndTime</th>
                <th>Added By</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Status</th>
                <th>DateAndTime</th>
                <th>Added By</th>
                <th>Edit</th>
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
    $('#subcategory_table').DataTable({
      <?php
        if(isset($my_category))
        {
      ?>
          sAjaxSource:'<?=site_url("admin/Subcategory/get_subcategory/");?>'+<?=$my_category[0]->CategoryId?>,
      <?php
        }
        else
        {
      ?>
          sAjaxSource:'<?=site_url("admin/Subcategory/get_subcategory/");?>',
      <?php
        }
      ?>
      aoColumns:[
        {mData:'SubcategoryId'},
        {mData:'SubCategoryName'},
        {mData:'CategoryName'},
        {data:null,render:function(data,type,row){
          var icon=data.SubcategoryStatus==0?'<i style="font-size:150%; color:#3498db" class="fa fa-toggle-on"></i>':'<i style="font-size:150%; color:#a6acaf" class="fa fa-toggle-off"></i>';
      
          return '<a href="#" class="toggle_status" id="'+data.SubcategoryId+'">'+icon+'</a>';
        }},
        {mData:'SubcategoryCreatedDate'},
        {mData:'AddedByAdminName'},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%;" class="fa fa-pencil"></i>';

          var site='<?=site_url("admin/Subcategory/get_subcategory_to_update/");?>'+data.SubcategoryId;
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
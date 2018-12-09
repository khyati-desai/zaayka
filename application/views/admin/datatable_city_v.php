<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
    <div class="page-header">
      <h1 class="page-title">CITIES</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">City Table
            <button class="btn" data-target="#examplePositionCenter" data-toggle="modal" type="button" style="font-size:10px;position: relative;float: right;" title="Add City"><i class="fa fa-plus"></i></button></h2>

          <!-- Modal -->
          <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple modal-center">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalTitle">Add City</h4>
                </div>
                <div class="modal-body">
                  <div class="example-wrap">
                    
                    <div class="example">
                      <?php
                        if(isset($my_state))
                          echo form_open_multipart('admin/City/add_city/'.$my_state[0]->StateId);
                        else
                          echo form_open_multipart('admin/City/add_city'); 
                      ?>
                        <div class="form-group">
                          <label class="form-control-label" for="aCityName">City Name</label>
                          <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                              <i class="icon wb-map"></i>
                            </span>
                            <input type="text" class="form-control" id="aCityName" name="aCityName"
                            placeholder="City Name" autocomplete="off" value="<?=set_value('aCityName');?>"/>
                          </div>
                          <font style="color:red">
                            <?php
                              echo form_error('aCityName');
                            ?>
                          </font>
                        </div>
                        <div class="form-group">
                          
                            
                            <?php
                              if(isset($states))
                              {
                            ?>
                                <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                  <i class="icon wb-grid-4"></i>
                                </span>
                                <select name="aStateIdCombo" class="form-control">
                            <?php
                                foreach($states as $st)
                                {
                            ?>
                                  <option value="<?=$st->StateId?>"><?=$st->StateName?></option>
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
                          <button type="submit" class="btn btn-primary">Add City</button>
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
          <table class="table table-hover table-striped w-full" id="city_table">
            <thead>
              <tr>
                <th>Name</th>
                <th>StateId</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>StateId</th>
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
    $('#city_table').DataTable({
      responsive:true,
      <?php
        if(isset($my_state))
        {
      ?>
          sAjaxSource:'<?=site_url("admin/City/get_city/");?>'+<?=$my_state[0]->StateId?>,
      <?php
        }
        else
        {
      ?>
          sAjaxSource:'<?=site_url("admin/City/get_city/");?>',
      <?php
        }
      ?>
      aoColumns:[
        {mData:'CityName'},
        {mData:'StateName'},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%;" class="fa fa-pencil"></i>';

          var site='<?=site_url("admin/City/get_city_to_update/");?>'+data.CityId;
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
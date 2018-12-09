<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">ADMINS</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">Admin Table
            <button class="btn" data-target="#examplePositionCenter" data-toggle="modal" type="button" style="font-size:10px;position: relative;float: right;" title="Add Admin"><i class="fa fa-plus"></i></button></h2>

          <!-- Modal -->
          <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple modal-center">
              <div class="modal-content" style="height: 80%;">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalTitle">Add Admin</h4>
                </div>
                <div class="modal-body" style="max-height: calc(100% - 120px);overflow-y: scroll;">
                  <div class="example-wrap">
                    
                    <div class="example">
                      <?=form_open_multipart('admin/Admin/add_admin');?>
                        <div class="form-group">
                          <label class="form-control-label" for="aAdminName">Admin Name</label>
                          <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                              <i class="icon wb-user"></i>
                            </span>
                            <input type="text" class="form-control" id="aAdminName" name="aAdminName"
                            placeholder="Admin Name" autocomplete="off" value="<?=set_value('aAdminName');?>"/>
                          </div>
                          <font style="color:red">
                            <?php
                              echo form_error('aAdminName');
                            ?>
                          </font>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label" for="aAdminEmail">Email Address</label>
                          <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                              <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="aAdminEmail" name="aAdminEmail"
                              placeholder="Email Address" autocomplete="off" value="<?=set_value('aAdminEmail');?>"/>
                          </div>
                          <font style="color:red">
                            <?php
                              echo form_error('aAdminEmail');
                            ?>
                          </font>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label" for="aAdminContactNo">Contact No</label>
                          <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </span>
                            <input type="text" class="form-control" id="aAdminContactNo" name="aAdminContactNo"
                            placeholder="Contact No" autocomplete="off" value="<?=set_value('aAdminContactNo');?>"/>
                          </div>
                              <font style="color:red">
                                <?php
                                echo form_error('aAdminContactNo');
                                ?>
                              </font>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label" for="aAdminPassword">Password</label>
                          <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                              <i class="fa fa-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="aAdminPassword" name="aAdminPassword"
                              placeholder="Password" autocomplete="off" value="<?=set_value('aAdminPassword');?>"/>
                          </div>
                          <font style="color:red">
                            <?php
                               echo form_error('aAdminPassword');
                            ?>
                          </font>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label" for="aAdminLevel">Admin Type</label>
                          <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                              <i class="icon wb-user"></i>
                            </span>
                            <select name="aAdminLevel" class="form-control">
                              <option value="0" selected="true">
                                SuperAdmin
                              </option>
                              <option value="1">
                                SubAdmin
                              </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="example-wrap">
                            <label class="form-control-label" for="aAdminImage">Select Profile Pic</label>
                            <div class="example">
                              <input type="file" id="aAdminImage" name="aAdminImage"
                              />
                            </div>
                            <div class="form-group">
                              <img src="<?=base_url('/resource/admin/image/'),'default.jpg';?>" height="100px" weight="100px" id="aAdminImageDisplay" style="border-radius: 25px;">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add Admin</button>
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
          <table class="table table-hover dataTable table-striped w-full" id="admin_table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Image</th>
                <th>Status</th>
                <th>DateAndTime</th>
                <th>Added By</th>
                <th>Level</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Image</th>
                <th>Status</th>
                <th>DateAndTime</th>
                <th>Added By</th>
                <th>Level</th>
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
    $('#admin_table').DataTable({
      sAjaxSource:'<?=site_url("admin/Admin/get_admin/");?>',
      aoColumns:[
        {mData:'AdminId'},
        {mData:'AdminName'},
        {mData:'AdminEmail'},
        {mData:'AdminContactNo'},
        {data:null,render:function(data,type,row){
          var bu="<?=base_url('/resource/admin/image/');?>";
          var img='<img src="'+bu+'/'+data.AdminImage+'" height="75px" width="75px" />';

          return img;
        }},
        {data:null,render:function(data,type,row){
          var icon=data.AdminStatus==0?'<i style="font-size:25px; color:#3498db" class="fa fa-toggle-on"></i>':'<i style="font-size:25px; color:#a6acaf" class="fa fa-toggle-off"></i>';
      
          return '<a href="#" class="toggle_status" id="'+data.AdminId+'">'+icon+'</a>';
        }},
        {mData:'AdminCreatedDateTime'},
        {mData:'AddedByAdminName'},
        {mData:'AdminLevel'}
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
    $('#admin_table').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("admin/Admin/toggle_status/");?>'+$(this).attr("id"),
        success:function(result){
          $('#admin_table').DataTable().ajax.reload();
        }
      })
    });
  });
</script>
<script type="text/javascript">
    $(function(){
      $('#aAdminImage').on('change',function(e){
        var imgsrc=URL.createObjectURL(e.target.files[0])
        /*$("#uAdminImage").val().replace(/C:\\fakepath\\/i, '');*/
        $('#aAdminImageDisplay').attr('src',imgsrc);
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
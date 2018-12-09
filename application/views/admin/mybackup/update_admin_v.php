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
          <h2 class="panel-title">Update Admin</h2>
        </header>
        <div class="panel-body">
          <!-- <div class="example-wrap">
            <div class="example">
              <?=form_open_multipart('admin/Admin/update_admin/'.$admin_data[0]->AdminId);?>
              <div class="form-group">
                <label class="form-control-label" for="uAdminName">Admin Name</label>
                <div class="input-group input-group-icon">
                  <span class="input-group-addon">
                    <i class="icon wb-user"></i>
                  </span>
                  <input type="text" class="form-control" id="uAdminName" name="uAdminName"
                  placeholder="Admin Name" autocomplete="off" value="<?=$admin_data[0]->AdminName;?>"/>
                  <font style="color:red">
                  <?php
                  echo form_error('uAdminName');
                  ?>
                  </font>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="uAdminPassword">Password</label>
                <div class="input-group input-group-icon">
                  <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </span>
                  <input type="password" class="form-control" id="uAdminPassword" name="uAdminPassword"
                  placeholder="Password" autocomplete="off" value="<?=$admin_data[0]->AdminPassword;?>"/>
                  <font style="color:red">
                    <?php
                    echo form_error('uAdminPassword');
                    ?>
                  </font>
                </div>
              </div>
              <div class="example-wrap">
                <label class="form-control-label" for="uAdminImage">Select Profile Pic</label>
                <div class="example">
                  <input type="file" id="uAdminImage" name="uAdminImage"
                  />
                </div>
                <div class="form-group">
                  <img src="<?=base_url('/resource/admin/image/'),$admin_data[0]->AdminImage;?>" height="100px" weight="100px" id="uAdminImageDisplay" style="border-radius: 25px;">
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
              <?=form_close();?>
            </div>
          </div> -->
          <!-- Example Tabs Line Top -->
          <div class="example-wrap">
            <div class="nav-tabs-horizontal" data-plugin="tabs">
              <ul class="nav nav-tabs nav-tabs-line tabs-line-top" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#basicInfo"
                    aria-controls="basicInfo" role="tab" id="basic_info">Basic Information</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#passwordInfo"
                    aria-controls="passwordInfo" role="tab" id="password_info">Password</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#profileInfo"
                    aria-controls="profileInfo" role="tab" id="profile_info">Profile Picture</a></li>
                <!-- <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#exampleTabsLineTopFour"
                    aria-controls="exampleTabsLineTopFour" role="tab">Javascript</a></li> -->
              </ul>
              <div class="tab-content pt-20">
                <div class="tab-pane active" id="basicInfo" role="tabpanel">
                  <div class="example">
                    <?=form_open_multipart('admin/Admin/update_basic/');?>
                    <div class="form-group">
                      <label class="form-control-label" for="uAdminName">Admin Username</label>
                      <div class="input-group input-group-icon">
                        <span class="input-group-addon">
                          <i class="icon wb-user"></i>
                        </span>
                        <input type="text" class="form-control" id="uAdminName" name="uAdminName"
                        placeholder="Admin Name" autocomplete="off" value="<?=$admin_data[0]->AdminName;?>"/>
                      </div>
                        <font style="color:red">
                          <?php
                          echo form_error('uAdminName');
                          ?>
                        </font>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="uAdminEmail">Email</label>
                      <div class="input-group input-group-icon">
                        <span class="input-group-addon">
                          <i class="fa fa-envelope"></i>
                        </span>
                        <input type="email" class="form-control" id="uAdminEmail" name="uAdminEmail"
                        placeholder="Password" autocomplete="off" value="<?=$admin_data[0]->AdminEmail;?>"/>
                      </div>
                        <font style="color:red">
                          <?php
                          echo form_error('uAdminEmail');
                          ?>
                        </font>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="uAdminContactNo">Contact No</label>
                      <div class="input-group input-group-icon">
                        <span class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" id="uAdminContactNo" name="uAdminContactNo"
                        placeholder="Contact No" autocomplete="off" value="<?=$admin_data[0]->AdminContactNo;?>"/>
                      </div>
                          <font style="color:red">
                            <?php
                            echo form_error('uAdminContactNo');
                            ?>
                          </font>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Update Basic Info</button>
                    </div>
                    <?=form_close();?>
                  </div>
                </div>
                <div class="tab-pane" id="passwordInfo" role="tabpanel">
                  <div class="example">
                    <?=form_open_multipart('admin/Admin/update_password/');?>
                    <div class="form-group">
                      <label class="form-control-label" for="uAdminPasswordOld">Current Password</label>
                      <div class="input-group input-group-icon">
                        <span class="input-group-addon">
                          <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="uAdminPasswordOld" name="uAdminPasswordOld"
                        placeholder="Current Password" autocomplete="off"/>
                      </div>
                        <font style="color:red">
                          <?php
                          echo form_error('uAdminPasswordOld');
                          if(isset($incorrect_pwd))
                          {
                            echo $incorrect_pwd;
                          }
                          ?>
                        </font>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="uAdminPasswordNew">New Password</label>
                      <div class="input-group input-group-icon">
                        <span class="input-group-addon">
                          <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="uAdminPasswordNew" name="uAdminPasswordNew"
                        placeholder="New Password" autocomplete="off"/>
                      </div>
                        <font style="color:red">
                          <?php
                          echo form_error('uAdminPasswordNew');
                          ?>
                        </font>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label" for="uAdminPasswordConfirm">Confirm Password</label>
                      <div class="input-group input-group-icon">
                        <span class="input-group-addon">
                          <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="uAdminPasswordConfirm" name="uAdminPasswordConfirm"
                        placeholder="Confirm Password" autocomplete="off"/>
                      </div>
                        <font style="color:red">
                          <?php
                          echo form_error('uAdminPasswordConfirm');
                          ?>
                        </font>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                    <?=form_close();?>
                  </div>
                </div>
                <div class="tab-pane" id="profileInfo" role="tabpanel">
                  <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                      <div class="example">
                        <?=form_open_multipart('admin/Admin/update_profile/');?>
                        <div class="example-wrap">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-4 text-center">
                                <img src="<?=base_url('/resource/admin/image/'),$admin_data[0]->AdminImage;?>" id="uAdminImageDisplay" style="border-radius: 50%; height: 150px; width: 150px; box-shadow: 0px 0px 0px 10px rgba(0,0,0,0.1);">
                              </div>
                            </div>
                          </div>
                          <label class="form-control-label" for="uAdminImage">Select Profile Pic</label>
                          <div class="example">
                            <input type="file" id="uAdminImage" name="uAdminImage" class="form-control"/>
                          </div>
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Update Profile Pic</button>
                        </div>
                        <?=form_close();?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Example Tabs Line Top -->
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->
  <script type="text/javascript">
    $(function(){
      $('#uAdminImage').on('change',function(e){
        var imgsrc=URL.createObjectURL(e.target.files[0])
        /*$("#uAdminImage").val().replace(/C:\\fakepath\\/i, '');*/
        $('#uAdminImageDisplay').attr('src',imgsrc);
      });
    });
  </script>
  <script type="text/javascript">
    $(function(){
      <?php
        if(isset($password) || isset($incorrect_pwd))
        {
      ?>
          $('#password_info').trigger('click')
      <?php
        }
      ?>
      <?php
        if(isset($basic))
        {
      ?>
          $('#basic_info').trigger('click')
      <?php
        }
      ?>
    });    
  </script>
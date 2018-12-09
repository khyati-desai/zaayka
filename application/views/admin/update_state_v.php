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
          <h2 class="panel-title">Update State</h2>
        </header>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel-body">
              <div class="example-wrap">
                <div class="example">
                  <?=form_open_multipart('admin/State/update_state/'.$state_data[0]->StateId);?>
                  <div class="form-group">
                    <label class="form-control-label" for="uStateName">State Name</label>
                    <div class="input-group input-group-icon">
                      <span class="input-group-addon">
                        <i class="icon wb-map"></i>
                      </span>
                      <input type="text" class="form-control" id="uStateName" name="uStateName"
                      placeholder="Category Name" autocomplete="off" value="<?=$state_data[0]->StateName;?>"/>
                    </div>
                    <font style="color:red">
                    <?php
                    echo form_error('uStateName');
                    ?>
                    </font>
                 
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                  <?=form_close();?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->
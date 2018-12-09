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
          <h2 class="panel-title">Update Category</h2>
        </header>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel-body">
              <div class="example-wrap">
                <div class="example">
                  <?=form_open_multipart('admin/Category/update_category/'.$category_data[0]->CategoryId);?>
                  <div class="form-group">
                    <label class="form-control-label" for="uCategoryName">Category Name</label>
                    <div class="input-group input-group-icon">
                      <span class="input-group-addon">
                        <i class="icon wb-grid-4"></i>
                      </span>
                      <input type="text" class="form-control" id="uCategoryName" name="uCategoryName"
                      placeholder="Category Name" autocomplete="off" value="<?=$category_data[0]->CategoryName;?>"/>
                      <font style="color:red">
                      <?php
                      echo form_error('uCategoryName');
                      ?>
                      </font>
                    </div>
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
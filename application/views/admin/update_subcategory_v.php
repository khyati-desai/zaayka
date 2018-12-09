<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
    <div class="page-header">
      <h1 class="page-title">SUBCATEGORIES</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h2 class="panel-title">Update Subcategory</h2>
        </header>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel-body">
              <div class="example-wrap">
                <div class="example">
                  <?=form_open_multipart('admin/Subcategory/update_subcategory/'.$sub_cat_data[0]->SubcategoryId);?>
                  <div class="form-group">
                    <label class="form-control-label" for="uSubcategoryName">Subcategory Name</label>
                    <div class="input-group input-group-icon">
                      <span class="input-group-addon">
                        <i class="icon wb-grid-9"></i>
                      </span>
                      <input type="text" class="form-control" id="uSubcategoryName" name="uSubcategoryName"
                      placeholder="Subcategory Name" autocomplete="off" value="<?=$sub_cat_data[0]->SubCategoryName;?>"/>
                    </div>
                      <font style="color:red">
                      <?php
                      echo form_error('uSubcategoryName');
                      ?>
                      </font>
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="uCategory">
                      <?php
                        foreach($cat_data as $cd)
                        {
                      ?>
                          <option value="<?=$cd->CategoryId?>"
                            <?php
                              if($cd->CategoryId==$sub_cat_data[0]->CategoryId)
                                echo "selected"
                            ?>
                            ><?=$cd->CategoryName?></option>
                      <?php
                        }
                      ?>
                    </select>
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
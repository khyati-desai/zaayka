<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <script src="http://js.nicedit.com/nicEdit-latest.js"></script>
  <script>
    $(function(){
      bkLib.onDomLoaded(function()
      {
      new nicEditor().panelInstance('comp_desc');
      });
    });
  </script>
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">COMPETITION</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h2 class="panel-title">Add Competition</h2>
        </header>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel-body">
              <div class="example-wrap">
                <div class="example">
                  <?=form_open_multipart('admin/Competition/add_competition/');?>
                  <div class="form-group">
                    <label class="form-control-label" for="aCompetitionTitle">Competition Title</label>
                    <div class="input-group input-group-icon">
                      <span class="input-group-addon">
                        <i class="icon wb-grid-4"></i>
                      </span>
                      <input type="text" class="form-control" id="aCompetitionTitle" name="aCompetitionTitle"
                      placeholder="Competition Title" autocomplete="off" value="<?=set_value('aCompetitionTitle');?>"/>
                    </div>
                      <font style="color:red">
                      <?php
                      echo form_error('aCompetitionTitle');
                      ?>
                      </font>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="aCompetitionStartDate">Start Date</label>
                    <div class="input-group input-group-icon">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar"></i>
                      </span>
                      <input type="text" class="form-control" id="aCompetitionStartDate" name="aCompetitionStartDate"
                      placeholder="Start Date" autocomplete="off" value="<?=set_value('aCompetitionStartDate');?>" data-plugin="datepicker"/>
                    </div>
                      <font style="color:red">
                      <?php
                      echo form_error('aCompetitionStartDate');
                      ?>
                      </font>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="aCompetitionEndDate">End Date</label>
                    <div class="input-group input-group-icon">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar"></i>
                      </span>
                      <input type="text" class="form-control" id="aCompetitionEndDate" name="aCompetitionEndDate"
                      placeholder="End Date" autocomplete="off" data-plugin="datepicker" value="<?=set_value('aCompetitionEndDate');?>"/>
                    </div>
                      <font style="color:red">
                      <?php
                      echo form_error('aCompetitionEndDate');
                      if(isset($error))
                        echo $error;
                      ?>
                      </font>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="comp_desc">Description</label>
                      <textarea id="comp_desc" name="aCompetitionDescription" cols="160" rows="10">Some Sample Text</textarea>
                      <font style="color:red">
                      <?php
                      echo form_error('aCompetitionDescription');
                      ?>
                      </font>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Competition</button>
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
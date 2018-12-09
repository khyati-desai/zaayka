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
          <h2 class="panel-title">Update Competition</h2>
        </header>
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel-body">
              <div class="example-wrap">
                <div class="example">
                  <?=form_open_multipart('admin/Competition/update_competition/'.$c_data[0]->CompetitionId);?>
                  <div class="form-group">
                    <label class="form-control-label" for="uCompetitionTitle">Competition Title</label>
                    <div class="input-group input-group-icon">
                      <span class="input-group-addon">
                        <i class="icon wb-grid-4"></i>
                      </span>
                      <input type="text" class="form-control" id="uCompetitionTitle" name="uCompetitionTitle"
                      placeholder="Competition Title" autocomplete="off" value="<?=$c_data[0]->CompetitionTitle;?>"/>
                    </div>
                      <font style="color:red">
                      <?php
                      echo form_error('uCompetitionTitle');
                      ?>
                      </font>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="uCompetitionStartDate">Start Date</label>
                    <div class="input-group input-group-icon">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar"></i>
                      </span>
                      <input type="text" class="form-control" id="uCompetitionStartDate" name="uCompetitionStartDate"
                      placeholder="Start Date" autocomplete="off" value="<?=$c_data[0]->CompetitionStartDate?>" data-plugin="datepicker"/>
                    </div>
                      <font style="color:red">
                      <?php
                      echo form_error('uCompetitionStartDate');
                      ?>
                      </font>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="uCompetitionEndDate">End Date</label>
                    <div class="input-group input-group-icon">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar"></i>
                      </span>
                      <input type="text" class="form-control" id="uCompetitionEndDate" name="uCompetitionEndDate"
                      placeholder="End Date" autocomplete="off" data-plugin="datepicker" value="<?=$c_data[0]->CompetitionEndDate?>"/>
                    </div>
                      <font style="color:red">
                      <?php
                      echo form_error('uCompetitionEndDate');
                      if(isset($error))
                        echo $error;
                      ?>
                      </font>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="comp_desc">Description</label>
                      <textarea id="comp_desc" name="uCompetitionDescription" cols="160" rows="10"><?=$c_data[0]->CompetitionDescription;?></textarea>
                      <font style="color:red">
                      <?php
                      echo form_error('uCompetitionDescription');
                      ?>
                      </font>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Competition</button>
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
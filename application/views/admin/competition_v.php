<div class="page">
  <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
  </a>
  <!-- Example Panel With Tool -->
  <div class="row">
      <div class="col-md-12" style="margin: 1.5rem">
        <a href="<?=$this->ss->last_url_comp;?>">
          <button class="btn btn-primary" style="float: left;position: relative;"><i class="icon wb-arrow-left"></i>Back
          </button>
        </a>
        <?php
          if($competition_data[0]->CompetitionProgress=="Yet to start")
          {
        ?>
            <a href="<?=site_url('admin/Competition/get_competition_to_update/'),$competition_data[0]->CompetitionId;?>">
              <button class="btn btn-info" style="margin-left: 2rem;width: 12rem;">Update
              </button>
            </a>
        <?php    
          }
        ?>
          <?php
          if ($competition_data[0]->CompetitionProgress=="Yet to start" || $competition_data[0]->CompetitionProgress=="In Progress") 
          {
            if($competition_data[0]->CompetitionStatus=="Active")
            {
          ?>
              <a class="btn btn-danger" href="<?=site_url('admin/Competition/toggle_status/'),$competition_data[0]->CompetitionId;?>" style="float: right;position: relative; margin-right: 2.8rem; text-decoration: none; color: white; width: 12rem;">Force Stop</a>
          <?php
            }
            else
            {
          ?>
              <a class="btn btn-success" href="<?=site_url('admin/Competition/toggle_status/'),$competition_data[0]->CompetitionId;?>" style="float: right;position: relative; margin-right: 2.8rem; text-decoration: none; color: white; width: 12rem;">Resume</a>
          <?php
            }
          }
          else if($competition_data[0]->CompetitionProgress=="Ended" && $competition_data[0]->WinnerId==null)
          {
          ?>
              <a class="btn btn-danger" style="float: right;position: relative; margin-right: 2.8rem; text-decoration: none; color: white; width: 12rem;" id="dw">Declare Winner</a>
          <?php
          }
          ?>
      </div>
    </div>
  <div class="panel" style="margin-left: 1rem;margin-right: 1rem;">
    <div class="panel-heading">
      <h2 class="panel-title" style="font-size: 2.5rem"><?=$competition_data[0]->CompetitionTitle;?><font style="font-size: 1.3rem;"> (<?=$competition_data[0]->CompetitionProgress?>)</font></h2>


      <div class="panel-actions">
        <a class="panel-action icon wb-minus" data-toggle="collapse" data-target="#comp_desc"></a>
      </div>
    </div>
    <div class="panel-body">
      <div class="collapse pl-20" id="comp_desc">
        <p><h3>About this competition:</h3></p>
        <div class="row" style="margin: 1.5rem">
          <div class="col-md-6">
            <dt style="font-size: 1.3rem">Created By: </dt>
            <dd class="pl-35" style="font-size: 1.3rem"><?=$competition_data[0]->AdminName?></dd>
          </div>
          <div class="col-md-6">
            <dt style="font-size: 1.3rem">Created: </dt>
            <dd class="pl-35" style="font-size: 1.3rem"><?=$competition_data[0]->CompetitionCreatedDate?></dd>
          </div>
        </div>
        <div class="row" style="margin: 1.5rem">
          <div class="col-md-6">
            <dt style="font-size: 1.3rem">Starting Date: </dt>
            <dd class="pl-35" style="font-size: 1.3rem"><?=$competition_data[0]->CompetitionStartDate?></dd>
          </div>
          <div class="col-md-6">
            <dt style="font-size: 1.3rem">End Date: </dt>
            <dd class="pl-35" style="font-size: 1.3rem"><?=$competition_data[0]->CompetitionEndDate?></dd>
          </div>
        </div>
        <div class="row" style="margin: 1.5rem">
          <div class="col-md-6">
            <dt style="font-size: 1.3rem">Total Participants: </dt>
            <dd class="pl-35" style="font-size: 1.3rem"><?=$competition_data[0]->TotalVideos?></dd>
          </div>
          <div class="col-md-6">
            <dt style="font-size: 1.3rem">Total Likes: </dt>
            <dd class="pl-35" style="font-size: 1.3rem"><?=$competition_data[0]->TotalLikes?></dd>
          </div>
        </div>
        <div class="row" style="margin: 1.5rem">
          <div class="col-md-12">
            <dt style="font-size: 1.3rem">Decsription: </dt>
            <dd class="pl-35" style="font-size: 1.3rem"><?=$competition_data[0]->CompetitionDescription?></dd>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Example Panel With Tool -->
  <div class="row" style="margin-bottom: 1rem;">
    <div class="col-md-2" style="margin-left: 1.2rem;">
      <a href="<?=site_url('admin/Competition/get_competition/'),$competition_data[0]->CompetitionId.'/3';?>" class="btn btn-success form-control">Oldest</a>  
    </div>
    <div class="col-md-2">
      <a href="<?=site_url('admin/Competition/get_competition/'),$competition_data[0]->CompetitionId.'/1';?>" class="btn btn-primary form-control">Recent</a>  
    </div>
    <div class="col-md-2">
      <a href="<?=site_url('admin/Competition/get_competition/'),$competition_data[0]->CompetitionId.'/2';?>" class="btn btn-danger form-control">Most Liked</a>  
    </div>
  </div>
  <div class="panel">
    <header class="panel-heading">
      <h2 class="panel-title" style="font-size: 2rem">Videos of this Competition</h2>
    </header>
    <div class="panel-body" style="margin-top: 1rem;">
      <table id="recipe_table" class="table table-hover dataTable table-striped w-full">
        <thead>
          <tr>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach($competition_video_data as $cvd)
          {
          ?>
            <tr style="">
              <td style="margin-top: 2rem;border-top:none;">
                <div class="profile-brief" style="border:1px solid #eee;box-shadow: 0 0 10px rgba(0,0,0,.2);border-radius: 10px;">
                  <div class="media">
                    <a class="pr-20">
                      <video controls style="height: 15rem; border-radius: 10px;">
                        <source src="<?=base_url('resource/user/image/'),$cvd->VideoUrl;?>" type="video/mp4">
                      </video>
                    </a>
                    <div class="media-body pl-20" style="padding:10px;">
                      <h3 class="mt-0 mb-5"><?=$cvd->CompetitionVideoTitle;?>
                    </h3>
                    <p><b>Video Description: </b><?=substr($cvd->CompetitionVideoDescription,0,100);?>(...)</p>
                    <p style="line-height: 0;"><b>Uploaded On: </b><?=$cvd->CompetitionVideoCreatedDate;?></p>
                    <p  class="card-text type-link" style="font-size: 130%;">
                      <a href="#">
                        <i class="icon fa-heart" 4iaria-hidden="true" style="color: #C82A65;"></i>
                        <span>
                          <?php
                            echo $cvd->TotalLikes;
                          ?>
                        </span>
                      </a>
                    </p>
                    <p>
                      <a href="<?=site_url('admin/Competition/get_video_read_more/'),$cvd->CompetitionVideoId;?>" class="btn btn-outline btn-inverse" style="background-color: #48C9B0;margin-top: .5rem;">READ MORE</a>
                      <a href="<?=site_url('/admin/Competition/toggle_status_video/'),$cvd->CompetitionVideoId.'/'.$competition_data[0]->CompetitionId;?>">
                        <?php
                        if ($cvd->CompetitionVideoStatus==0) {
                          ?>
                          <i class="fa fa-toggle-on" style="color:#3498db;font-size:2.5rem;float: right;position: relative;"></i>
                          <?php
                        }
                        else
                        {
                          ?>
                          <i class="fa fa-toggle-off" style="color:#a6acaf;font-size:2.5rem;float: right;position: relative;"></i>
                          <?php
                        }
                        ?>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>

      <tfoot>
        <tr>
          <th></th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
</div>
<script type="text/javascript">
  $(function(){
    $('#dw').on('click',function(){
      $.ajax({
        url:'<?=site_url("/admin/Competition/declare_winner/")?>'+<?=$competition_data[0]->CompetitionId;?>,
        success:function(result)
        {
          if(result)
          {
            alert("Winner Declared!");
          }
          else
          {
            alert("Couldn't declare Winner...");
          }
        }
      });
    });
  });
</script>
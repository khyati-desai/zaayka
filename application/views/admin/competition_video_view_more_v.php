<?php
  $rp=base_url('reource/user/asset');
?>

<div class="page">
  <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
  </a>
  <div class="page-header">
    <div class="row">
      <div class="col-md-12">
        <a href="<?=$this->ss->last_url;?>">
          <button class="btn btn-primary" style="float: left;position: relative;"><i class="icon wb-arrow-left"></i>Back
          </button>
        </a>
        <a href="<?=site_url('/admin/Competition/toggle_status_video/'),$video_data[0]->CompetitionVideoId;?>">
          <?php
          if ($video_data[0]->CompetitionVideoStatus==0) {
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
      </div>
    </div>
  </div>
  <div class="page-content blue-grey-500">
    <!-- Modal -->
    <div class="modal fade" id="exampleGrid" aria-hidden="true" aria-labelledby="exampleGrid"
    role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple">
      <div class="modal-content" style="height: 80%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Liked by: <b><?=count($like_data)?> people</b></h4>
        </div>
        <div class="modal-body" style="overflow-y: scroll;">
          <div class="example-grid">
            <div class="row">
              <?php
              foreach ($like_data as $ld)
              {
                ?>
                <div class="col-md-12">
                  <li class="list-group-item">
                    <div class="media">
                      <div class="pr-0 pr-sm-20 align-self-center">
                        <div class="avatar">
                          <img src="<?=base_url('resource/user/image/'),$ld->UserImage;?>" alt="...">
                          <i class="avatar avatar-busy"></i>
                        </div>
                      </div>
                      <div class="media-body align-self-center">
                        <h4 class="mt-0 mb-5">
                          <a href="<?=site_url('admin/User/profile/'),$ld->UserId;?>" style="text-decoration: none; color: black;" name="fwlg_more">
                            <?=$ld->UserName;?>
                          </a>
                        </h4>
                      </div>
                    </div>
                  </li>
                  <!-- <div style="margin: 0.3rem; padding: 1rem; background-color: #EDF1F3; border-radius: 5px;"><b><?=$ld->UserName;?></b></div> -->
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->
  <div class="card card-shadow">
    <div class="page-header" style="text-align: center;">
      <h1 class="card-title text-center" style="font-size:2rem;text-transform: uppercase; color:#2C3E50;font-weight: 450;">
        <?=$video_data[0]->CompetitionVideoTitle;?>   
      </h1>
      <div style="width: 150px;height: 2px;background-color:#48C9B0;display: inline-block;margin-bottom: 20px; border-radius: 15px;"></div>
      <p class="card-text type-link" style="font-size: 130%;">
        <a href="#exampleGrid" data-toggle="modal"><i class="icon wb-heart" aria-hidden="true" style="color: #C82A65;" data-html="true" title='
          <?php
          if(count($like_data)>3)
          {
            for($i=0;$i<3;$i++)
            {
              echo $like_data[$i]->UserName;
              echo "<br>";
            }
            $c=(count($like_data)-$i);
            if($c>0)
              echo "and ".$c." more...";
          }
          else if(count($like_data)==0)
          {
            echo "Liked by no one";
          }
          else
          {
            foreach($like_data as $ld)
            {
              echo $ld->UserName;
              echo "<br>"; 
            }
          }
?>
' data-toggle="tooltip" data-placement="bottom"></i>
<span><?php echo count($like_data)?></span>
</a>
</p>
  <div id="image_display">
    <div class="cover player" data-plugin="plyr" style="height: 30%;margin: 20px;">
      <video class="w-full" controls autoplay style="height: 30rem;">
        <source src="<?=base_url('resource/user/image/'),$video_data[0]->VideoUrl;?>" type="video/mp4">
        </video>
      </div>
  </div>
</div>
<div class="card-block">


  <div>
    <p>
      
      <a style="font-weight:bolder ;font-size: 2rem;"><?=$video_data[0]->UserName;?></a>
      <a style="position: relative;float: right;font-size: 1.5rem;" title="<?=$video_data[0]->CompetitionVideoCreatedDate?>" data-toggle="tooltip" data-placement="top"><?=get_time_ago(strtotime($video_data[0]->CompetitionVideoCreatedDate));?></a> 
    </p>
  </div>
  <div>

    <p>
      <?=$video_data[0]->CompetitionVideoDescription;?>
    </p>
</div>
</div>
</div>
</div>

</div>
<?php
$rp=base_url('resource/user/asset/');
?>

<style type="text/css">
.flwimg{
  position: relative;
  height: 100px;
  width: 100px;
  border-radius: 50%;
  border:5px solid #eee;
  left: 35%;
  top: 6rem;
}

.flwbgimg{
  background-size: 400px 200px;
  padding:20px;
  background-position: center;
  background-repeat: no-repeat;
}

.flwcont{
  margin-top:3.9rem;
  padding:10px;
}

.flwuname{
  color:#e93e21;
  font-size: 20px;
  font-family: 'Lucida',cursive;
}

.flwcard{
  padding: 0;
  background-color: rgba(0,0,0,0.88);
  margin-top: 2rem;
  border-radius: 20px;
}
.user-comp{
  margin-top: 2rem;
  border-radius: 20px;
}

.history-video{
  height: 20rem;
  border-radius: 10px;
  width:35rem;
}
.card{
  margin-top: 2.5rem;box-shadow: 0 0 10px rgba(0,0,0,.2);padding:1rem;border-radius: 5px;
}
</style>

<div class="inner-intro parallax bg-overlay-black-70" style="background-image: url(<?=$rp;?>images/bg/03.jpg);">
  <div class="container">
    <div class="row text-center intro-title">
      <h1 class="text-orange"><?=$competition_data[0]->CompetitionTitle?></h1>
      <p class="text-white">We Know The Secret Of Your Success</p>
    </div>
  </div>
</div>

<section class="gallery white-bg page-section-ptb">
  <div class="page">
    <div class="row" style="font-size: 3rem;font-family: 'Amatic SC', cursive;font-weight: bold;margin-bottom: 3rem; margin-top: 2rem;">
      <div class="col-md-1 active" style="margin-left: 18rem;" ><a href="#Details" data-toggle="tab">Details</a></div>
      <?php
      if($competition_data[0]->CompetitionProgress=="In Progress" || $competition_data[0]->CompetitionProgress=="Ended")
      {
      ?>
      <div class="col-md-1 active"><a href="#Videos" data-toggle="tab">Videos</a></div>
      <div class="col-md-1 active"><a href="#Participants" data-toggle="tab">Participants</a></div>
      <?php
      }
      ?>
    </div>

    <div class="tab-content" style="margin-bottom: 3rem;">
      <div id="Details" class="tab-pane fade in active">
        <div class="container">
          <div style="border-bottom: 0.3rem solid #E1541F;">
            <font style="font-size: 5rem;font-family: 'Amatic SC', cursive;">
              <span style="margin-left:50rem;margin-bottom: 0rem;font-size: 4.5rem;">Details</span>
              <?php
                if ($competition_data[0]->CompetitionProgress=="In Progress") {
              ?>
              <a href="<?=site_url('/Competition_user/upload_video_form/'.$competition_data[0]->CompetitionId);?>"><button class="btn btn-lg" style="margin-bottom: 2.5rem;float: right;background-color: #17202A;width: 15rem;font-size: 2rem;font-weight: bold;">Upload Video<i class="fa fa-cutlery" style="margin-left: 1rem;font-size: 1.5rem;"></i></button></a>
              <?php
                }
              ?>
            </font>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <table class="table-responsive table">
                  <tr>
                    <td style="font-size: 2rem;border-top:none;width:15rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Title</b></td>
                    <td style="font-size: 2rem;border-top:none; text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=$competition_data[0]->CompetitionTitle;?></td>
                  </tr>
                  <tr>
                    <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Progress</b></td>
                    <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=$competition_data[0]->CompetitionProgress;?></td>
                  </tr>
                  <?php
                  if($competition_data[0]->CompetitionProgress=="In Progress")
                  {
                  ?>
                  <tr>
                    <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Ending on</b></td>
                    <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=date('d-F-Y',strtotime($competition_data[0]->CompetitionEndDate));?></td>
                  </tr>
                  <?php
                  }
                  else
                  {
                  ?>
                  <tr>
                    <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Starting On:</b></td>
                    <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=$competition_data[0]->CompetitionStartDate;?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <tr>
                    <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Total Videos </b></td>
                    <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=$competition_data[0]->TotalVideos;?></td>
                  </tr>
                  <tr>
                    <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Total Likes</b></td>
                    <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=$competition_data[0]->TotalLikes;?></td>
                  </tr>
                  <tr>
                    <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Description</b></td>
                    <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive; word-break: break-all;"><?=$competition_data[0]->CompetitionDescription;?></td>
                  </tr>
                  <?php
                  if($competition_data[0]->WinnerId!=null)
                  {
                  ?>
                  <tr>
                    <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Winner</b></td>
                    <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><a href="<?=site_url('Profile/index/').$winner_data[0]->UserId;?>"><?=$winner_data[0]->UserName?></a></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <!-- <tr>
                    <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Followers</b></td>
                    <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=count($user_followers_follow)+count($user_followers_unfollow);?></td>
                  </tr>
                  <tr>
                    <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Following</b></td>
                    <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=count($user_following);?></td>
                  </tr> -->
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      if($competition_data[0]->CompetitionProgress=="In Progress" || $competition_data[0]->CompetitionProgress=="Ended")
      {
      ?>  
      <div id="Videos" class="tab-pane fade">
        <div class="container">
          <div style="border-bottom: 0.3rem solid #E1541F;">
            <font style="font-size: 5rem;font-family: 'Amatic SC', cursive;">
              <center>Videos</center>
            </font>
          </div>
          <?php
          if(count($competition_video_data)>0)
          {
          ?>
          <table class="table table-hover dataTable table-striped w-full" id="tbl-history">
              <thead>
                <tr>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <?php
                  foreach ($competition_video_data as $cvd)
                  {
                ?>
                    <tr style="">
                      <td style="margin-top: 2rem;border-top:none;">
                        <div class="row">
                          <div class="col-md-4">
                            <video controls class="history-video">
                              <source src="<?=base_url('resource/user/image/').$cvd->VideoUrl;?>" type="video/mp4">
                            </video>
                          </div>
                          <div class="col-md-8" style="padding:10px;">
                              <a href="<?=site_url('Competition_user/get_video/'.$cvd->CompetitionVideoId);?>"><h3 class="mt-0 mb-5"><?=$cvd->CompetitionVideoTitle;?></h3></a>
                            <p style="word-break: break-all;">
                              <b>Video Description: </b><?=substr(strip_tags($cvd->CompetitionVideoDescription),0,200);?>(...)
                            </p>
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
          <?php
          }
          else
          {
          ?>
          <div class="row text-center" style="font-size: 4rem;font-family: 'Amatic SC', cursive;font-weight: bold;margin-bottom: 2rem; margin-top: 2rem;">
            No Videos Yet.. Be the first one to Participate!
          </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div id="Participants" class="tab-pane fade">
        <div class="container">
          <div style="border-bottom: 0.3rem solid #E1541F;">
            <font style="font-size: 5rem;font-family: 'Amatic SC', cursive;">
              <center>Participants</center>
            </font>
          </div>
          <div class="row">
            <?php
            if(count($competition_video_data)>0)
            {
              foreach($competition_video_data as $cvd)
              {
              ?>
              <div class="col-md-4 user-comp">
                <div class="card flwcard">
                  <div class="image flwbgimg" style="background-image: url(<?= base_url('resource/user/image/'.$cvd->UserCoverImage);?>); ">
                    <img src="<?= base_url('resource/user/image/'),$cvd->UserImage;?>" class="flwimg">
                  </div>
                  <div class="text-content flwcont">
                    <p class="text-center flwuname"><a href="<?=site_url('Profile/index/').$cvd->UserId;?>"><?=$cvd->UserName?></a></p>
                  </div>
                </div>
              </div>
              <?php
              }
            }
            else
            {
            ?>
            <div class="row text-center" style="font-size: 4rem;font-family: 'Amatic SC', cursive;font-weight: bold;margin-bottom: 2rem; margin-top: 2rem;">
              No Participants Yet... Be the first one to Participate
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <?php
      }
      ?>
    </div>
    <div class="container"> 

    </div>
  </section>
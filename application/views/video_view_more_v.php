<?php
$rp=base_url('resource/user/asset/');
?>

<style type="text/css">
a
{
  cursor: pointer;
}

* {
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  box-sizing:border-box;
}

*:before, *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
</style>
<section> 
  <div  style="background-color: black">
    <img src="<?=base_url('resource/user/asset/images/bg/01.jpg')?>" height="180" width="100%">
  </div>
</section>
<div class="container">
  <div style="border-bottom: 0.3rem solid #E1541F;margin-top: 3rem;margin-bottom: 0rem;">

    <font style="font-size: 5rem;font-family: 'Amatic SC', cursive;">
      <div class="row">
        <div class="col-md-12">
          <b><?=$video_data[0]->CompetitionVideoTitle;?></b>
        </div>
      </div>
    </font>
  </div>
</div>

<section class="blog blog-page page-section-ptb" style="padding-top: 2rem;">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="margin-right: 3rem;">
        <div class="blog-entry border mb-50">
          <div class="blog-entry-image">
            <video controls="true" autoplay="true" style="height: 35rem; width: 100%;">
              <source src="<?=base_url('resource/user/image/'.$video_data[0]->VideoUrl);?>" type="video/mp4">
              </video>
              <div class="entry-date" style="height: 5.5rem;width: 18rem;font-size: 2rem;">
                <?=date('d-M-Y', strtotime($video_data[0]->CompetitionVideoCreatedDate));?>
              </div>
            </div>
            <div class="entry-content" style="margin-top: 2rem;">
              <div class="entry-title" style="margin-bottom: 4rem;">
                <p>
                  <a href="<?=site_url('/Profile/index/'),$video_data[0]->UserId;?>"><i class="fa fa-user" style="font-size: 2.5rem;margin-right: 0.5rem;color: black;"></i>  <span style="color: gray;font-family: 'Amatic SC', cursive;font-size: 2.5rem;">By   <?=$video_data[0]->UserName?></span></a>
                </p>
              </div>
              <div class="entry-meta">
                <?php
                if($competition_data[0]->CompetitionProgress!="In Progress" || $competition_data[0]->CompetitionStatus=="Force Stopped")
                {
                  ?>
                  <a style="color: #e93e21" id="disable-like">
                    <?php
                    if(count($liked)>0)
                    {
                      ?>
                      <i class="fa fa-heart"></i>
                      <?=count($like_data);?>
                      Likes
                      <?php
                    }
                    else
                    {
                      ?>
                      <i class="fa fa-heart-o"></i>
                      <?=count($like_data);?>
                      Likes
                      <?php
                    }
                    ?>
                  </a>
                  <?php
                }
                else
                {
                  ?>
                  <a class="tog-like" style="color: #e93e21" id="<?=$video_data[0]->CompetitionVideoId;?>">
                    <?php
                    if(count($liked)>0)
                    {
                      ?>
                      <i class="fa fa-heart"></i>
                      <?=count($like_data);?>
                      Likes
                      <?php
                    }
                    else
                    {
                      ?>
                      <i class="fa fa-heart-o"></i>
                      <?=count($like_data);?>
                      Likes
                      <?php
                    }
                    ?>
                  </a>
                  <?php
                }
                ?>
              </div>
              <div class="entry-description" style="margin-top: 3rem;">
                <p><?=$video_data[0]->CompetitionVideoDescription;?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript">
    $(function(){
      $('.tog-like').on('click',function(){
        $this=($(this).attr("id"));
        $.ajax({
          url:"<?=site_url('Competition_user/like_unlike_video/');?>"+$this,
          success:function(result){
            $('#'+$this).html(result);
          }
        });
      });
    });
  </script>
  <script type="text/javascript">
    $(function(){
      $('#disable-like').on('click',function(){
        alert("Unable to like Video. Check Competition Details...")
      });
    });
  </script>
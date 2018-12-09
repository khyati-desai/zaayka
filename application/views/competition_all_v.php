<?php
$rp=base_url('resource/user/asset/');
?>

<style type="text/css">
.recipebgimg{
  height: 40rem;
}
</style>

  <div class="inner-intro parallax bg-overlay-black-70" style="background-image: url(<?=$rp;?>images/bg/03.jpg);">
    <div class="container">
      <div class="row text-center intro-title">
        <h1 class="text-orange">Competitions</h1>
        <p class="text-white">We Know The Secret Of Your Success</p>
      </div>
    </div>
  </div>

  <section class="gallery white-bg page-section-ptb">
  </div>
  <div class="container"> 
    <?php
    if(count($competition_data)>0)
    {
    ?>
    <div class="isotope popup-gallery columns-2" id="comp-display">
      <?php
      foreach($competition_data as $r)
      {
        ?>
        <div class="grid-item chinese mexican">
          <div class="galllery-item">
            <span><img class="img-responsive recipebgimg" src="<?=base_url('resource/user/image/defaultcomp.jpg');?>" alt=""></span>
            <div class="overlay">
              <div class="overlay-content">
                <h3><a href="<?=site_url('Competition_user/index/'.$r->CompetitionId);?>"><?=$r->CompetitionTitle;?></a></h3>
                Competition: <b><?=$r->CompetitionProgress;?></b>
                <br>
                <?php
                if($r->CompetitionProgress=="In Progress")
                {
                ?>
                  Ending On: <b><?=$r->CompetitionEndDate;?></b>
                  <br>
                  Total Videos: <b><?=$r->TotalVideos;?></b>
                  <br>
                  Total Likes: <b><?=$r->TotalLikes;?></b>
                <?php
                }
                else if($r->CompetitionProgress=="Yet to start")
                {
                ?>
                  Starting On: <b><?=$r->CompetitionStartDate;?></b>
                <?php
                }
                else
                {
                ?>
                  Ended On: <b><?=$r->CompetitionEndDate;?></b>
                <?php
                }
                ?>
                <br>
                <br>
                <div class="row text-center">
                  <a href="<?=site_url('Competition_user/index/'.$r->CompetitionId);?>">
                    <button class="button" type="button">Read More<i class="fa fa-arrow-right"></i></button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
    <?php
    }
    else
    {
    ?>
    <script type="text/javascript">
      alert("You have not participated in any competition yet..");
    </script>
    <?php
    }
    ?>
  </div>
</section>
<?php
$rp=base_url('resource/user/asset/');
?>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>
<style type="text/css">
.card{
  margin-top: 2.5rem;box-shadow: 0 0 10px rgba(0,0,0,.2);padding:1rem;border-radius: 5px;
}
.mybtn2{
  background: white;
  height: 4rem;
  width: 10rem;
  transition: 0.5s all ease;
}

.mybtn2:hover{
  background-color: #e93e21;
  color: white;
  box-shadow: 3px 3px 10px rgba(255,255,255,.2);
}

.mybtn3{
  background-color: #e93e21;
  color: white;
  height: 4rem;
  width: 10rem;
  transition: 0.5s all ease;
}

.mybtn3:hover{
  background: white;
  box-shadow: 3px 3px 10px rgba(255,255,255,.2);
}

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

.flwptog{
  font-size: 20px;
  font-family: 'Lucida',cursive;
}

.flwptog2{
  font-size: 20px;
  font-family: 'Lucida',cursive;
}

.flwuname{
  color:#e93e21;
  font-size: 20px;
  font-family: 'Lucida',cursive;
}

.flwcard{
  padding: 0;
  background-color: rgba(0,0,0,0.88);
}

.history-video{
  height: 20rem;
  border-radius: 10px;
  width:35rem;
}

.next-head-btn{
  margin-bottom: 2.5rem;
  float: right;
  background-color: #17202A;
  width: 15rem;
  font-size: 2.5rem;
  font-weight: bold;
}
#box1
    {
      transition: .2s all ease;
      height: 38rem;
    }
    #box1:hover
    {
      box-shadow: 3px 3px 10px rgba(0,0,0,.2);
    }

    .mybtn1
    {
      transition: .5s all ease;
    }
    .mybtn1:hover
    {
      background: white;
      color: orange;
      box-shadow: 3px 3px 10px rgba(0,0,0,.2); 
    }
    
    /*.dataTables_wrapper */

    .dataTables_filter {
    /*float: right;*/
    text-align: right;
    }
    .dataTables_length{
      display:none;
    }

    .dataTables_info
    {
     margin-right: 3rem; 
    }
    .paginate_button
    {
      margin-right: 3rem;
    }
    .next, .previous{
      background-color: #212F3D;
      padding: 10px;
      cursor: pointer;
      font-weight: bold;
      border-radius: 10%;
    }
    .dataTables_paginate
    {
      margin-top: 3rem;
    }
    
        .show-dlt{
      background: transparent;
      opacity: 0;
      transition: .2s all ease-in;
      height: 250px;
      width:80%;
      position: absolute;
      top:0;
      margin-right: 1.5rem;
      right:0;
      /*z-index: 999;*/
      overflow: hidden;
    }
    
    /*on hover dlt and update recipe*/
    #div_img:hover img{
      transition: .5s all ease-in;
      opacity: 0.2;
    }

    #div_img:hover .entry-date{
      opacity: 1;
    }

    #div_img:hover .show-dlt
    {
      opacity:1;
    }

    /*on hover dlt and update article*/
    #div_img_article:hover img{
      transition: .5s all ease-in;
      opacity: 0.3;
    }

    #div_img_article:hover .entry-date{
      opacity: 1;
    }

    #div_img_article:hover .show-dlt
    {
      opacity:1;
    }    
    .rec-dlt , .art-dlt
    {
      margin-top: 10rem;
      margin-left:8rem;
      border-radius: 50%;
      background-color: black;
      color: #e93e21;
      font-size: 2rem;
      outline: none;
    }
    .rec-upd , .art-upd
    {
      margin-top: 10rem;
      margin-left:2rem;
      border-radius: 50%;
      background-color: black;
      color: #e93e21;
      font-size: 2rem;
      outline: none;
    }

    .rec-dlt:hover ,.art-dlt:hover{
      color:black;
      background-color: #e93e21;
      transform: scale(1.5,1.5);
      outline: none;
    }
    .rec-upd:hover ,.art-upd:hover{
      color:black;
      background-color: #e93e21;
      transform: scale(1.5,1.5);
      outline: none;
    }

    .report-radio{
      height: auto;
      width: auto;

    }
</style>

<!--=================================
  testimonials -->
  <!-- <div class="testimonial-avatar"> -->
    <section class="testimonials parallax bg-overlay-black-90 page-section-ptb" style="background-image: url(<?=base_url('resource/user/image/'),$user_data[0]->UserCoverImage;?>);">
      <div class="container" style="margin-top: 10rem;">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <div class="testimonial-block white-text">
                    <div class="" style="margin-top: 3rem;">
                      <img src="<?=base_url('resource/user/image/'),$user_data[0]->UserImage;?>" alt="" height="150rem" width="150rem" style="border-radius: 50%;box-shadow: 0px 0px 15px 0px #E59866;">
                    </div>
                    <div class="testimonial-info clearfix">
                      <strong><?=$user_data[0]->UserName;?></strong>
                      <span><?=$user_data[0]->UserEmail;?></span>
                      <!-- <p>Our old site was very information-heavy; The Zayka helped to capture and simplify the message we wanted to get across. It’s now more quia nesciunt incidunt accusamus </p> -->
                      <?php
                      if($user_data[0]->UserId!=$this->ss->UserId)
                      {
                        if(isset($user_follows))
                        {
                      ?>
                          <div class="text-content text-center flwptog2" id="user-follow-div" style="padding:3px; margin-top: 2rem;">
                            <?php
                              if(count($user_follows)==0)
                              {
                            ?>
                                <button class="btn mybtn3" id="btn-follow-<?=$user_data[0]->UserId;?>">Follow</button>
                            <?php
                              }
                              else
                              {
                            ?>
                                <button class="btn mybtn2" id="btn-follow-<?=$user_data[0]->UserId;?>">Unfollow</button>
                            <?php
                              }
                            ?>
                          </div>
                      <?php
                        }
                      ?>
                          <div class="text-content text-center">
                            <button class="btn mybtn3" id="btn-report-user">Report User</button>
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
        </div>
        <?php
          if($user_data[0]->UserId!=$this->ss->UserId)
          {
        ?>
        <div style="background-color:white; display: none; padding: 1rem;margin-bottom: -4rem; border-radius: 10px;" class="text-center" id="div-report-user">
          <form method="post" action="<?=site_url('User/report_user/'.$user_data[0]->UserId);?>">
            <h3>Reason for Report</h3>
            <input type="radio" name="aReason" value="spam" id="rd1" class="report-radio" style="margin-bottom: 1rem;">It's Spam
            <br>
            <input type="radio" name="aReason" value="inappropriate" id="rd2" class="report-radio" style="margin-bottom: 1rem;">It's Inappropriate
            <br>
            <button class="button">Report</button>
          </form>
        </div>
        <?php
          }
        ?>
      </section>

      <section>
        <div class="page">
          <div class="row" style="font-size: 3rem;font-family: 'Amatic SC', cursive;font-weight: bold;margin-bottom: 3rem; margin-top: 2rem;">
            <div class="col-md-1 active" style="margin-left: 18rem;" ><a href="#Profile" data-toggle="tab">Profile</a></div>
            <div class="col-md-1 active"><a href="#Followers" data-toggle="tab">Followers</a></div>
            <div class="col-md-1"><a href="#Following" data-toggle="tab">Following</a></div>
            <div class="col-md-1"><a href="#Recipe" data-toggle="tab">Recipe</a></div>
            <div class="col-md-1"><a href="#Article" data-toggle="tab">Article</a></div>
            <?php
            if($user_data[0]->UserId==$this->ss->UserId)
            {
              ?>
              <!-- <div class="col-md-1"><a href="#Activities" data-toggle="tab">Activities</a>
              </div> -->
              <div class="col-md-1"><a href="#History" data-toggle="tab">History</a></div>
              <?php
            }
            ?>
          </div>

          <div class="tab-content" style="margin-bottom: 3rem;">
            <div id="Profile" class="tab-pane fade in active">
              <div class="container" id="user_detail">
                <div style="border-bottom: 0.3rem solid #E1541F;">
                  <font style="font-size: 5rem;font-family: 'Amatic SC', cursive;">
                    <center>Profile</center>
                  </font>
                </div>
                <?php
                if($user_data[0]->UserId==$this->ss->UserId)
                {
                  ?>
                  <div class="col-md-5 col-lg-4 col-xs-12 col-lg-6">
                    <?php
                  }
                  else
                  {
                    ?>
                    <div class="col-md-12">
                      <?php
                    }
                    ?>
                    <div class="card">
                      <table class="table-responsive table">
                        <tr>
                          <td style="font-size: 2rem;border-top:none;width:15rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Username</b></td>
                          <td style="font-size: 2rem;border-top:none; text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=$user_data[0]->UserName;?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Email</b></td>
                          <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=$user_data[0]->UserEmail;?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Registred on</b></td>
                          <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=date('d-F-Y',strtotime($user_data[0]->UserRegisterDate));?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Contact No.</b></td>
                          <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=$user_data[0]->UserContactNo;?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>State</b></td>
                          <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=$user_data[0]->StateName;?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>City</b></td>
                          <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=$user_data[0]->CityName;?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Followers</b></td>
                          <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=count($user_followers_follow)+count($user_followers_unfollow);?></td>
                        </tr>
                        <tr>
                          <td style="font-size: 2rem;border-top:none;max-width:10rem; font-family: 'Lucida Calligraphy;', cursive;"><b>Following</b></td>
                          <td style="font-size: 2rem; border-top:none;text-align: left; font-family: 'Lucida Calligraphy;', cursive;"><?=count($user_following);?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <?php
                  if($user_data[0]->UserId==$this->ss->UserId)
                  {
                    ?>
                    <div class="col-lg-8 col-md-7 col-sm-12 pl-0 pr-0 white-bg contact-form">
                      <div class="card">
                        <div class="row">
                          <div class="col-md-12" style="box-shadow: 0 0 2px 1px rgba(0,0,0,0.2); background-color: rgba(0,0,0,0.7); margin-bottom: 1rem;">
                            <form method="post" action="<?=site_url('Profile/update_basic/');?>" enctype="multipart/form-data" style="margin-top: 1rem;">
                              <div class="col-lg-6 col-md-6">
                                <label for="uUserName">UserName:</label>
                                <div class="form-field">
                                  <i class="fa fa-user"></i>
                                  <input class="web placeholder" type="text" placeholder="Username" name="uUserName" id="uUserName" value="<?=$user_data[0]->UserName?>">
                                  <?php
                                  echo form_error('uUserName');
                                  ?>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                <label for="uUserEmail">Email:</label>
                                <div class="form-field">
                                  <i class="fa fa-envelope-o"></i>
                                  <input class="web placeholder" type="text" placeholder="Email" name="uUserEmail" id="uUserEmail" value="<?=$user_data[0]->UserEmail?>">
                                  <?php
                                  echo form_error('uUserEmail');
                                  ?>
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-12">
                                <label for="uUserContactNo">Contact No:</label>
                                <div class="form-field">
                                  <i class="fa fa-phone"></i>
                                  <input class="web placeholder" type="text" placeholder="Contact No." name="uUserContactNo" id="uUserContactNo" value="<?=$user_data[0]->UserContactNo?>">
                                  <?php
                                  echo form_error('uUserContactNo');
                                  ?>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                <label for="uStateId">State:</label>
                                <div class="form-field">
                                  <div class="select-box">
                                    <select name="uStateId" id="uStateId">
                                      <?php
                                      foreach($states as $st)
                                      {
                                        ?>
                                        <option value="<?=$st->StateId?>" <?php
                                        if($st->StateId==$user_data[0]->StateId)
                                        {
                                          ?>
                                          selected="true";
                                          <?php                                    
                                        }
                                        ?>><?=$st->StateName?></option>
                                        <?php
                                      }
                                      ?>  
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <script type="text/javascript">
                                $(function(){
                                  $('#uStateId').on('change',function(){
                                    $.ajax({
                                      url:'<?=site_url("Profile/get_city/");?>'+$(this).val(),
                                      success:function(result){
                                        $('#uCityId').html(result);
                                      }
                                    });
                                  });
                                });
                              </script>
                              <div class="col-lg-6 col-md-6">
                                <label for="uCityId">City:</label>
                                <div class="form-field">
                                  <div class="selected-box">
                                    <select name="uCityId" id="uCityId">
                                      <?php
                                      foreach($cities as $ct)
                                      {
                                        ?>
                                        <option value="<?=$ct->CityId?>" <?php
                                        if($ct->CityId==$user_data[0]->CityId)
                                        {
                                          ?>
                                          selected="true";
                                          <?php                                    
                                        }
                                        ?>><?=$ct->CityName?></option>
                                        <?php
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="submit-button">
                                  <button class="button form-field col-lg-4 text-center">Update Basic Info</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="col-md-12" style="box-shadow: 0 0 2px 1px rgba(0,0,0,0.2); background-color: rgba(0,0,0,0.7); margin-bottom: 1rem;">
                            <form method="post" action="<?=site_url('Profile/update_password/');?>" enctype="multipart/form-data" style="margin-top: 1rem;">
                              <div class="col-lg-12 col-md-12">
                                <label for="uUserPasswordOld">Current Password:</label>
                                <div class="form-field">
                                  <i class="fa fa-lock"></i>
                                  <input class="web placeholder" type="password" placeholder="Password" name="uUserPasswordOld" id="uUserPasswordOld">
                                  <?php
                                  echo form_error('uUserPasswordOld');
                                  if(isset($error))
                                    echo $error;
                                  ?>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                <label for="uUserPasswordNew">New Password:</label>
                                <div class="form-field">
                                  <i class="fa fa-lock"></i>
                                  <input class="web placeholder" type="password" placeholder="Confirm Password" id="uUserPasswordNew" name="uUserPasswordNew">
                                  <?php
                                  echo form_error('uUserPasswordNew');
                                  ?>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                <label for="uUserPasswordNewC">New Password:</label>
                                <div class="form-field">
                                  <i class="fa fa-lock"></i>
                                  <input class="web placeholder" type="password" placeholder="Confirm Password" id="uUserPasswordNewC" name="uUserPasswordNewC">
                                  <?php
                                  echo form_error('uUserPasswordNewC');
                                  ?>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="submit-button">
                                  <button class="button form-field col-lg-4 text-center">Update Password</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="col-md-12" style="box-shadow: 0 0 2px 1px rgba(0,0,0,0.2); background-color: rgba(0,0,0,0.7); margin-bottom: 1rem;">
                            <form method="post" action="<?=site_url('Profile/update_profile/');?>" enctype="multipart/form-data" style="margin-top: 1rem;">
                              <div class="col-lg-6 col-md-6">
                                <div class="form-field">
                                  <label for="uUserImage">Select Profile Pic</label>
                                </div>
                                <input type="file" id="uUserImage" name="uUserImage">
                                <div class="form-field">
                                  <img src="<?=base_url('/resource/user/image/'),$user_data[0]->UserImage;?>" height="100px" weight="100px" id="uUserImageDisplay" style="border-radius: 25px;">
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                <div class="form-field">
                                  <label for="uUserCover">Select Cover Pic</label>
                                </div>
                                <input type="file" id="uUserCover" name="uUserCover">
                                <div class="form-field">
                                  <img src="<?=base_url('/resource/user/image/'),$user_data[0]->UserCoverImage;?>" height="100px" weight="100px" id="uUserCoverDisplay" style="border-radius: 25px;">
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="submit-button">
                                  <button class="button form-field col-lg-4 text-center">Update Images</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                </div>
              </div>
              <div id="Followers" class="tab-pane fade">
                <div class="container">
                  <div style="border-bottom: 0.3rem solid #E1541F;">
                    <font style="font-size: 5rem;font-family: 'Amatic SC', cursive;">
                      <center>Followers</center>
                    </font>
                  </div>
                  <div class="row">
                    <?php
                    foreach ($user_followers_follow as $flwr)
                    {
                      ?>
                      <div class="col-md-4">
                        <div class="card flwcard">
                          <div class="image flwbgimg" style="background-image: url(<?= base_url('resource/user/image/'.$flwr->UserCoverImage);?>); ">
                            <img src="<?= base_url('resource/user/image/'),$flwr->UserImage;?>" class="flwimg">
                          </div>
                          <div class="text-content flwcont">
                            <p class="text-center flwuname"><a href="<?=site_url('Profile/index/').$flwr->FollowerId;?>"><?=$flwr->UserName?></a></p>
                          </div>
                          <div class="text-content text-center flwptog" style="padding:3px;padding-bottom: 13px" id="F-<?=$flwr->FollowId;?>">
                            <?php
                            if($user_data[0]->UserId==$this->ss->UserId)
                            {
                              ?>
                              <button class="btn mybtn3" id="follow-<?=$flwr->FollowerId;?>">Follow</button>
                              <?php
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                    ?>

                    <?php
                    foreach ($user_followers_unfollow as $flwr)
                    {
                      ?>
                      <div class="col-md-4">
                        <div class="card flwcard">
                          <div class="image flwbgimg" style="background-image: url(<?= base_url('resource/user/image/'.$flwr->UserCoverImage);?>); ">
                            <img src="<?= base_url('resource/user/image/'),$flwr->UserImage;?>" class="flwimg">
                          </div>
                          <div class="text-content flwcont">
                            <p class="text-center flwuname"><a href="<?=site_url('Profile/index/').$flwr->FollowerId;?>"><?=$flwr->UserName?></a></p>
                          </div>
                          <?php
                          if($user_data[0]->UserId==$this->ss->UserId)
                          {
                            ?>
                            <div class="text-content text-center flwptog" style="padding:3px;padding-bottom: 13px" id="F-<?=$flwr->FollowId;?>">
                              <?php
                              if($user_data[0]->UserId==$this->ss->UserId)
                              {
                                ?>
                                <button class="btn mybtn2" id="follow-<?=$flwr->FollowerId;?>">Unfollow</button>
                                <?php
                              }
                              ?>
                            </div>
                            <?php
                          }
                          ?>
                        </div>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div id="Following" class="tab-pane fade">
                <div class="container">
                  <div style="border-bottom: 0.3rem solid #E1541F;">
                    <font style="font-size: 5rem;font-family: 'Amatic SC', cursive;">
                      <center>Following</center>
                    </font>
                  </div>
                  <div class="row">
                    <?php
                    foreach ($user_following as $flwg)
                    {
                      ?>
                      <div class="col-md-4">
                        <style type="text/css">

                      </style>
                      <div class="card flwcard">
                        <div class="image flwbgimg" style="background-image: url(<?= base_url('resource/user/image/'.$flwg->UserCoverImage);?>); " >
                          <img src="<?= base_url('resource/user/image/'),$flwg->UserImage;?>" class="flwimg">
                        </div>
                        <div class="text-content flwcont">
                          <style type="text/css">

                        </style>
                        <p class="text-center flwuname"><a href="<?=site_url('Profile/index/').$flwg->UserId;?>"><?=$flwg->UserName?></a></p>
                      </div>
                      <?php
                      if($user_data[0]->UserId==$this->ss->UserId)
                      {
                        ?>
                        <div class="text-content text-center flwptog" style="padding:3px;padding-bottom: 13px" id="F-<?=$flwg->FollowId;?>">
                          <?php
                          if($user_data[0]->UserId==$this->ss->UserId)
                          {
                            ?>
                            <button class="btn mybtn2" id="follow-<?=$flwg->UserId;?>">Unfollow</button>
                            <?php
                          }
                          ?>
                        </div>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
          <div id="Recipe" class="tab-pane fade">
            <div class="container">
              <div style="border-bottom: 0.3rem solid #E1541F;">
                  <font style="font-family: 'Amatic SC', cursive;">
                    <span style="margin-left:50rem;margin-bottom: 0rem;font-size: 4.5rem;">Recipe</span>
                    <?php
                      if ($user_id==$this->ss->UserId) {
                    ?>
                    <a href="<?=site_url('/Recipe_user/upload_recipe');?>"><button class="btn btn-lg" style="margin-bottom: 2.5rem;float: right;background-color: #17202A;width: 15rem;font-size: 2rem;font-weight: bold;">Upload Recipe<i class="fa fa-cutlery" style="margin-left: 1rem;font-size: 1.5rem;"></i></button></a>
                    <?php
                      }
                    ?>
                  </font>
              </div>

              <section>
                  <div class="container">
                    <div class="row" style="margin-top: 3rem;">
                      <div class="col-md-12 contact-form white-bg">
                        <table id="recipe_table" class="">
                          <thead>
                            <tr>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            foreach ($recipe_data as $r) {
                          ?>
                          <tr class="col-md-4" id="rec-<?=$r->RecipeId;?>">
                            <th>
                              <div class="col-md-12" style="margin-bottom: 2rem;">
                                <div>
                                  <?php
                                    if ($user_id==$this->ss->UserId) {
                                  ?>
                                  <div id="div_img" class="blog-entry-image">
                                      <img class="" alt="" class="image-item" src="<?=base_url('/resource/user/image/'),$r->RecipeImage?>" height="250rem" width="350rem">
                                      <div class="show-dlt" style="">
                                       
                                        <button class="btn btn-md rec-dlt" id="<?=$r->RecipeId;?>" title="Delete"><i class="fa fa-trash"></i></button>
                                       
                                       <a href="<?=site_url('/Recipe_user/get_recipe_info/').$r->RecipeId;?>">
                                        <button class="btn btn-md rec-upd" title="Edit Recipe"><i class="fa fa-pencil"></i></button>
                                       </a>
                                      </div>
                                      <div class="entry-date" style="width: 15rem;height: 5rem;">
                                        <!-- <?=substr($r->RecipeCreatedDate,8,2);?><span>NAV</span> -->
                                        <font style="font-size: 1.5rem;vertical-align: top;">
                                          <?=date('d-M-Y', strtotime($r->RecipeCreatedDate));?>
                                          </font>
                                      </div>
                                  </div>
                                  <?php
                                    }
                                    else
                                    {
                                  ?>
                                  <div class="blog-entry-image">
                                      <img class="" alt="" class="image-item" src="<?=base_url('/resource/user/image/'),$r->RecipeImage?>" height="250rem" width="350rem">
                                      <div class="entry-date" style="width: 15rem;height: 5rem;">
                                        <font style="font-size: 1.5rem;vertical-align: top;">
                                          <?=date('d-M-Y', strtotime($r->RecipeCreatedDate));?>
                                          </font>
                                      </div>
                                  </div>

                                  <?php
                                    }
                                  ?>
                                  
                                  <div class="entry-content" id="box1" style="border: 1px solid #D5DBDB;width:94.5%;">
                                    <div class="entry-title">
                                      <h3><a href="<?=site_url('/Recipe_user/index/'.$r->RecipeId);?>"><?=$r->RecipeTitle;?></a></h3>
                                    </div>
                                    <div class="entry-meta">
                                      <div>
                                        <a><i class="fa fa-heart"></i>
                                        <?php
                                          $cnt=0;
                                          foreach($recipe_like as $l){
                                              if ($r->RecipeId==$l->RecipeId) {
                                                  $cnt++;
                                              } 
                                            }
                                            echo $cnt;
                                        ?>
                                        </a>
                                        <a><i class="fa fa-comments-o"></i>
                                        <?php
                                          $cnt=0;
                                          foreach($recipe_comment as $c){
                                              if ($r->RecipeId==$c->RecipeId) {
                                                  $cnt++;
                                              } 
                                            }
                                            echo $cnt;
                                        ?>
                                        </a>
                                        <a><i class="fa fa-star"></i>
                                          <?php
                                            $tot_rate=0;
                                            foreach ($recipe_rate as $rr) {
                                              if ($rr->RecipeId==$r->RecipeId) {
                                                $tot_rate++;
                                              }
                                            }
                                            if ($tot_rate==0)
                                            {
                                              echo 0;
                                            }
                                            else
                                            {
                                              $cnt_rate=0;
                                              foreach ($recipe_rate as $rr) {
                                                if ($rr->RecipeId==$r->RecipeId) {
                                                  $cnt_rate=$cnt_rate + $rr->Rate;
                                                }
                                              }
                                              
                                              echo number_format($cnt_rate/$tot_rate ,1);
                                            }
                                          ?>
                                        </a>

                                        <a><i class="fa fa-eye"></i>
                                        <?php
                                          $cnt=0;
                                          foreach($recipe_view as $v){
                                              if ($r->RecipeId==$v->RecipeId) {
                                                  $cnt++;
                                              } 
                                            }
                                            echo $cnt;
                                        ?>
                                        </a>     
                                      </div>
                                      <div style="margin-top: 1rem;">

                                      </div>
                                    </div>
                                    <div class="entry-description">
                                      <p style="height:120px;word-break: break-all;"><?=substr(strip_tags($r->RecipeDescription),0,200);?>(...)</p> 
                                    </div>  
                                    <div class="entry-share clearfix">
                                      <div class="entry-meta">
                                        <a href="#"><i class="fa fa-user"></i>
                                         By <?=$r->UserName;?></a>
                                      </div>
                                      <div class="social list-style-none pull-right">
                                        <a href="<?=site_url('/Recipe_user/index/'),$r->RecipeId;?>">
                                          <button class="mybtn1" style="border:none;padding: 10px;border-radius: 5px;border:1px solid white;color: #D35400;">
                                            Read More<i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                          </button>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </th>
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
                </section>
            </div>
          </div>
          <div id="Article" class="tab-pane fade">
            <div class="container">
              <div style="border-bottom: 0.3rem solid #E1541F;">
                  <font style="font-family: 'Amatic SC', cursive;">
                    <span style="margin-left:50rem;margin-bottom: 0rem;font-size: 4.5rem;">Article</span>
                    <?php
                      if ($user_id==$this->ss->UserId) {
                    ?>
                    <a href="<?=site_url('/Article_user/upload_article');?>"><button class="btn btn-lg" style="margin-bottom: 2.5rem;float: right;background-color: #17202A;width: 15rem;font-size: 2rem;font-weight: bold;">Upload Article<i class="fa fa-newspaper-o" style="margin-left: 1rem;font-size: 1.5rem;"></i></button></a>
                    <?php
                      }
                    ?>
                  </font>
              </div>

              <section>
                  <div class="container">
                    <div class="row" style="margin-top: 3rem;">
                      <div class="col-md-12 contact-form white-bg">
                      <?php
                        if (empty($article_data)) {
                      ?>
                        <p style="font-family: 'Amatic SC', cursive;color: black;font-size: 5rem;text-align: center;margin:3rem;">No Data Available</p>
                      <?php
                        }
                        else
                        {
                      ?>
                        <table id="article_table" class="">
                          <thead>
                            <tr>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            foreach ($article_data as $a) {
                          ?>
                          <tr class="col-md-4" id="art-<?=$a->ArticleId;?>">
                            <th>
                              <div class="col-md-12" style="margin-bottom: 2rem;">
                                <div>
                                  <?php
                                    if ($user_id==$this->ss->UserId) {
                                  ?>
                                  <div id="div_img" class="blog-entry-image">
                                      <img class="" alt="" class="image-item" src="<?=base_url('/resource/user/image/'),$a->FeaturedImage?>" height="250rem" width="350rem">
                                      <div class="show-dlt" style="">
                                       
                                        <button class="btn btn-md art-dlt" id="<?=$a->ArticleId;?>" title="Delete"><i class="fa fa-trash"></i></button>
                                       
                                       <a href="<?=site_url('/Article_user/get_article_info/').$a->ArticleId;?>">
                                        <button class="btn btn-md art-upd" title="Edit Article"><i class="fa fa-pencil"></i></button>
                                       </a>
                                      </div>
                                      <div class="entry-date" style="width: 15rem;height: 5rem;">
                                        <!-- <?=substr($r->RecipeCreatedDate,8,2);?><span>NAV</span> -->
                                        <font style="font-size: 1.5rem;vertical-align: top;">
                                          <?=date('d-M-Y', strtotime($a->ArticleCreatedDate));?>
                                          </font>
                                      </div>
                                  </div>
                                  <?php
                                    }
                                    else
                                    {
                                  ?>
                                  <div class="blog-entry-image">
                                      <img class="" alt="" class="image-item" src="<?=base_url('/resource/user/image/'),$a->FeaturedImage?>" height="250rem" width="350rem">
                                      <div class="entry-date" style="width: 15rem;height: 5rem;">
                                        <font style="font-size: 1.5rem;vertical-align: top;">
                                          <?=date('d-M-Y', strtotime($a->ArticleCreatedDate));?>
                                          </font>
                                      </div>
                                  </div>

                                  <?php
                                    }
                                  ?>
                                  
                                  <div class="entry-content" id="box1" style="border: 1px solid #D5DBDB;width:94.5%;">
                                    <div class="" style="height: 80px;">
                                      <h3>
                                        <a href="<?=site_url('/Article_user/index/'),$a->ArticleId;?>">
                                        
                                        <?php
                                          if (strlen($a->ArticleTitle)>38) {
                                        ?>
                                          <?=substr($a->ArticleTitle,0,40).'...';?>
                                        <?php  
                                          }
                                          else
                                          {
                                        ?>
                                          <?=$a->ArticleTitle;?>
                                        <?php
                                          }
                                        ?>
                                        </a>
                                      </h3>
                                    </div>
                                    <div class="entry-meta">
                                      <div>
                                        <a><i class="fa fa-heart"></i>
                                        <?php
                                          $cnt=0;
                                          foreach($article_like as $l){
                                              if ($a->ArticleId==$l->ArticleId) {
                                                  $cnt++;
                                              } 
                                            }
                                            echo $cnt;
                                        ?>
                                        </a>
                                        <a><i class="fa fa-comments-o"></i>
                                        <?php
                                          $cnt=0;
                                          foreach($article_comment as $c){
                                              if ($a->ArticleId==$c->ArticleId) {
                                                  $cnt++;
                                              } 
                                            }
                                            echo $cnt;
                                        ?>
                                        </a>  

                                        <a><i class="fa fa-eye"></i>
                                        <?=$a->NumberOfViews?></a>
                                      </div>
                                      <div style="margin-top: 1rem;">

                                      </div>
                                    </div>
                                    <div class="entry-description">
                                      <p style="height:120px;word-break: break-all;"><?=substr(strip_tags($a->ArticleDescription),0,200);?>(...)</p> 
                                    </div>  
                                    <div class="entry-share clearfix">
                                      <div class="entry-meta">
                                        <a href="#"><i class="fa fa-user"></i>
                                         By <?=$a->UserName;?></a>
                                      </div>
                                      <div class="social list-style-none pull-right">
                                        <a href="<?=site_url('/Article_user/index/'),$a->ArticleId;?>">
                                          <button class="mybtn1" style="border:none;padding: 10px;border-radius: 5px;border:1px solid white;color: #D35400;">
                                            Read More<i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                          </button>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </th>
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
                        ?>
                      </div>
                    </div>
                  </div>
                </section>
                
            </div>
          </div>
          <?php
          if($user_data[0]->UserId==$this->ss->UserId)
          {
            ?>
            <!-- <div id="Activities" class="tab-pane fade">
              <div class="container">
                <p>Activities ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div> -->
            <div id="History" class="tab-pane fade">
              <div class="container" style="margin-top: 2rem;">
                <div style="border-bottom: 0.3rem solid #E1541F;">
                  <font style="font-family: 'Amatic SC', cursive;">
                    <span style="margin-left:50rem;margin-bottom: 0rem;font-size: 4.5rem;">History</span>
                    <a><button id="clr-history" class="btn btn-lg" style="margin-bottom: 2.5rem;float: right;background-color: #17202A;width: 15rem;font-size: 2rem;font-weight: bold;">Clear History</button></a>
                  </font>
                </div>
                <?php
                  if(count($history_data)>0)
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
                            foreach ($history_data as $hd)
                            {
                          ?>
                              <tr style="" id="hv-<?=$hd->historyId?>">
                                <td style="margin-top: 2rem;border-top:none;">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <video controls class="history-video">
                                        <source src="<?=base_url('resource/user/image/').$hd->VideoUrl;?>" type="video/mp4">
                                      </video>
                                    </div>
                                    <div class="col-md-8" style="padding:10px;">
                                        <a href="<?=site_url('Recipe_user/index/'.$hd->RecipeId);?>"><h3 class="mt-0 mb-5"><?=$hd->RecipeTitle;?></h3></a>
                                      <p style="word-break: break-all;">
                                        <b>Video Description: </b><?=substr(strip_tags($hd->RecipeDescription),0,200);?>(...)
                                      </p>
                                      <p>
                                        <button class="button btn-history-dlt" id="<?=$hd->historyId;?>">Remove From History</button>
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
                      No History Available
                    </div>
                <?php
                  }
                ?>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </section>
      <script type="text/javascript">
        $(function(){
          $('#uUserImage').on('change',function(e){
            var imgsrc=URL.createObjectURL(e.target.files[0])
            /*$("#uAdminImage").val().replace(/C:\\fakepath\\/i, '');*/
            $('#uUserImageDisplay').attr('src',imgsrc);
          });
          $('#uUserCover').on('change',function(e){
            var imgsrc=URL.createObjectURL(e.target.files[0])
            /*$("#uAdminImage").val().replace(/C:\\fakepath\\/i, '');*/
            $('#uUserCoverDisplay').attr('src',imgsrc);
          });
        });
      </script>
      <script type="text/javascript">
        $(function(){
          $('div.text-content.text-center.flwptog').on('click','button',function(){
            $this=this;
            $.ajax({
              url:'<?=site_url("/Profile/follow2/")?>'+$(this).attr('id'),
              success:function(result)
              {
                $($this).parent().html(result);
              }
            });
          });
        });
      </script>
      <script type="text/javascript">
        $(function(){
          $('.btn-history-dlt').on('click',function(){
            $this=($(this).attr("id"));
            $.ajax({
              url:'<?=site_url("/Profile/dlt_history/")?>'+$(this).attr("id"),
              success:function()
              {
                $('#hv-'+$this).remove();
              }
            });
          });
        });
      </script>
      <script type="text/javascript">
        $(function(){
          $('#clr-history').on('click',function(){
            if(confirm('Are you sure you want to clear history?')){
              $.ajax({
                url:'<?=site_url("/Profile/clr_history/")?>',
                success:function()
                {
                  $('#tbl-history').remove();
                }
              });
            }
            else
            {
              return false;
            }
          });
        });
      </script>
      <script type="text/javascript">
        $(function(){
          $('div.text-content.text-center.flwptog2').on('click','button',function(){
            $this=this;
            $.ajax({
              url:'<?=site_url("/Profile/follow3/")?>'+$(this).attr('id'),
              success:function(result)
              {
                $($this).parent().html(result);
              }
            });
          });
        })
      </script>
      <script type="text/javascript">
  $(document).ready( function () {
      $('#recipe_table').DataTable({
        responsive:true
      
      });
  });

  $(document).ready( function () {
      $('#article_table').DataTable({
        responsive:true
      
      });
  });


  $(function(){
    $('.rec-dlt').on('click',function(){
      $this=($(this).attr("id"));
      if(confirm("Are You Sure You Want To Delete This Recipe?"))
      {
        $.ajax({
          url:'<?=site_url("Recipe_user/delete_recipe/")?>'+$(this).attr("id"),
          success:function()
          {
            $('#rec-'+$this).remove();
          }
        });
      }
    });
  });

  $(function(){
    $('.art-dlt').on('click',function(){
      $this=($(this).attr("id"));
      $.ajax({
        url:'<?=site_url("Article_user/delete_article/")?>'+$(this).attr("id"),
        success:function()
        {
          $('#art-'+$this).remove();
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(function(){
    $('#btn-report-user').on('click',function(){
      $('#div-report-user').toggle(500);
    });
  });
</script>
<!--=================================
testimonials -->
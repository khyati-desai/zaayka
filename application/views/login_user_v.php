<?php
    $sp=base_url('resource/user/login/');
    $rp=base_url('resource/user/asset/');
?>
<section class="reservation-form contact-form dark page-section-ptb parallax bg-overlay-black-80" style="background-image: url(<?=$rp;?>images/bg/02.jpg);">
  <div class="container" id="main1">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title text-center">
          <div class="title-separator">
            <i class="glyph-icon flaticon-food-27"></i>
          </div>
          <h2 class="text-white"> <span class="text-orange">The Zayka</span> Login</h2>
          <p class="text-white">tag line...</p>
        </div>
      </div>
    </div>
    <div class="row row-eq-height">
      <div class="col-lg-4 col-md-5 pl-0 pr-0">
        <div class="reservation-image form-image">
          <img class="img-responsive" src="<?=$rp;?>images/event/07.jpg" alt="">
        </div>
      </div>
      <div class="col-lg-8 col-md-7 col-sm-12 pl-0 pr-0 white-bg">
        <form class="row" method="post" action="<?=site_url('Login_user/do_login/');?>">
          <div class="col-lg-12 col-md-12">
            <h3 class="mb-30">Login Form</h3>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="form-field">
              <i class="fa fa-envelope"></i>
              <input class="web placeholder" type="text" placeholder="Email or Contact No. or Username..." name="sUserName" id="sUserName">
              <?php
                echo form_error('sUserName');
              ?>
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="form-field">
              <i class="fa fa-lock"></i>
              <input class="web placeholder" type="password" placeholder="Password..." name="sUserPassword" id="sUserPassword">
              <?php
                echo form_error('sUserPassword');
              ?>
            </div>
          </div>
          <div class="col-lg-12">
            <?php
            if (isset($error)) {
              echo $error;
            }
            ?>
          </div>
          <div class="col-lg-12">
            <div class="submit-button">
              <button class="button form-field col-lg-2 text-center">Login</button>
            </div>
          </div> 
          <div class="col-lg-12">
            <div class="submit-button">
              <span>Don't have an account?</span>
              <a style="margin-top: 0.9rem;" href="#" id="flipToMain2">Register</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="container" id="main2" hidden="true">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title text-center">
          <div class="title-separator">
            <i class="glyph-icon flaticon-food-27"></i>
          </div>
          <h2 class="text-white"> <span class="text-orange">The Zayka</span> Reservation</h2>
          <p class="text-white">We provide free, secure and instantly confirmed online reservation.</p>
        </div>
      </div>
    </div>
    <div class="row row-eq-height">
      <div class="col-lg-4 col-md-5 pl-0 pr-0">
        <div class="reservation-image form-image">
          <img class="img-responsive" src="<?=$rp;?>images/event/07.jpg" alt="">
        </div>
      </div>
      <div class="col-lg-8 col-md-7 col-sm-12 pl-0 pr-0 white-bg">
        <form class="row" method="post" action="<?=site_url('Login_user/add_user/');?>" enctype="multipart/form-data">
          <div class="col-lg-12 col-md-12">
            <h3 class="mb-30">Registration Form</h3>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="form-field">
              <i class="fa fa-user"></i>
              <input class="web placeholder" type="text" placeholder="Username" name="aUserName">
              <?php
                echo form_error('aUserName');
              ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="form-field">
              <i class="fa fa-envelope-o"></i>
              <input class="web placeholder" type="text" placeholder="Email" name="aUserEmail">
              <?php
                echo form_error('aUserEmail');
              ?>
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="form-field">
              <i class="fa fa-phone"></i>
              <input class="web placeholder" type="text" placeholder="Contact No." name="aUserContactNo">
              <?php
                echo form_error('aUserContactNo');
              ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="form-field">
              <i class="fa fa-lock"></i>
              <input class="web placeholder" type="password" placeholder="Password" name="aUserPassword">
              <?php
                echo form_error('aUserPassword');
              ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="form-field">
              <i class="fa fa-lock"></i>
              <input class="web placeholder" type="password" placeholder="Confirm Password" name="aUserPasswordC">
              <?php
                echo form_error('aUserPasswordC');
              ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="form-field">
              <div class="select-box">
                <select name="aStateId" id="aStateId">
                  <?php
                    foreach($stdata as $st)
                    {
                  ?>
                        <option value="<?=$st->StateId?>"><?=$st->StateName?></option>
                  <?php
                    }
                  ?>  
                </select>
              </div>
            </div>
          </div>
          <script type="text/javascript">
              $(function(){
                $('#aStateId').on('change',function(){
                  $.ajax({
                    url:'<?=site_url("Login_user/get_city/");?>'+$(this).val(),
                    success:function(result){
                      $('#aCityId').html(result);
                    }
                  });
                });
              });
          </script>
          <div class="col-lg-6 col-md-6">
            <div class="form-field">
              <div class="selected-box">
                <select name="aCityId" id="aCityId">
                  <?php
                    foreach($ctdata as $ct)
                    {
                  ?>
                        <option value="<?=$ct->CityId?>"><?=$ct->CityName?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="form-field">
              <label for="aUserImage">Select Profile Pic</label>
            </div>
              <input type="file" id="aUserImage" name="aUserImage">
            <div class="form-field">
              <img src="<?=base_url('/resource/user/image/'),'default.jpg';?>" height="100px" weight="100px" id="aUserImageDisplay" style="border-radius: 25px;">
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="form-field">
              <label for="aUserCover">Select Cover Pic</label>
            </div>
              <input type="file" id="aUserCover" name="aUserCover">
            <div class="form-field">
              <img src="<?=base_url('/resource/user/image/'),'coverdefault.jpg';?>" height="100px" weight="100px" id="aUserCoverDisplay" style="border-radius: 25px;">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="submit-button">
              <button class="button form-field col-lg-2 text-center">Register</button>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="submit-button">
              <span>Already a member?</span>
              <a style="margin-top: 0.9rem;" href="#" id="flipToMain1">Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
    $(function() {
        $('#flipToMain2').on('click',function(){
            $('#main1').hide();
            $('#main2').show();
        });
        $('#flipToMain1').on('click',function(){
            $('#main2').hide();
            $('#main1').show();
        });
    });
</script>
<script type="text/javascript">
  $(function(){
    $('#aUserImage').on('change',function(e){
      var imgsrc=URL.createObjectURL(e.target.files[0])
      /*$("#uAdminImage").val().replace(/C:\\fakepath\\/i, '');*/
      $('#aUserImageDisplay').attr('src',imgsrc);
    });
    $('#aUserCover').on('change',function(e){
      var imgsrc=URL.createObjectURL(e.target.files[0])
      /*$("#uAdminImage").val().replace(/C:\\fakepath\\/i, '');*/
      $('#aUserCoverDisplay').attr('src',imgsrc);
    });
  });
</script>
<script type="text/javascript">
  $(function(){
    <?php
      if(isset($regis_error))
      {
    ?>
        $('#flipToMain2').trigger('click');
    <?php
      }
    ?>
  });
</script>
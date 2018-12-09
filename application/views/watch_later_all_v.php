<?php
$rp=base_url('resource/user/asset/');
?>

<style type="text/css">
.recipebgimg{
  height: 40rem;
}

.btndrop{
  background-color: #e93e21;
  color: white;
  border-radius: 5px;
}

.form-field input[type=text]:not(.browser-default):focus{
  /*background-color: yellow;*/
  border-bottom:1px solid #e93e21;
  border-width: .2rem;
  box-shadow: 0 1px 0 0 rgba(0,0,0,.2);
}

.form-field input[type=text]{
  border:none;
  border-bottom: 1px solid #9e9e9e;
  outline: none;
  border-width: .2rem;
  transition: all .5s ease;
}

.saved-btn{
  margin-top: 2rem;
  background-color: #17202A;
  font-size: 2.5rem;
  font-weight: bold;
  color: #e93e21;
  border-radius: 50%;
  outline:none;
  width:5rem;
  height: 5rem;
  transition: 0.2 ease;
}

.saved-btn:hover{
  color: #e93e21;
  height: 7rem;
  width: 7rem;
  font-size: 3.5rem;
}

.save-btn{
  margin-top: 2rem;
  background-color: #17202A;
  font-size: 2.5rem;
  font-weight: bold;
  color: white;
  border-radius: 50%;
  outline:none;
  width:5rem;
  height: 5rem;
  /*display: block;*/
  transition: 0.5s ease;
}

.save-btn:hover{
  color:white;
  height: 7rem;
  width: 7rem;
  font-size: 3.5rem;
}
</style>

<!--=================================
  intro bg -->

  <div class="inner-intro parallax bg-overlay-black-70" style="background-image: url(<?=$rp;?>images/bg/03.jpg);">
    <div class="container">
      <div class="row text-center intro-title">
        <h1 class="text-orange">Watch Later</h1>
        <p class="text-white">We Know The Secret Of Your Success</p>

      </div>
    </div>
  </div>

<!--=================================
  intro bg -->

<!--=================================
  gallery -->

  <section class="gallery white-bg page-section-ptb">
    <div class="container" id="cat-contain">
      
    </div>
  </div>
  <div class="container"> 
    <div class="isotope popup-gallery columns-2" id="recipe-display">
      <?php
      foreach($recipes as $r)
      {
        ?>
        <div class="grid-item chinese mexican">
          <div class="galllery-item">
            <span><img class="img-responsive recipebgimg" src="<?=base_url('resource/user/image/'),$r->RecipeImage;?>" alt=""></span>
            <div class="overlay">
              <div class="overlay-content">
                <h3><a href="<?=site_url('Recipe_user/index/').$r->RecipeId;?>"><?=$r->RecipeTitle;?></a></h3>
                By <a href="<?=site_url('Profile/index/').$r->UserId?>"><?=$r->UserName;?></a>
                <br>
                On <b><?=$r->RecipeCreatedDate;?></b>
                <br>
                <div class="row class-save-btn-div" id="rv-<?=$r->RecipeId;?>">
                  <button class="saved-btn btn" style="outline: none;" title="Remove from WatchLater" id="<?=$r->RecipeId;?>">
                    <span class="fa fa-clock-o"></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</section>

<!--=================================
  gallery -->

<!-- <?php
//include_once('footer_user.php');
?> -->
<script type="text/javascript">
  $(function(){
    $(".class-save-btn-div").on('click','button',function(){
      //alert('hello');
      //alert($(this).attr("id"));
      $this=$(this).attr("id");
      $.ajax({
        url:'<?=site_url("/Recipe_user/wl_recipe/")?>'+$this,
        success:function(result)
        {
          $('#rv-'+$this).html(result);
        }
      });
    });
  });
</script>
<?php
$rp=base_url('resource/user/asset/');
?>

<style type="text/css">
.recipebgimg{
  height: 30rem;
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
</style>

<!--=================================
  intro bg -->

  <div class="inner-intro parallax bg-overlay-black-70" style="background-image: url(<?=$rp;?>images/bg/03.jpg);">
    <div class="container">
      <div class="row text-center intro-title">
        <h1 class="text-orange">Articles</h1>
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
      <form method="post" id="searchForm" action="<?=site_url('Article_user/display_article');?>">
        <div class="row" style="margin-top: 1rem;">
          <div class="col-md-6">
            <div class="form-field">
              <input class="web placeholder ip-search" type="text" placeholder="Search by UserName" name="sUserName">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-field">
              <input class="web placeholder ip-search" type="text" placeholder="Search by Title" name="sArticleTitle">
            </div>
          </div>
        </div> 
        <div class="row" style="margin-top: 1rem;">
          <div class="col-md-12">
            <button class="button btndrop pull-right col-md-12" style="box-shadow: 0 0 10px rgba(0,0,0,.2);" id="user-search" type="submit">
              Search
            </button>  
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="container"> 
    <div class="isotope popup-gallery columns-3" id="article-display">
      <?php
      foreach($articles as $r)
      {
        ?>
        <div class="grid-item chinese mexican">
          <div class="galllery-item">
            <span><img class="img-responsive recipebgimg" src="<?=base_url('resource/user/image/'),$r->FeaturedImage;?>" alt=""></span>
            <div class="overlay">
              <div class="overlay-content">
                <h3><a href="<?=site_url('/Article_user/index/'),$r->ArticleId;?>""><?=$r->ArticleTitle;?></a></h3>
                By <a href="<?=site_url('Profile/index/').$r->UserId?>"><?=$r->UserName;?></a>
                <br>
                On <b><?=$r->ArticleCreatedDate;?></b>
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
  var options = [];

  $( '.dropdown-menu a' ).on( 'click', function( event ) {

    var $target = $( event.currentTarget ),
    val = $target.attr( 'data-value' ),
    $inp = $target.find( 'input' ),
    idx;

    if ( ( idx = options.indexOf( val ) ) > -1 ) {
      options.splice( idx, 1 );
      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
    } else {
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
    }

    $( event.target ).blur();

    console.log( options );
    return false;
  });
</script>

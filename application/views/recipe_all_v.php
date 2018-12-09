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
        <h1 class="text-orange">Recipes</h1>
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
      <form method="post" id="searchForm" action="<?=site_url('Recipe_user/display_recipe');?>">
        <div class="row">
          <div class="col-md-6">
            <select id="sCategoryId" style="background:none;border:none;outline: none;border-bottom:1px solid #9e9e9e;" name="sCategoryId">
              <option value="-1" selected="true">Select a Category</option>
              <?php
              foreach($categories as $c)
              {
                ?>
                <option value="<?=$c->CategoryId?>"><?=$c->CategoryName?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <script type="text/javascript">
            $(function(){
              $('#sCategoryId').on('change',function(){
                $.ajax({
                  url:'<?=site_url("Recipe_user/get_subcategory/");?>'+$(this).val(),
                  success:function(result){
                    $('#sSubCategoryId').html(result);
                  }
                });
              });
            });
          </script>
          <div class="col-md-6" id="sSubCategoryId">
          </div>
        </div>
        <div class="row" style="margin-top: 1rem;">
          <div class="col-md-3">
            <div class="form-field">
              <input class="web placeholder ip-search" type="text" placeholder="Search by Title" name="sRecipeTitle">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-field">
              <input class="web placeholder ip-search" type="text" placeholder="Search by UserName" name="sUserName">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-field">
              <input class="web placeholder ip-search" type="text" placeholder="Search by Min Time" name="sMinTime">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-field">
              <input class="web placeholder ip-search" type="text" placeholder="Search by Max Time" name="sMaxTime">
            </div>
          </div>
        </div>
        <div class="row" style="margin-top: 1rem;">
          <div class="col-md-12">
            <button class="button btndrop pull-right col-md-12" style="box-shadow: 0 0 10px rgba(0,0,0,.2);" id="sub-search" type="submit">
              Search
            </button>  
          </div>
        </div>
      </form>
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
                  <?php
                    if($r->Count==0)
                    {
                  ?>
                      <button class="save-btn btn" style="outline: none;" title="Save" id="<?=$r->RecipeId;?>">
                        <span class="fa fa-bookmark"></span>
                      </button>
                  <?php
                    }
                    else
                    {
                  ?>
                      <button class="saved-btn btn" style="outline: none;" title="Remove from Saved" id="<?=$r->RecipeId;?>">
                        <span class="fa fa-bookmark"></span>
                      </button>
                  <?php
                    }
                  ?>
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
<script type="text/javascript">
  $(function(){
    $(".class-save-btn-div").on('click','button',function(){
      //alert('hello');
      //alert($(this).attr("id"));
      $this=$(this).attr("id");
      $.ajax({
        url:'<?=site_url("/Recipe_user/save_recipe/")?>'+$this,
        success:function(result)
        {
          $('#rv-'+$this).html(result);
        }
      });
    });
  });
</script>
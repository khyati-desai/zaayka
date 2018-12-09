<style type="text/css">
  #div_row
  {
    transition: .2s all ease;
    box-shadow: 3px 3px 10px rgba(0,0,0,.2);
  }

  #div_row:hover
  {
    box-shadow: 0px 0px 10px #FFAB91;
  }

</style>
<section>
  <div  style="background-color: black">
    <img src="<?=base_url('resource/user/asset/images/bg/01.jpg')?>" height="180" width="100%">
  </div>
  <?php

  ?>
  <!-- background-image: url(http://localhost/project2/zaayka/resource/user/asset/images/bg/01.jpg); -->
</section>
<section>
  <div class="container">
    <!-- <font style="font-size: 5rem;font-family: 'Amatic SC', cursive;">
      <a href="<?=$this->ss->last_url;?>"><button class="btb btn-lg" style="margin-bottom: 1rem;background-color: #17202A;width: 8rem;font-size: 2rem;font-weight: bold;float: left;margin-top: 2rem;"><< Back</button></a>
    </font> -->
    <div id="div_row" class="row col-md-8 col-md-offset-2" style="margin-bottom: 4rem;margin-top: 3rem;padding-bottom: 3rem;border-radius: 10px;">
      <div class="col-md-12" style="font-size: 4rem;font-family:'Amatic SC', cursive; margin-top: 4rem;margin-bottom: 5rem;text-align: center;">
        <span style="border-bottom: 1px solid white;box-shadow: 0px 0px 10px black;border-radius: 5%;width:30rem;padding: 1rem;">
          <i class="fa fa-cutlery" style="font-size:3.5rem;margin-right: 1.5rem;"></i>Edit Recipe</span>
      </div>
      <div class="col-md-12">
        <form action="<?=site_url('/Recipe_user/update_recipe/'),$recipe_data[0]->RecipeId;?>" method="POST" enctype="multipart/form-data" id="recipe_form" onsubmit="return add_recipe();">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12">
                <p style="color: gray;font-weight: bold;">Recipe Title </p>
                  <input type="" name="aRecipeTitle" id="aRecipeTitle" value="<?=$recipe_data[0]->RecipeTitle;?>" placeholder="Enter Recipe Title" style="border-bottom: 1px solid black;background-color: #FBF8F7;">
                <p id="err_recipe_title" style="display:none;color: red;font-weight: bold;">hiii</p>
              </div>

              <div class="col-md-12" style="margin-top: 3rem;">
                <p style="color: gray;font-weight: bold;">Write Your Recipe Description Here..</p>
                <textarea id="NicEdit" name="NicEdit" cols="80" rows="5"><?=$recipe_data[0]->RecipeDescription;?></textarea>
                <p id="err_recipe_desc" style="display:none;">hiii</p>
              </div>

              <div class="col-md-6" style="margin-top: 3rem;">
                <p style="color: gray;font-weight: bold;">Select Category</p>
                <select class="form-control" style="border-bottom: 1px solid black;background-color: #FBF8F7;" id="aCategoryId" name="aCategoryId">
                  <?php
                    foreach($cat as $c)
                    {
                  ?>
                      <option value="<?=$c->CategoryId?>"
                        <?php
                          if ($c->CategoryId==$sub_cats[0]->CategoryId) {
                            echo "selected";
                          }
                        ?>
                        ><?=$c->CategoryName?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="col-md-6" style="margin-top: 3rem;">
                <p style="color: gray;font-weight: bold;">Select Subcategory</p>
                <select class="form-control" style="border-bottom: 1px solid black;background-color: #FBF8F7;" id="aSubCategoryId" name="aSubCategoryId">
                  <?php
                    foreach($subcat as $s)
                    {
                  ?>
                      <option value="<?=$s->SubcategoryId?>"  
                        <?php
                          if ($s->SubcategoryId==$recipe_data[0]->SubcategoryId) {
                            echo "selected";
                          }
                        ?>
                        ><?=$s->SubCategoryName?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              
              <div class="col-md-6" style="margin-top: 3rem;">
                <p style="color: gray;font-weight: bold;">Average Time</p>
                <input type="" name="aRecipeTime" id="aRecipeTime" value="<?=$recipe_data[0]->AverageTime?>" placeholder="Enter Average Time" style="border-bottom: 1px solid black;background-color: #FBF8F7;">
                <p id="err_recipe_time" style="display:none;color: red;font-weight: bold;">hiii</p>
              </div>

              <div class="col-md-12" style="margin-top: 3rem;">
                <div class="col-md-6">
                  <div class="example-wrap">
                    <p style="color: gray;font-weight: bold;">Select Recipe Image</p>
                    <div class="example">
                      <input type="file" accept="image/*" id="aRecipeImage" name="aRecipeImage"
                      />
                    </div>
                    <div class="form-group">
                      <img src="<?=base_url('/resource/user/image/'),$recipe_data[0]->RecipeImage;?>" height="150rem" weight="150rem" id="aRecipeImageDisplay" style="border-radius: 5%;">
                    </div>
                  </div>
                </div>
                
              </div>

              <div class="col-md-12" style="margin-top: 3rem;">
                <center>
                  <button type="submit" name="submit_upload" id="submit_upload"  class="button">Submit Recipe</button>
                </center>
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>

  $(function(){
      $('#aRecipeImage').on('change',function(e){
        var imgsrc=URL.createObjectURL(e.target.files[0])
        $('#aRecipeImageDisplay').attr('src',imgsrc);
      });
    });

  $(function(){
      $('#aRecipeVideo').on('change',function(e){
        var imgsrc=URL.createObjectURL(e.target.files[0])
        /*$("#uAdminImage").val().replace(/C:\\fakepath\\/i, '');*/
        $('#aRecipeVideoDisplay').attr('src',imgsrc);
      });
    });
</script>
<script type="text/javascript">
  $(function(){
    // alert("okkkk");
    $('#aCategoryId').change(function(){
      $.ajax({
        url:'<?=site_url('Recipe_user/get_subcategory_upload/')?>'+$(this).val(),
        success:function(result){
          // alert(result);
          $('#aSubCategoryId').html(result);
        }
      });
    });
  });

  function add_recipe()
  { 
    var recipe_title= document.getElementById('aRecipeTitle').value;
    var recipe_time= document.getElementById('aRecipeTime').value;
    var flag=0;

    if (recipe_title.length==0) { 
      var msg_title=document.getElementById('err_recipe_title').innerHTML="Enter Title Please!!";
      err_recipe_title.style.display="block";
      flag=0;
      return false;
    }
    else if (recipe_title.length<3) {
      var msg_title=document.getElementById('err_recipe_title').innerHTML="Title Must Be atleast 3 Characters Long!!";
      err_recipe_title.style.display="block";      
      flag=0;
      return false; 
    }
    else
    {
      err_recipe_title.style.display="none";  
      flag=1;
    }


    if (recipe_time==0) {
      var msg_time=document.getElementById('err_recipe_time').innerHTML="Enter Time Please!!";
      err_recipe_time.style.display="block"; 
      flag=0;
      return false;
    }
    else if (isNaN(recipe_time)) {
      var msg_time=document.getElementById('err_recipe_time').innerHTML="Time Must Be Numeric!!";
      err_recipe_time.style.display="block"; 
      flag=0;
      return false;
    }
    else
    {
      err_recipe_time.style.display="none";  
      flag=1;
    }
     
    if (flag==1) {
    return confirm("Are You Sure You Want To Edit This Recipe?") ;
    }
  }
</script>
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
          <i class="fa fa-newspaper-o" style="font-size:3.5rem;margin-right: 1.5rem;"></i>Upload New Article</span>
      </div>
      <div class="col-md-12">
        <form action="<?=site_url('/Article_user/add_article/');?>" method="POST" enctype="multipart/form-data" id="article_form" onsubmit="return add_article();">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12">
              <p style="color: gray;font-weight: bold;">Article Title</p>
                <input type="" name="aArticleTitle" id="aArticleTitle" placeholder="Enter Article Title" style="border-bottom: 1px solid black;background-color: #FBF8F7;">
                <p id="err_article_title" style="display:none;color: red;font-weight: bold;">hiii</p>
              </div>

              <div class="col-md-12" style="margin-top: 3rem;">
                <p style="color: gray;font-weight: bold;">Write Your Description Here..</p>
                <textarea id="NicEdit" name="NicEdit" cols="80" rows="5">Some Sample Text</textarea>
                <p id="err_article_desc" style="display:none;">hiii</p>
              </div>

              <div class="col-md-12" style="margin-top: 3rem;">
                <div class="col-md-6">
                  <div class="example-wrap">
                    <!-- <label class="form-control-label" for="aRecipeImage" style="margin-bottom:2rem;">Select Recipe Image</label> -->
                    <div class="example">
                      <p style="color: gray;font-weight: bold;margin-bottom: 2rem;">Select Display Image</p>
                      <input type="file" accept="image/*" id="aArticleImage" name="aArticleImage"
                      />
                    </div>
                    <div class="form-group">
                      <img src="<?=base_url('/resource/user/image/'),'articledefault.jpg';?>" height="150rem" weight="150rem" id="aArticleImageDisplay" style="border-radius: 5%;">
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
      $('#aArticleImage').on('change',function(e){
        var imgsrc=URL.createObjectURL(e.target.files[0])
        $('#aArticleImageDisplay').attr('src',imgsrc);
      });
    });
</script>
<script type="text/javascript">
  
  function add_article()
  { 
    var article_title= document.getElementById('aArticleTitle').value;
    var flag=0;

    if (article_title.length==0) { 
      var msg_title=document.getElementById('err_article_title').innerHTML="Enter Title Please!!";
      err_article_title.style.display="block";
      flag=0;
      return false;
    }
    else if (article_title.length<3) {
      var msg_title=document.getElementById('err_article_title').innerHTML="Title Must Be atleast 3 Characters Long!!";
      err_article_title.style.display="block";      
      flag=0;
      return false; 
    }
    else
    {
      err_article_title.style.display="none";  
      flag=1;
    }

    if (flag==1) {
    return confirm("Are You Sure You Want To Post This Article?") ;
    }
  }
</script>
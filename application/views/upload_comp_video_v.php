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
    <div id="div_row" class="row col-md-8 col-md-offset-2" style="margin-bottom: 4rem;margin-top: 3rem;padding-bottom: 3rem;border-radius: 10px;">
      <div class="col-md-12" style="font-size: 4rem;font-family:'Amatic SC', cursive; margin-top: 4rem;margin-bottom: 5rem;text-align: center;">
        <span style="border-bottom: 1px solid white;box-shadow: 0px 0px 10px black;border-radius: 5%;width:30rem;padding: 1rem;">
          <i class="fa fa-cutlery" style="font-size:3.5rem;margin-right: 1.5rem;"></i>Upload Video</span>
        </div>
        <div class="col-md-12">
          <form action="<?=site_url('/Competition_user/add_video/'.$cid);?>" method="POST" enctype="multipart/form-data" id="video_form">
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12">
                  <p style="color: gray;font-weight: bold;">Video Title </p>
                  <input type="" name="aVideoTitle" id="aVideoTitle" placeholder="Enter Video Title" style="border-bottom: 1px solid black;background-color: #FBF8F7;">
                  <?php
                    echo form_error('aVideoTitle');
                  ?>
                </div>

                <div class="col-md-12" style="margin-top: 3rem;">
                  <p style="color: gray;font-weight: bold;">Write Your Description Here..</p>
                  <textarea id="NicEdit" name="NicEdit" cols="80" rows="5"></textarea>
                  <?php
                    echo form_error('NicEdit');
                  ?>
                </div>

                  <div class="col-md-6">
                    <div class="example-wrap">
                      <div class="example">
                        <p style="color: gray;font-weight: bold;margin-bottom: 2rem;">Select Video</p>
                        <input type="file" accept="video/*" id="aRecipeVideo" name="aRecipeVideo"
                        />
                      </div>
                      <div class="form-group">
                        <video id="aRecipeVideoDisplay" controls style="height: 200px; width: 200px;">
                          <source src="" type="video/mp4">
                          </video>                    
                        </div>
                      </div>
                      <div style="color: red">
                        <?php
                          if(isset($err))
                          {
                            echo $err;
                          }
                        ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12" style="margin-top: 3rem;">
                    <center>
                      <button type="submit" name="submit_upload" id="submit_upload"  class="button">Submit Video</button>
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
      $('#aRecipeVideo').on('change',function(e){
        var imgsrc=URL.createObjectURL(e.target.files[0])
        /*$("#uAdminImage").val().replace(/C:\\fakepath\\/i, '');*/
        $('#aRecipeVideoDisplay').attr('src',imgsrc);
      });
    });
</script>
</script>
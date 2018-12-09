<?php
$rp=base_url('resource/user/asset/');
// die($this->ss->UserId);
?>

<style type="text/css">
a
{
  cursor: pointer;
}
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
  background-color: white;
  color: #C0392B;;
  padding: 10px;
  cursor: pointer;
  font-weight: bold;
  border-radius: 5%;
}
.dataTables_paginate
{
  margin-top: 3rem;
}
#like_table_info ,#rate_table_info , #view_table_info
{
  display: none;
}  
#like_table_paginate ,  #rate_table_paginate ,#view_table_paginate
{
  float: right;
}
#like_table , #rate_table , #view_table
{
  table-layout: fixed;
}
#like_table th
{
  text-overflow: ellipsis;
}

#TArea
{
  transition: .2s all ease;
}

#TArea:hover
{
  box-shadow: 3px 3px 10px rgba(0,0,0,.2);
  border-color: red;
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

#txt_report:focus::-webkit-input-placeholder {
  color: red;
  font-weight: bold;
}

  .show-dlt{
    background:transparent;
    opacity: 0;
    transition: .2s all ease-in;
    height:32%;
    width:15%;
    position: absolute;
    top:0;
    left:10;
    right:0;
    overflow: hidden;
  }
    #div_img:hover img{
      transition: .5s all ease-in;
      opacity: .9;
    }

    #div_img:hover .entry-date{
      opacity: 1;
    }

    #div_img:hover .show-dlt
    {
      opacity:1;
    }

    .rec-dlt 
    {
      margin-top: 3rem;
      margin-left:8rem;
      border-radius: 50%;
      background-color: black;
      color: #e93e21;
      font-size: 2rem;
      outline: none;
    }
    .rec-upd 
    {
      margin-top:3rem;
      margin-left:8rem;
      border-radius: 50%;
      background-color: black;
      color: #e93e21;
      font-size: 2rem;
      outline: none;
    }

    .rec-dlt:hover 
    {
      color:black;
      background-color: #e93e21;
      transform: scale(1.5,1.5);
      outline: none;
    }

    .rec-upd:hover 
    {
      color:black;
      background-color: #e93e21;
      transform: scale(1.5,1.5);
      outline: none;
    }
</style>
<section> 
  <div  style="background-color: black">
    <img src="<?=base_url('resource/user/asset/images/bg/01.jpg')?>" height="180" width="100%">
  </div>
  <!-- background-image: url(http://localhost/project2/zaayka/resource/user/asset/images/bg/01.jpg); -->
</section>
<div class="container">
  <div style="border-bottom: 0.3rem solid #E1541F;margin-top: 3rem;margin-bottom: 0rem;">

    <font style="font-size: 5rem;font-family: 'Amatic SC', cursive;">
      <div class="row">
        <div class="col-md-12">
           <b><?=$article_data[0]->ArticleTitle;?></b>
         </div>
      </div>
    </font>
  </div>
</div>

<!-- Like Modal -->
<div class="modal fade" id="myModalLike" role="dialog">
  <div class="modal-dialog" id="modal_like">
  
  </div>
</div>
<!-- Like Modal end -->

<section class="blog blog-page page-section-ptb" style="padding-top: 2rem;">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="myclass1" style="margin-right: 3rem;">
        <div class="blog-entry border mb-50">
          <?php
            if ($article_data[0]->UserId==$this->ss->UserId) {
            ?>
          <div id="div_img" class="blog-entry-image">
            <img class="img-responsive" alt="" src="<?=base_url('resource/user/image/').$article_data[0]->FeaturedImage;?>" style="width:100%;height: 576px;">

              <div class="show-dlt" style="">     
                <div>
                  <form onsubmit="return delete_article();" action="<?=site_url('/Article_user/delete_article_read_more/').$article_data[0]->ArticleId;?>">
                    <button type="submit" class="btn btn-md rec-dlt" id="<?=$article_data[0]->ArticleId;?>" title="Delete"><i class="fa fa-trash"></i></button>
                  </form>
                </div>             
                <div>
                  <a href="<?=site_url('/Article_user/get_article_info/').$article_data[0]->ArticleId;?>">
                    <button class="btn btn-md rec-upd" title="Edit Article"><i class="fa fa-pencil"></i></button>
                  </a>
                </div>
              </div>
            
            <?php
            }
            else
            {
          ?>
            <div class="blog-entry-image">
            <img class="img-responsive" alt="" src="<?=base_url('resource/user/image/').$article_data[0]->FeaturedImage;?>" style="width:100%;height: 576px;">

          <?php
            }
          ?>
            <div class="entry-date" style="height: 5.5rem;width: 18rem;font-size: 2rem;">
              <?=date('d-M-Y', strtotime($article_data[0]->ArticleCreatedDate));?>
            </div>
          </div>  
          <div class="entry-content">
            <div class="entry-title" style="margin-bottom: 4rem;">
              <p>
                <a href="<?=site_url('/Profile/index/'),$article_data[0]->UserId;?>"><i class="fa fa-user" style="font-size: 2.5rem;margin-right: 0.5rem;color: black;"></i>  <span style="color: gray;font-family: 'Amatic SC', cursive;font-size: 2.5rem;">By   <?=$article_data[0]->UserName?></span></a>

                <span style="float: right;">
                  <?php
                  if ($article_data[0]->UserId!=$this->ss->UserId) {
                    if (!empty($article_report)) {
                      foreach ($article_report as $ap) {
                        if ($ap->UserId!=$this->ss->UserId) {
                          ?>
                          <span>
                            <a onclick="openreport();"><span style="color: red;font-size: 1.5rem;margin-left: 0.5rem;" ></i>Report Article</a>
                            </span>
                          </span>
                          <?php
                        }
                      }
                    }
                    else
                    {
                    ?>
                      <span>
                        <a onclick="openreport();">
                          <span style="color: red;font-size: 1.5rem;margin-left: 0.5rem;" ></i>Report Article</a>
                          </span>
                      </span>
                      <?php
                    }
                  }
                    ?>
                </p>
              </div>

              <!-- Report div -->
              <div id="div_report" class="col-md-12" style="display: none;background-color: #F8F5EC;margin-bottom: 3rem;">
                <div class="col-md-10" style="margin-top: 3rem;">
                  <h4 align="center">Report Article</h4>
                </div>
                <div style="float: right;margin-top: 3rem;" class="col-md-1">
                  <span onclick="closediv();" style="cursor: pointer;">x</span>
                </div>
                <div class="col-md-10 col-md-offset-1" style="margin-top:2rem; margin-bottom:4rem;margin-right: 8rem;">
                 <form action="<?=site_url('/Article_user/add_report/'),$article_data[0]->ArticleId?>" method="POST" onsubmit="return add_report();">
                   <ul class="list-unstyled">
                     <li><label><input type="radio" name="rep" id="r1" value="Inappropriate Content" checked onclick="show_hide_txt_report();" style="width:15px;height:15px;"><span style="font-size: 1.8rem;"> Inappropriate Content</span></label></li>
                     <li><label><input type="radio" name="rep" id="r2" value="Incomplete Article" onclick="show_hide_txt_report();" style="width:15px;height:15px;"><span style="font-size: 1.8rem;"> Incomplete Article</span></label></li>
                     <li><label><input type="radio" name="rep" id="r3" value="Not Properly Explained" onclick="show_hide_txt_report();" style="width:15px;height:15px;"><span style="font-size: 1.8rem;"> Not Properly Explained</span></label></li>
                     <li><label><input type="radio" name="rep" id="r4" value="4" onclick="show_hide_txt_report();" style="width:15px;height:15px;"><span style="font-size: 1.8rem;"> Other</span></label></li>
                   </ul>
                   <input type="text" name="txt_report" id="txt_report" height="3rem" width="10rem;" placeholder="Reason To Report This Article" style="background-color: white;margin-top: 1rem;display: none;">
                   <p id="msg_report" style="display: none;color: red;margin-top: 1rem;"></p>
                   <input type="submit" name="sub_report" id="sub_report" value="submit" class="btn btn-lg" style="margin-bottom: 1rem;background-color: #17202A;width: 10rem;font-size: 2rem;font-weight: bold; float: right;margin-bottom: 2rem;margin-top:2rem;color:#EB581D;font-family: 'Amatic SC', cursive;font-size: 2.5rem;padding-top: 0rem;padding-bottom: 0rem;">
                 </form>
               </div>
              </div>
             <!-- Report div end -->

              <div class="entry-meta">
                <span id="Status-<?=$article_data[0]->ArticleId;?>" style="cursor: pointer;">
                  <?php
                  if ($flag==1) {
                    ?>  
                    <i class="fa fa-heart" onclick="toggle_l(<?=$article_data[0]->ArticleId;?>,<?=$this->ss->UserId;?>,<?=$flag?>)" style="color:#EB581D;"></i>
                    <?php
                  }
                  else
                  {
                    ?>
                    <i class="fa fa-heart-o" onclick="toggle_l(<?=$article_data[0]->ArticleId;?>,<?=$this->ss->UserId;?>,<?=$flag?>)" style="color:#EB581D;"></i>
                    <?php
                  }
                  ?>  
                  <span style="color: #9d9d9d;">
                    <?=$likes;?>
                  </span>
                </span>

                <a data-toggle="modal" data-target="#myModalLike">Likes</a>

                <i class="fa fa-comments-o" style="color:#EB581D;"></i>
                <a href="#Comment_div">
                  <?php
                  $cnt=0;
                  foreach($article_comment as $c){
                    if ($article_data[0]->ArticleId==$c->ArticleId) {
                      $cnt++;
                    } 
                  }
                  echo $cnt;
                  ?>
                  Comments
                </a>
                <i class="fa fa-eye" style="color:#EB581D;"></i>
                <a><?=$article_data[0]->NumberOfViews?> Views</a>
              </div>
              <div class="entry-description" style="margin-top: 3rem;">
                <p><?=$article_data[0]->ArticleDescription;?></p>
                <div class="row">  
                  <div class="col-md-12" id="Comment_div">
                    <div class="heading" style="border-bottom: 1px solid #eee;padding-bottom: 1rem;">
                      <h3>Comments(
                        <?php
                        $cnt=0;
                        foreach($article_comment as $c){
                          if ($article_data[0]->ArticleId==$c->ArticleId) {
                            $cnt++;
                          } 
                        }
                        echo $cnt;
                        ?>)
                        <a onclick="opencomment();"><button id="btnComment" class="btb btn-lg" style="margin-bottom: 1rem;background-color: #17202A;width: 20rem;font-size: 2rem;font-weight: bold; float: right;margin-bottom: 2rem;">Add A Comment<span style="margin-left: 1rem;"><i class="fa fa-pencil"></i></span></button></a>
                      </h3>
                    </div>
                    <div id="AddComment" style="display: none;">
                      <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                          <span style="float: right;cursor:pointer;" onclick="closediv();">x</span>
                        </div>
                        <div class="col-md-10 col-md-offset-1">
                          <form method="POST" action="<?=site_url('/Article_user/comment_insert/'),$article_data[0]->ArticleId?>" id="comment_form" onsubmit="return comment_error();">
                            <span style="font-family: 'Amatic SC', cursive;font-size: 2.5rem;">Write Your Comment here</span>
                            <textarea rows="8" cols="10" name="TArea" id="TArea" style="border-color:#E8E2DD;font-family: 'Amatic SC', cursive;font-size: 2rem;font-weight: bolder;"></textarea>
                            <p id="msg" style="color: red;"></p>
                            <input class="btn btn-lg" type="submit" name="submit" id="submit" value="submit" style="margin-bottom: 1rem;color:#e93e21;background-color: #17202A;width: 14rem;font-size: 2rem;font-weight: bold; float: right;margin-bottom: 2rem;font-family: 'Amatic SC', cursive;">
                          </form>
                        </div>
                      </div>
                    </div>

                    <?php
                    foreach ($article_comment as $c) {
                     ?>

                     <div style="box-shadow: 0 0 10px rgba(0,0,0,.2);padding:1rem;margin-top: 1rem;border-radius: 1rem;" class="comment">
                        <div class="row">
                          <div class="col-md-12" style="margin-top: 3rem;">
                            <ul class="list-unstyled">
                              <li style="float: left;"><img src="<?=base_url('/resource/user/image/').$c->UserImage;?>" height="200rem" width="200rem" style="border-radius: 50%;height: 60px;width: 60px;"></li>
                              <li style="float: left;margin-left: .5rem;">
                                <p style="float: left;font-size:18px;margin-left: .5rem;font-family: 'Amatic SC', cursive;font-size: 3rem;font-weight: bold;"><?=$c->UserName?>
                                </p>
                                <span style="position: relative;top:2.5rem;left:-6rem;font-family: 'Amatic SC', cursive;font-size: 1.5rem;font-weight: bolder;">
                                  <?=get_time_ago(strtotime($c->ArticleCommentCreatedDate));?>
                                </span>
                              </li>
                              <?php
                              if ($c->UserId==$this->ss->UserId || $article_data[0]->UserId==$this->ss->UserId) {
                                ?>
                                <li>
                                  <span title="Delete Comment" style="float: right;position: relative;margin-right: 3rem;color: red;">
                                    <button class="btn btn-md-default" onclick="dlt_comment(<?=$c->ArticleCommentId?>);" style="font-family: 'Amatic SC', cursive;font-weight: bolder;font-size: 2rem;">Delete<i class="fa fa-trash-o" style="margin-left: 1rem;"></i>
                                    </button>
                                  </span>
                                </li>
                                <?php
                              }
                              ?>

                            </ul>
                          </div>
                          <div class="col-md-12" style="margin-top: 3rem;padding-bottom: 2rem;">
                            <p style="margin-left: 6rem;"><?=$c->ArticleComment?></p>
                          </div>
                        </div>
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
  </div>
</section>

<script>

  function opencomment()
  {
    var addComment = document.getElementById("AddComment")
    addComment.style.display="block"
  }


  function openreport()
  {
    var divReport = document.getElementById("div_report");
    divReport.style.display="block";
  }

  function show_hide_txt_report()
  {
    var txt_report = document.getElementById("txt_report")
    if (document.getElementById("r4").checked) {
      txt_report.style.display="block";
    }
    else
    {
      txt_report.style.display="none" ;
      txt_report.value="";
    }
  }
  function add_report()
  {

    var txt_report = document.getElementById("txt_report").value;
    var msg_report = document.getElementById("msg_report");
    if (document.getElementById("r4").checked) {
      if (txt_report.length>=100) {
        document.getElementById('msg_report').innerHTML="Your Reason Should Be Short And Meaningful!";
        msg_report.style.display="block";
        return false;
      }
      else if(txt_report.length==0)
      {
        var x=document.getElementById('msg_report').innerHTML="Enter Reason Please!!";
        msg_report.style.display="block";
        return false;
      }
      else
      {
        msg_report.style.display="none";
      }
    }
}

function closediv()
{
  var addComment = document.getElementById("AddComment")
  var rep = document.getElementById("div_report")
  addComment.style.display="none"
  rep.style.display="none"
}

function comment_error()
{
  if(document.getElementById('TArea').value == '')
  {
    document.getElementById('msg').innerHTML="Enter Comment Please!!"
    var x = document.getElementById("AddComment")
    x.style.display="block"
    return false
  } 
}

function dlt_comment(cid)
{
  var aid=<?=$article_data[0]->ArticleId;?>;
  var x= confirm("Do You Want To Delete This Comment?")
  if (x==true) { 
    document.location.href='<?=site_url("/Article_user/delete_comment/")?>'+cid+'/'+aid
  }
}

</script>

<script type="text/javascript">
  $(document).ready( function () {
    like_modal_fun(<?=$article_data[0]->ArticleId;?>);
    $('#like_table').DataTable({
      responsive:true
    });
  });


function like_modal_fun(rid)
{
// alert("modal");
$.ajax({
  url:'<?=site_url("/Article_user/like_modal_update/")?>'+rid,
  success:function(result)
  {
    $("#modal_like").html(result);
  }
})
}

function toggle_l(aid,uid,f)
{
$.ajax({
  url:'<?=site_url("/Article_user/toggle_like/")?>'+aid+'/'+uid+'/'+f,
  success:function(result)
  {
    $("#Status-"+aid).html(result);
  }
})
}

</script>
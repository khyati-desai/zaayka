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

#rate_table th
{
  text-overflow: ellipsis;
}

#view_table th
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

.clearfix {
  clear:both;
}

.text-center {text-align:center;}

a{
  color: tomato;
  text-decoration: none;
}

a:hover {
  color: #2196f3;
}

pre {
  display: block;
  padding: 9.5px;
  margin: 0 0 10px;
  font-size: 13px;
  line-height: 1.42857143;
  color: #333;
  word-break: break-all;
  word-wrap: break-word;
  background-color: #F5F5F5;
  border: 1px solid #CCC;
  border-radius: 4px;
}
/*
.header:after {
content:"";
display:block;
height:1px;
background:#eee;
position:absolute; 
left:30%; right:30%;
}*/

#a-footer {
  margin: 20px 0;
}

.new-react-version {
  padding: 20px 20px;
  border: 1px solid #eee;
  border-radius: 20px;
  box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);
  text-align: center;
  font-size: 14px;
  line-height: 1.7;
}

.new-react-version .react-svg-logo {
  text-align: center;
  max-width: 60px;
  margin: 20px auto;
  margin-top: 0;
}

.success-box {
  margin:50px 0;
  padding:10px 10px;
  border:1px solid #eee;
  background:#f9f9f9;
}

.success-box img {
  margin-right:10px;
  display:inline-block;
  vertical-align:top;
}

.success-box > div {
  vertical-align:top;
  display:inline-block;
  color:#888;
}



/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;

  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;

}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:1em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FF912C;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#EB581D;
}

#txt_report:focus::-webkit-input-placeholder {
  color: red;
  font-weight: bold;
}

.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

/* The actual popup (appears on top) */
.popup .popuptext {
    visibility: hidden;
    width: 30rem;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
    font-size: 2rem;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class when clicking on the popup container (hide and show the popup) */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}

.popupdiv{
  margin-bottom:0.1rem;
  padding-left: 1rem;
  border-bottom: 1px solid;
  border-radius: 5px;
  padding: 1rem;
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
  /*margin-right: 10rem;*/
  right:0;
  /*z-index: 999;*/
  overflow: hidden;
}

    /*on hover dlt and update recipe*/
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
      /*margin-right: 1rem;*/
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
          <!-- <a href="<?=$this->ss->last_url;?>"><button class="btb btn-lg" style="margin-bottom: 1rem;background-color: #17202A;width: 8rem;font-size: 2rem;font-weight: bold;"><< Back</button>
          </a> -->
           <b><?=$recipe_data[0]->RecipeTitle;?></b>
         </div>
      </div>
    </font>
  </div>
</div>

<!-- Like Modal -->
<div class="modal fade" id="myModalLike" role="dialog">
  <div class="modal-dialog" id="modal_like">
<!-- <div class="modal-content" style="height: 55rem;overflow: hidden;overflow-y:scroll;">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h3 class="modal-title">Liked By 
<?=$likes;?>
People</h4>
</div>
<div class="modal-body">
<table id="like_table">
<thead>
<tr>
<th></th>
</tr>
</thead>
<tbody>
<?php
foreach ($recipe_like as $l) {
?>
<tr>
<th>
<div class="row">
<div class="col-md-5"><img src="<?=base_url('/resource/user/image/egg.jpg');?>" height="50rem" width="50rem" style="border-radius:50%;margin-bottom: 2rem;">
</div>
<div class="col-md-2" style="font-size: 3rem;font-family:'Amatic SC', cursive;">
<a href="<?=site_url('/Profile/index/'),$l->UserId;?>"><?=$l->UserName?></a> 
</div>
</div>
</th>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div> -->
</div>
</div>
<!-- Like Modal end -->

<!-- Rate Modal -->
<div class="modal fade" id="myModalRate" role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content" style="height: 55rem;overflow: hidden;overflow-y:scroll;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Rated By 
          <?php
          $cnt=0;
          foreach($recipe_rate as $r){
            if ($recipe_data[0]->RecipeId==$r->RecipeId) {
              $cnt++;
            } 
          }
          echo $cnt;
          ?>
        People</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12" style="font-size: 3rem;font-family:'Amatic SC', cursive;">
            <?php
            $f=0;
            foreach ($recipe_rate as $r) {
              if ($r->UserId==$this->ss->UserId) 
                $f=1;
            }
            if ($f==1) {
              ?>
              <div class="col-md-8" style="font-size: 2.5rem;margin-right: 3rem;">Thanks For Rating!</div>
              <?php
            }
            else
            {
              ?>
              <form id="form_rate">
                <section class='rating-widget'>

                  <!-- Rating Stars Box -->
                  <div class='rating-stars text-center'>
                    <p style="font-size: 3rem;">Rate This Recipe</p>
                    <ul id='stars'>
                      <li class='star' title='Poor' data-value='1'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Fair' data-value='2'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Good' data-value='3'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Excellent' data-value='4'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='WOW!!!' data-value='5'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                    </ul>
                  </div>
                </section>


              </form>
              <?php
            }
            ?>
          </div>
          <div class="col-md-12">
            <table id="rate_table" class="table">
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($recipe_rate as $r) {
                  ?>
                  <tr>
                    <td style="border-top: none;"><img src="<?=base_url('/resource/user/image/'),$r->UserImage;?>" height="50rem" width="50rem" style="border-radius:50%;margin-bottom: 2rem;">
                    </td>
                    <td style="border-top: none;font-size: 3rem;font-family:'Amatic SC', cursive;"><?=$r->UserName?></td>
                    <td style="border-top: none;text-align: right;font-size: 3rem;font-family:'Amatic SC', cursive;"><?=$r->Rate;?><i class="fa fa-star" style="color: #EB581D;font-size: 3rem;"></i></td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Rate Modal end= -->


<section class="blog blog-page page-section-ptb" style="padding-top: 2rem;">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="myclass1" style="margin-right: 3rem;">
        <div class="blog-entry border mb-50">
          <?php
            if($recipe_data[0]->UserId==$this->ss->UserId)
            {
          ?>
          <div id="div_img" class="blog-entry-image">
            <img class="img-responsive" alt="" src="<?=base_url('resource/user/image/'),$recipe_data[0]->RecipeImage?>" style="width:100%;height: 576px;">

            <div class="show-dlt" style="">     
              <div>
                <form onsubmit="return delete_recipe();" action="<?=site_url('/Recipe_user/delete_recipe_read_more/').$recipe_data[0]->RecipeId;?>">
                  <button type="submit" class="btn btn-md rec-dlt" id="<?=$recipe_data[0]->RecipeId;?>" title="Delete"><i class="fa fa-trash"></i></button>
                </form>
              </div>             
              <div>
                <a href="<?=site_url('/Recipe_user/get_recipe_info/').$recipe_data[0]->RecipeId;?>">
                  <button class="btn btn-md rec-upd" title="Edit Recipe"><i class="fa fa-pencil"></i></button>
                </a>
              </div>
            </div>
          <?php
            }
            else
            {
          ?>
          <div class="blog-entry-image">
            <img class="img-responsive" alt="" src="<?=base_url('resource/user/image/'),$recipe_data[0]->RecipeImage?>" style="width:100%;height: 576px;">
          <?php
            }
          ?>

            <div class="entry-date" style="height: 5.5rem;width: 18rem;font-size: 2rem;">
              <?=date('d-M-Y', strtotime($recipe_data[0]->RecipeCreatedDate));?>
            </div>
          </div>
          <div class="entry-content">
            <div class="entry-title" style="margin-bottom: 4rem;">
              <p>
                <!-- <span style="margin-left: 1rem;font-size: 3.5rem;">|</span> -->
                <a href="<?=site_url('/Profile/index/'),$recipe_data[0]->UserId;?>"><i class="fa fa-user" style="font-size: 2.5rem;margin-right: 0.5rem;color: black;"></i>  <span style="color: gray;font-family: 'Amatic SC', cursive;font-size: 2.5rem;">By   <?=$recipe_data[0]->UserName?></span></a>

                <span style="float: right;">
                  <span>  
                    <?php
                    if (strlen($recipe_data[0]->VideoUrl)>0) {
                      ?>
                      <i class="fa fa-video-camera"></i>
                      <a onclick="openvideo();"><span style="color: gray;font-size: 1.5rem;margin-left: 0.5rem;">View Video</span></a>
                      <?php
                    }
                    ?>
                  </span>
                  <?php
                  if ($recipe_data[0]->UserId!=$this->ss->UserId) {
                    if (!empty($recipe_report)) {
                      foreach ($recipe_report as $rp) {
                        if ($rp->UserId!=$this->ss->UserId) {
                          if (strlen($recipe_data[0]->VideoUrl)>0) 
                          //there is video.. show | seperator betwn video and report
                          {
                          ?>
                            <span style="margin-right: 0.5rem;margin-left: 0.5rem;">|</span>
                          <?php                        
                          }
                          ?>
                          <span>
                            <a onclick="openreport();"><span style="color: red;font-size: 1.5rem;margin-left: 0.5rem;" ></i>Report Recipe</a>
                            </span>
                          </span>
                          <?php
                        }
                      }
                    }
                    else
                    {
                      if (strlen($recipe_data[0]->VideoUrl)>0) {
                          ?>
                            <span style="margin-right: 0.5rem;margin-left: 0.5rem;">|</span>
                          <?php                        
                          }
                          ?>
                      <span>
                        <a onclick="openreport();">
                          <span style="color: red;font-size: 1.5rem;margin-left: 0.5rem;" ></i>Report Recipe</a>
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
                  <h4 align="center">Report Recipe</h4>
                </div>
                <div style="float: right;margin-top: 3rem;" class="col-md-1">
                  <span onclick="closediv();" style="cursor: pointer;">x</span>
                </div>
                <div class="col-md-10 col-md-offset-1" style="margin-top:2rem; margin-bottom:4rem;margin-right: 8rem;">
                 <form action="<?=site_url('/Recipe_user/add_report/'),$recipe_data[0]->RecipeId?>" method="POST" onsubmit="return add_report();">
                   <ul class="list-unstyled">
                     <li><label><input type="radio" name="rep" id="r1" value="Inappropriate Content" checked onclick="show_hide_txt_report();" style="width:15px;height:15px;"><span style="font-size: 1.8rem;"> Inappropriate Content</span></label></li>
                     <li><label><input type="radio" name="rep" id="r2" value="Incomplete Recipe" onclick="show_hide_txt_report();" style="width:15px;height:15px;"><span style="font-size: 1.8rem;"> Incomplete Recipe</span></label></li>
                     <li><label><input type="radio" name="rep" id="r3" value="Not Properly Explained" onclick="show_hide_txt_report();" style="width:15px;height:15px;"><span style="font-size: 1.8rem;"> Not Properly Explained</span></label></li>
                     <li><label><input type="radio" name="rep" id="r4" value="4" onclick="show_hide_txt_report();" style="width:15px;height:15px;"><span style="font-size: 1.8rem;"> Other</span></label></li>
                   </ul>
                   <input type="text" name="txt_report" id="txt_report" height="3rem" width="10rem;" placeholder="Reason To Report Recipe" style="background-color: white;margin-top: 1rem;display: none;">
                   <p id="msg_report" style="display: none;color: red;margin-top: 1rem;"></p>
                   <input type="submit" name="sub_report" id="sub_report" value="submit" class="btn btn-lg" style="margin-bottom: 1rem;background-color: #17202A;width: 10rem;font-size: 2rem;font-weight: bold; float: right;margin-bottom: 2rem;margin-top:2rem;color:#EB581D;font-family: 'Amatic SC', cursive;font-size: 2.5rem;padding-top: 0rem;padding-bottom: 0rem;">
                 </form>
               </div>
              </div>
             <!-- Report div end -->

             <!-- video div -->
             <div id="div_video" class="col-md-12" style="display: none;">
              <div style="float: right;" class="col-md-1">
                <button onclick="closediv();" id="btn_like" style="background-color:#F6DDCC;font-size: 2rem;" class="btn">x</button>
              </div>
              <video id="myvideo1" controls style="height: 30rem; width: 100%;">
                <source src="<?=base_url('resource/user/image/'),$recipe_data[0]->VideoUrl;?>" type="video/mp4">
                </video>
              </div>
              <!-- video div end -->

              <div class="entry-meta">
                <span id="Status-<?=$recipe_data[0]->RecipeId;?>" style="cursor: pointer;">
                  <?php
                  if ($flag==1) {
                    ?>  
                    <i class="fa fa-heart" onclick="toggle_l(<?=$recipe_data[0]->RecipeId;?>,<?=$this->ss->UserId;?>,<?=$flag?>)" style="color:#EB581D;"></i>
                    <?php
                  }
                  else
                  {
                    ?>
                    <i class="fa fa-heart-o" onclick="toggle_l(<?=$recipe_data[0]->RecipeId;?>,<?=$this->ss->UserId;?>,<?=$flag?>)" style="color:#EB581D;"></i>
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
                  foreach($recipe_comment as $c){
                    if ($recipe_data[0]->RecipeId==$c->RecipeId) {
                      $cnt++;
                    } 
                  }
                  echo $cnt;
                  ?>
                  Comments
                </a>
                <i class="fa fa-star"  style="color:#EB581D;"></i>
                <a  data-toggle="modal" data-target="#myModalRate">
                  <?php
                  $tot_rate=0;
                  foreach ($recipe_rate as $rr) {
                    if ($rr->RecipeId==$recipe_data[0]->RecipeId) {
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
                      if ($rr->RecipeId==$recipe_data[0]->RecipeId) {
                        $cnt_rate=$cnt_rate + $rr->Rate;
                      }
                    }
                    echo number_format($cnt_rate/$tot_rate ,1);
                  }
                  ?>
                  Ratings
                </a>
                <i class="fa fa-eye" style="color:#EB581D;"></i>
                <a data-toggle="modal" data-target="#myModalView">
                  <?php
                  $cnt=0;
                  foreach($recipe_view as $v){
                    if ($recipe_data[0]->RecipeId==$v->RecipeId) {
                      $cnt++;
                    } 
                  }
                  echo $cnt;
                  ?>
                  Views
                </a>
                <a id="save-unsave-div">
                  <?php
                    if(count($saved)==0)
                    {
                  ?>
                    <p id="save-<?=$recipe_data[0]->RecipeId;?>">
                      <i class="fa fa-bookmark-o" style="color:#EB581D; margin-right: 0.3rem;"></i>
                      Save
                    </p>
                  <?php
                    }
                    else
                    {
                  ?>
                    <p id="save-<?=$recipe_data[0]->RecipeId;?>">
                      <i class="fa fa-bookmark" style="color:#EB581D; margin-right: 0.3rem;"></i>
                      Unsave
                    </p>
                  <?php
                    }
                  ?>
                </a>
                <a onclick="myFunction()"><i class="fa fa-plus" style="color:#EB581D; margin-right: 0.3rem;"></i>Add to</a>
                <div class="popup">

                  <span class="popuptext" id="myPopup">
                      <span onclick="myFunction();" class="pull-right" style="font-size: 25px; margin-right: 1rem;">&times;</span>
                    <div class="text-left popupdiv" id="div-wl-pl" onclick="myFunction();">
                      <a style="font-size: 2rem;" id="wl-<?=$recipe_data[0]->RecipeId;?>"><i class="fa fa-clock-o"></i>&nbsp;Watch Later</a>
                    </div>
                    <div id="div-wl-pl-2">
                      <h3>Your Playlists</h3>
                    <?php
                      foreach($playlist_data as $pd)
                      {
                    ?>
                    <div class="text-left popupdiv playlist-add-div" onclick="myFunction();">
                      <a style="font-size: 2rem;" id="p<?=$pd->PlaylistId;?>-r<?=$recipe_data[0]->RecipeId;?>"><?=$pd->PlaylistTitle;?></a>
                    </div>
                    <?php
                      }
                    ?>
                    </div>
                    <div class="text-left popupdiv" id="show-cpl-div">
                      <a style="font-size: 2rem;"><i class="fa fa-plus"></i>&nbsp;Create a New Playlist</a>
                    </div>
                    <div class="text-left popupdiv" id="cpl-div" style="display: none;">
                      <h3>Create Playlist</h3>
                      <form method="post" action="<?=site_url('/Recipe_user/add_new_playlist/'.$recipe_data[0]->RecipeId);?>">
                        <input type="text" name="aPlaylistTitle" placeholder="Enter PlayList Title" class="form-content" style="color:white; margin-bottom: 1rem;">
                        <?php
                          echo form_error('aPlaylistTitle');
                        ?>
                        <button class="button" style="font-size: 1.5rem;">Create Playlist and Add Recipe</button>
                      </form>
                    </div>
                  </span>
                </div>
              </div>
              <div class="entry-description" style="margin-top: 3rem;">
                <p style="word-break: break-all;"><?=$recipe_data[0]->RecipeDescription;?></p>
                <div class="row">  
                  <div class="col-md-12" id="Comment_div">
                    <div class="heading" style="border-bottom: 1px solid #eee;padding-bottom: 1rem;">
                      <h3>Comments(
                        <?php
                        $cnt=0;
                        foreach($recipe_comment as $c){
                          if ($recipe_data[0]->RecipeId==$c->RecipeId) {
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
                          <form method="POST" action="<?=site_url('/Recipe_user/comment_insert/'),$recipe_data[0]->RecipeId?>" id="comment_form" onsubmit="return comment_error();">
                            <span style="font-family: 'Amatic SC', cursive;font-size: 2.5rem;">Write Your Comment here</span>
                            <textarea rows="8" cols="10" name="TArea" id="TArea" style="border-color:#E8E2DD;font-family: 'Amatic SC', cursive;font-size: 2rem;font-weight: bolder;"></textarea>
                            <p id="msg" style="color: red;"></p>
                            <input class="btn btn-lg" type="submit" name="submit" id="submit" value="submit" style="margin-bottom: 1rem;color:#e93e21;background-color: #17202A;width: 14rem;font-size: 2rem;font-weight: bold; float: right;margin-bottom: 2rem;font-family: 'Amatic SC', cursive;">
                          </form>
                        </div>
                      </div>
                    </div>

                    <?php
                    foreach ($recipe_comment as $c) {
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
                                  <?=get_time_ago(strtotime($c->CommentCreatedDate));?>
                                </span>
                              </li>
                              <?php
                              if ($c->UserId==$this->ss->UserId || $recipe_data[0]->UserId==$this->ss->UserId) {
                                ?>
                                <li>
                                  <span title="Delete Comment" style="float: right;position: relative;margin-right: 3rem;color: red;">
                                    <button class="btn btn-md-default" onclick="dlt_comment(<?=$c->RecipeCommentId?>);" style="font-family: 'Amatic SC', cursive;font-weight: bolder;font-size: 2rem;">Delete<i class="fa fa-trash-o" style="margin-left: 1rem;"></i>
                                    </button>
                                  </span>
                                </li>
                                <?php
                              }
                              ?>

                            </ul>
                          </div>
                          <div class="col-md-12" style="margin-top: 3rem;padding-bottom: 2rem;">
                            <p style="margin-left: 6rem;"><?=$c->Comment?></p>
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
  function openvideo()
  {
    var divVideo = document.getElementById("div_video")
    var divReport = document.getElementById("div_report")
    divVideo.style.display="block"
    divReport.style.display="none"
  }

  function opencomment()
  {
    var addComment = document.getElementById("AddComment")
    addComment.style.display="block"
  }


  function openreport()
  {
    var divVideo = document.getElementById("div_video")
    var divReport = document.getElementById("div_report")
    divVideo.style.display="none"
    divReport.style.display="block"
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
//var rid= <?=$recipe_data[0]->RecipeId?>;
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
// var x= confirm("Are You Sure You Want To Report This Recipe?");
// if (x==true) {

// }

}

function closediv()
{
  var divVideo = document.getElementById("div_video")
  var videoplayer = document.getElementById("myvideo1")
  var addComment = document.getElementById("AddComment")
  var rep = document.getElementById("div_report")
  divVideo.style.display="none"
  videoplayer.pause()
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
  var rid=<?=$recipe_data[0]->RecipeId;?>;
  var x= confirm("Do You Want To Delete This Comment?")
  if (x==true) { 
    document.location.href='<?=site_url("/Recipe_user/delete_comment/")?>'+cid+'/'+rid
  }
}

</script>

<script type="text/javascript">
  $(document).ready( function () {
    like_modal_fun(<?=$recipe_data[0]->RecipeId;?>);
    $('#like_table').DataTable({
      responsive:true
    });
    $('#rate_table').DataTable({
      responsive:true
    });
  });


  function like_modal_fun(rid)
  {
// alert("modal");
$.ajax({
  url:'<?=site_url("/Recipe_user/like_modal_update/")?>'+rid,
  success:function(result)
  {
    $("#modal_like").html(result);
// console.log(result);
}
})
}


function toggle_l(rid,uid,$f)
{
// alert('abc');
$.ajax({
  url:'<?=site_url("/Recipe_user/toggle_like/")?>'+rid+'/'+uid+'/'+$f,
  success:function(result)
  {
    $("#Status-"+rid).html(result);
  }
})
}

$(document).ready(function(){

  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

// Now highlight all the stars that's not after the current hovered star
$(this).parent().children('li.star').each(function(e){
  if (e < onStar) {
    $(this).addClass('hover');
  }
  else {
    $(this).removeClass('hover');
  }
});

}).on('mouseout', function(){
  $(this).parent().children('li.star').each(function(e){
    $(this).removeClass('hover');
  });
});


/* 2. Action to perform on click */
$('#stars li').on('click', function(){
  var rid=<?=$recipe_data[0]->RecipeId;?>;
var onStar = parseInt($(this).data('value'), 10); // The star currently selected
var stars = $(this).parent().children('li.star');
for (i = 0; i < stars.length; i++) {
  $(stars[i]).removeClass('selected');
}

for (i = 0; i < onStar; i++) {
  $(stars[i]).addClass('selected');
}

// JUST RESPONSE (Not needed)
var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
var msg = "";
if (ratingValue > 1) {
  msg = "Thanks! Are you sure you want to give "+onStar+" Stars?";
}
else {
  msg = "Thanks! Are you sure you want to give "+onStar+" Stars?";
}
// alert(msg);
var r=confirm(msg);
if (r==true) {
  document.location.href='<?=site_url("/Recipe_user/add_rate/")?>'+onStar+'/'+rid
// alert("abc");
}
});
});

// function responseMessage(msg) {
//   $('.success-box').fadeIn(200);  
//   $('.success-box div.text-message').html("<span>" + msg + "</span>");
// }
</script>
<script type="text/javascript">
  $(function(){
    $('#save-unsave-div').on('click','p',function(){
      $this=$(this).attr("id");
      $.ajax({
        url:'<?=site_url("/Recipe_user/save_unsave/")?>'+$this,
        success:function(result)
        {
          $('#save-unsave-div').html(result);
        }
      });
    });
  });
</script>
<script>
// When the user clicks on <div>, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
<script type="text/javascript">
  $(function(){
    $('#div-wl-pl').on('click','a',function(){
      $this=$(this).attr("id");
      $.ajax({
        url:'<?=site_url("/Recipe_user/add_to_watch_later/")?>'+$this,
        success:function(result)
        {
          if(result==true)
          {
            alert('Added to WatchLater');
          }
          else
          {
            alert('Recipe already exist');
          }
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(function(){
    $('#show-cpl-div').on('click','a',function(){
       $('#cpl-div').toggle(1000);
    });
  });
</script>
<script type="text/javascript">
  $(function(){
    $('.playlist-add-div').on('click','a',function(){
      $this=$(this).attr("id");
      $.ajax({
        url:'<?=site_url("/Recipe_user/add_to_playlist/")?>'+$this,
        success:function(result)
        {
          if(result==true)
          {
            alert('Added to Playlist');
          }
          else
          {
            alert('Recipe already exist in this Playlist');
          } 
        }
      });
    });
  });
</script>
<script type="text/javascript">
  function delete_recipe()
  {
    return confirm("Are You Sure You Want To Delete This Recipe?");
  }
</script>
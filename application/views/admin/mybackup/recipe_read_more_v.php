<?php
$rp=base_url('reource/user/asset');
?>

<div class="page">
  <div class="page-header">
    <div class="row">
      <div class="col-md-12">
        <a href="<?=$this->ss->last_url;?>">
          <button class="btn btn-primary" style="float: left;position: relative;"><i class="icon wb-arrow-left"></i>Back
          </button>
        </a> 
        <a href="<?=site_url('/admin/Recipe/toggle_status/'),$recipe_data[0]->RecipeId;?>">
          <?php
          if ($recipe_data[0]->RecipeStatus==0) {
            ?>
            <i class="fa fa-toggle-on" style="color:#3498db;font-size:2.5rem;float: right;position: relative;"></i>
            <?php
          }
          else
          {
            ?>
            <i class="fa fa-toggle-off" style="color:#a6acaf;font-size:2.5rem;float: right;position: relative;"></i>
            <?php
          }
          ?>
        </a>
      </div>
    </div>
  </div>
  <div class="page-content blue-grey-500">
    <!-- Modal -->
      <div class="modal fade" id="exampleGrid" aria-hidden="true" aria-labelledby="exampleGrid"
        role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
          <div class="modal-content" style="height: 80%;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title">Liked by: <b><?=count($like_data)?> people</b></h4>
            </div>
            <div class="modal-body" style="overflow-y: scroll;">
              <div class="example-grid">
                <div class="row">
                <?php
                  foreach ($like_data as $ld)
                  {
                ?>
                    <div class="col-md-12">
                      <li class="list-group-item">
                        <div class="media">
                          <div class="pr-0 pr-sm-20 align-self-center">
                            <div class="avatar">
                              <img src="<?=base_url('resource/user/image/'),$ld->UserImage;?>" alt="...">
                              <i class="avatar avatar-busy"></i>
                            </div>
                          </div>
                          <div class="media-body align-self-center">
                            <h4 class="mt-0 mb-5">
                              <a href="<?=site_url('admin/User/profile/'),$ld->UserId;?>" style="text-decoration: none; color: black;" name="fwlg_more">
                                <?=$ld->UserName;?>
                              </a>
                            </h4>
                          </div>
                        </div>
                      </li>
                      <!-- <div style="margin: 0.3rem; padding: 1rem; background-color: #EDF1F3; border-radius: 5px;"><b><?=$ld->UserName;?></b></div> -->
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
    <!-- End Modal -->
    <div class="card card-shadow">
      <div class="page-header" style="text-align: center;">
        <h1 class="card-title text-center" style="font-size:2rem;text-transform: uppercase; color:#2C3E50;font-weight: 450;">
          <?=$recipe_data[0]->RecipeTitle;?>   
        </h1>
        <div style="width: 150px;height: 2px;background-color:#48C9B0;display: inline-block;margin-bottom: 20px; border-radius: 15px;"></div>
        <p class="card-text type-link" style="font-size: 130%;">
          <a href="#CommentDiv"><i class="icon fa-commenting" aria-hidden="true" style="color:#66D5EB;"></i>
            <span><?php echo count($comment_data)?></span>
          </a>
          <a href="#exampleGrid" data-toggle="modal"><i class="icon wb-heart" aria-hidden="true" style="color: #C82A65;" data-html="true" title='
              <?php
                if(count($like_data)>3)
                {
                  for($i=0;$i<3;$i++)
                  {
                    echo $like_data[$i]->UserName;
                    echo "<br>";
                  }
                  /*echo "and ";
                  echo count($like_data)-$i;
                  echo " more...";*/
                  $c=(count($like_data)-$i);
                  if($c>0)
                    echo "and ".$c." more...";
                }
                else if(count($like_data)==0)
                {
                  echo "Liked by no one";
                }
                else
                {
                  foreach($like_data as $ld)
                  {
                    echo $ld->UserName;
                    echo "<br>"; 
                  }
                }
              ?>
             ' data-toggle="tooltip" data-placement="bottom"></i>
            <span><?php echo count($like_data)?></span>
          </a>
          <a href="#"><i class="icon wb-eye" aria-hidden="true" style="color: #58373C ;"></i>
            <span><?php echo count($view_data)?></span>
          </a>
          <a href="#"><i class="icon wb-star" aria-hidden="true" style="color: #f5e32b;" title="given by: <?=count($rate_data)?> people" data-toggle="tooltip" data-placement="top"></i>
            <span>
            <?php
              $tot_no_of_rate=count($rate_data);
              if($tot_no_of_rate>0){
                $count_rate=0;
                foreach ($rate_data as $r)
                  $count_rate=$count_rate+$r->Rate;
                  echo $count_rate/$tot_no_of_rate;
              }
              else
              {
               echo 0; 
              }
            ?>
            </span>
          </a>
          </p>
          <?php
          if (strlen($recipe_data[0]->VideoUrl)==0) {
            ?>
            <div id="image_display">
              <img class="w-full" src="<?=base_url('resource/user/image/'),$recipe_data[0]->RecipeImage;?>" alt="..." style="height: 30rem;">
            </div>
            <?php
          }
          else
          {
            ?>
            <div id="image_display">
              <div class="cover player" data-plugin="plyr" style="height: 30%;margin: 20px;">
                <video class="w-full" controls autoplay style="height: 30rem;">
                  <source src="<?=base_url('resource/user/image/'),$recipe_data[0]->VideoUrl;?>" type="video/mp4">
                  </video>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
          <div class="card-block">


            <div>
              <p>
                <img src="<?=base_url('resource/user/image/'),$recipe_data[0]->UserImage;?>" style="height: 2.5rem;width: 2.5rem;">
                <a style="font-weight:bolder ;font-size: 2rem;"><?=$recipe_data[0]->UserName;?></a>
                <a style="position: relative;float: right;font-size: 1.5rem;" title="<?=$recipe_data[0]->RecipeCreatedDate?>" data-toggle="tooltip" data-placement="top"><?=get_time_ago(strtotime($recipe_data[0]->RecipeCreatedDate));?></a> 
              </p>
            </div>
            <div>

              <p>
            <?php
              if (strlen($recipe_data[0]->VideoUrl)>0) {
            ?>
            <div data-target="#examplePositionCenter" data-toggle="modal">
               <img class="animation-scale-down img-bordered img-bordered-primary" src="<?=base_url('resource/user/image/'),$recipe_data[0]->RecipeImage;?>" style="height: 10rem;width: 10rem; margin: 5px 15px 0px 0px;float:left;">
            </div>
            <!-- Modal -->
              <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
              role="dialog" tabindex="-1">
              <div class="modal-dialog modal-simple modal-center">
                
                    <img class="w-full" src="<?=base_url('resource/user/image/'),$recipe_data[0]->RecipeImage;?>" style="height: 30rem;width: 100%; margin: 5px 15px 0px 0px;float:left;">
          
              </div>
            </div>
            <!-- End Modal -->

            <?php
              }
            ?>
              <?=$recipe_data[0]->RecipeDescription;?>
            </p>
            </div>

            <!-- <div class="row">
              <div class="col-md-12" >
                <button class="btn btn-primary" id="view_comment_div" style="height: 3rem; width: 15rem;" type="submit">
                  View Comments<i class="icon fa-arrow-down"></i>
                </button>
              </div>
            </div> -->
            
            <div class="panel-body" id="CommentDiv">
              <table id="comment_table" class="table table-hover dataTable table-striped w-full">
                <thead>
                  <tr>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                  <h3>Comments</h3>
                  <?php
                  foreach($comment_data as $com)
                  {
                    ?>
                    <tr>
                      <td>
                        <div class="panel-body">
                          <div class="comments mx-20">
                            <div class="comment media">
                              <div class="pr-20">
                                <img src="<?=base_url('/resource/user/image/'),'default.jpg';?>" alt="..." style="height: 5rem; width: 5rem;">
                              </div>
                              <div class="media-body">
                                <div class="comment-body">
                                  <a class="comment-author" href="<?=site_url('admin/User/profile/'),$com->UserId?>"><?=$com->UserName;?></a>
                                  <div class="comment-meta">
                                    <span class="date"><?=get_time_ago(strtotime($com->CommentCreatedDate));?></span>
                                  </div>
                                  <div class="comment-content">
                                    <?=$com->Comment;?>
                                  </div>
                                  <div class="comment-actions">
                                    <a href="#" id="Status-<?=$com->RecipeCommentId;?>">
                                      <?php
                                      if ($com->CommentStatus==0) {
                                        ?>
                                        <i class="fa fa-toggle-on" onclick="toggle_c(<?=$com->RecipeCommentId;?>,<?=$com->CommentStatus;?>)" style="color:#3498db;font-size:2.5rem;float: right;position: relative;"></i>
                                        <?php
                                      }
                                      else
                                      {
                                        ?>
                                        <i class="fa fa-toggle-off" onclick="toggle_c(<?=$com->RecipeCommentId;?>,<?=$com->CommentStatus;?>)" style="color:#a6acaf;font-size:2.5rem;float: right;position: relative;"></i>
                                        <?php
                                      }
                                      ?>              
                                    </a>
                                  </div>
                                </div>
<!-- <div class="comments">
</div> -->
</div>
</div>
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
</div>
</div>
</div>
</div>

</div>

<script type="text/javascript">
  $(document).ready( function () {
    $('#comment_table').DataTable();
    //$("[data-toggle=tooltip]").tooltip();
    /*$('#CommentDiv').hide();*/
  });

  function toggle_c(id,status_c)
  {
    $.ajax({
      url:'<?=site_url("/admin/Comment/toggle_status_comment/")?>'+id+'/'+status_c,
      success:function(result)
      {
        $("#Status-"+id).html(result);
      }
    })
  }
</script>
<!-- <script type="text/javascript">
  $(function(){
    $('#view_comment_div').on('click',function(){
      $('#CommentDiv').slideToggle();
      if($('#view_comment_div').html()=='Hide Comments<i class="icon fa-arrow-up"></i>')
      {
       $('#view_comment_div').html('View Comments<i class="icon fa-arrow-down"></i>'); 
      }
      else
      {
       $('#view_comment_div').html('Hide Comments<i class="icon fa-arrow-up"></i>');
      }
    });
  });
</script> -->
<?php
$rp=base_url('reource/user/asset');
?>

<div class="page">
  <div class="page-header">
    <div class="row">
      <div class="col-md-12">
       <?php
          if (strpos($this->ss->last_url,'get_article')!==false) {
        ?>
        <a href="<?=site_url('admin/Article/get_article/');?>">
          <button class="btn btn-primary" style="float: left;position: relative;"><i class="icon wb-arrow-left"></i>Back
          </button>
        </a> 
        <?php
          }
          else
          {
        ?>
         <a href="<?=site_url('admin/User/profile/'),$article_data[0]->UserId;?>">
          <button class="btn btn-primary" style="float: left;position: relative;"><i class="icon wb-arrow-left"></i>Back
          </button>
        </a> 
        <?php
          }
        ?>
        <a href="<?=site_url('/admin/Article/toggle_status/'),$article_data[0]->ArticleId;?>">
          <?php
          if ($article_data[0]->ArticleStatus==0) {
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
          <?=$article_data[0]->ArticleTitle;?>   
        </h1>
        <div style="width: 150px;height: 2px;background-color:#48C9B0;display: inline-block;margin-bottom: 20px; border-radius: 15px;"></div>
        <p class="card-text type-link" style="font-size: 130%;">
          <a href="#CommentDiv"><i class="icon fa-commenting" aria-hidden="true" style="color:#66D5EB;"></i>
            <span><?php echo count($comment_data)?></span>
          </a>
          <a href="#exampleGrid" data-toggle="modal"><i class="icon wb-heart" aria-hidden="true" style="color: #C82A65;"  data-html="true" data-placement="bottom" data-toggle="tooltip" title="
          <?php
            if(count($like_data)>3)
            {
             for($i=0;$i<3;$i++)
              {
                echo $like_data[$i]->UserName;
                 echo "<br>";
              }
              $c=count($like_data)-$i;
              if($c>0)
                echo "and ".$c." more";
            }
            else if(count($like_data)==0)
            {
              echo "Liked by no one";
            }
            else
            {
              foreach($like_data as $l)
              {
                echo $l->UserName;
                echo "<br>";
              }
            }
          ?>
          "></i>
            <span><?php echo count($like_data)?></span>
          </a>
        
          </p>
            <div id="image_display">
              <img class="w-full" src="<?=base_url('resource/user/image/'),$article_data[0]->FeaturedImage;?>" alt="..." style="height: 30rem;">
            </div>
          </div>
          <div class="card-block">
          <div>
              <p>
                <img src="<?=base_url('resource/user/image/'),$article_data[0]->UserImage;?>" style="height: 2.5rem;width: 2.5rem;">
                <a style="font-weight:bolder ;font-size: 2rem;"><?=$article_data[0]->UserName;?></a>
                <a style="position: relative;float: right;font-size: 1.5rem;"><?=get_time_ago(strtotime($article_data[0]->ArticleCreatedDate));?></a> 
              </p>
            </div>
            <div>
            <p>
           
              <?=$article_data[0]->ArticleDescription;?>
            </p>
            </div>

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
                                  <a class="comment-author" href="<?=site_url('admin/User/profile/'),$com->UserId;?>""><?=$com->UserName;?></a>
                                  <div class="comment-meta">
                                    <span class="date"><?=get_time_ago(strtotime($com->ArticleCommentCreatedDate));?></span>
                                  </div>
                                  <div class="comment-content">
                                    <?=$com->ArticleComment;?>
                                  </div>
                                  <div class="comment-actions">
                                    <a href="#" id="Status-<?=$com->ArticleCommentId;?>">
                                      <?php
                                      if ($com->ArticleCommentStatus==0) {
                                        ?>
                                        <i class="fa fa-toggle-on" onclick="toggle_c(<?=$com->ArticleCommentId;?>,<?=$com->ArticleCommentStatus;?>)" style="color:#3498db;font-size:2.5rem;float: right;position: relative;"></i>
                                        <?php
                                      }
                                      else
                                      {
                                        ?>
                                        <i class="fa fa-toggle-off" onclick="toggle_c(<?=$com->ArticleCommentId;?>,<?=$com->ArticleCommentStatus;?>)" style="color:#a6acaf;font-size:2.5rem;float: right;position: relative;"></i>
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
  });

  $(document).ready( function () {
    $['data-toggle'].tooltip();
  });

  function toggle_c(id,status_c)
  {
    $.ajax({
      url:'<?=site_url("/admin/Comment/toggle_status_article_comment/")?>'+id+'/'+status_c,
      success:function(result)
      {
        $("#Status-"+id).html(result);
      }
    })
  }
</script>
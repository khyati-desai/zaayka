<div class="page">
  <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
  <div class="panel">
    <header class="panel-heading">
                     
    </header>
  <div class="panel-body" style="margin-top: 1rem;">
    <table id="article_table" class="table table-hover dataTable table-striped w-full">
      <thead>
        <tr>
          <th></th>
        </tr>
      </thead>

      <tbody>
         <h1>Article</h1>      
        <?php
          foreach($article_data as $ad)
          {
        ?>
        <tr style="">
          <td style="margin-top: 2rem;border-top:none;">
            <div class="profile-brief" style="border:1px solid #eee;box-shadow: 0 0 10px rgba(0,0,0,.2);border-radius: 10px;">
              <div class="media">
                <a class="pr-20">
                  <img class="w-160" src="<?=base_url('resource/user/image/'),$ad->FeaturedImage;?>" alt="..." style="height:150px;border-radius: 10px;">
                </a>
                <div class="media-body pl-20" style="padding:10px;">
                  <h3 class="mt-0 mb-5"><?=$ad->ArticleTitle;?>
                    <a href="<?php
                    echo site_url('admin/Article/toggle_status_article/'),$ad->ArticleId;?>">
                    <?php
                      if ($ad->ArticleStatus==0) {
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

                </h3>
                <p><b>Article Description: </b><?=substr($ad->ArticleDescription,0,100);?>(...)</p>
                <p style="line-height: 0;"><b>Created Date: </b><?=$ad->ArticleCreatedDate;?></p>
                <p  class="card-text type-link" style="font-size: 130%;">
                   <a href="#" class="animation-example animation-hover hover"><i class="icon fa-commenting animation-scale-down" aria-hidden="true" style="color:#66D5EB;"></i>
                    <span>
                      <?php
                      $cnt=0;
                        foreach($article_comment_data as $c){
                            if ($ad->ArticleId==$c->ArticleId) {
                                $cnt++;
                            } 
                          }
                          echo $cnt;
                      ?>
                    </span>
                  </a>
                  <a href="#" class="animation-example animation-hover hover">
                  <i class="icon fa-heart animation-scale-down" 4iaria-hidden="true" style="color: #C82A65;"></i>
                    <span>
                      <?php
                      $cnt=0;
                        foreach($article_like_data as $l){
                            if ($ad->ArticleId==$l->ArticleId) {
                                $cnt++;
                            } 
                          }
                          echo $cnt;
                      ?>
                    </span>
                  </a>
                                         
                </p>
                <a href="<?=site_url('admin/Article/article_read_more/'),$ad->ArticleId;?>" class="btn btn-outline btn-inverse" style="background-color: #48C9B0;margin-top: .5rem;">READ MORE</a>
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
<script type="text/javascript">
  $(document).ready( function () {
      $('#article_table').DataTable({
        responsive:true
      });
  });
</script>

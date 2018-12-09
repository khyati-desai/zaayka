<div class="page">
  <div class="panel">
    <header class="panel-heading">
                     
    </header>
  <div class="panel-body" style="margin-top: 1rem;">
    <table id="recipe_table" class="table table-hover dataTable table-striped w-full">
      <thead>
        <tr>
          <th></th>
        </tr>
      </thead>

      <tbody>
         <h1>Recipe</h1>      
        <?php
          foreach($recipe_data as $rd)
          {
        ?>
        <tr style="">
          <td style="margin-top: 2rem;border-top:none;">
            <div class="profile-brief" style="border:1px solid #eee;box-shadow: 0 0 10px rgba(0,0,0,.2);border-radius: 10px;">
              <div class="media">
                <a class="pr-20">
                  <img class="w-160" src="<?=base_url('resource/user/image/'),$rd->RecipeImage;?>" alt="..." style="height:150px;border-radius: 10px;">
                </a>
                <div class="media-body pl-20" style="padding:10px;">
                  <h3 class="mt-0 mb-5"><?=$rd->RecipeTitle;?>
                    <a href="<?php
                    echo site_url('admin/Recipe/toggle_status_recipe/'),$rd->RecipeId;?>">
                    <?php
                      if ($rd->RecipeStatus==0) {
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
                <p><b>Recipe Description: </b><?=substr($rd->RecipeDescription,0,100);?>(...)</p>
                <p style="line-height: 0;"><b>Created Date: </b><?=$rd->RecipeCreatedDate;?></p>
                <p  class="card-text type-link" style="font-size: 130%;">
                  <a href="#"><i class="icon fa-commenting" aria-hidden="true" style="color:#66D5EB;"></i>
                    <span>
                      <?php
                      $cnt=0;
                        foreach($recipe_comment_data as $c){
                            if ($rd->RecipeId==$c->RecipeId) {
                                $cnt++;
                            } 
                          }
                          echo $cnt;
                      ?>
                    </span>
                  </a>
                  <a href="#">
                      <i class="icon fa-heart" 4iaria-hidden="true" style="color: #C82A65;"></i>
                    <span>
                      <?php
                      $cnt=0;
                        foreach($recipe_like_data as $l){
                            if ($rd->RecipeId==$l->RecipeId) {
                                $cnt++;
                            } 
                          }
                          echo $cnt;
                      ?>
                    </span>
                  </a>
                  <a href="#">
                      <i class="icon fa-eye" 4iaria-hidden="true" style="color:   #58373C;"></i>
                    <span>
                      <?php
                      $cnt=0;
                        foreach($recipe_view_data as $v){
                            if ($rd->RecipeId==$v->RecipeId) {
                                $cnt++;
                            } 
                          }
                          echo $cnt;
                      ?>
                    </span>
                  </a>
                  <a href="#">
                      <i class="icon fa-star" 4iaria-hidden="true" style="color: #F5E32B;"></i>
                    <span>
                      <?php 
                      $tot_rate=0;
                        foreach($recipe_rate_data as $r){
                          if ($rd->RecipeId==$r->RecipeId) {
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
                          foreach ($recipe_rate_data as $r) {
                            if ($rd->RecipeId==$r->RecipeId) {
                              $cnt_rate=$cnt_rate+$r->Rate;
                            }
                          }

                        echo $cnt_rate/$tot_rate;
                        }
                      ?>
                    </span>
                  </a>
                  
                </p>
                <a href="<?=site_url('admin/Recipe/recipe_read_more/'),$rd->RecipeId;?>" class="btn btn-outline btn-inverse" style="background-color: #48C9B0;margin-top: .5rem;">READ MORE</a>
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
      $('#recipe_table').DataTable();
  });
</script>

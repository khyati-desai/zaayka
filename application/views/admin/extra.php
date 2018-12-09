          $(function(){
    <?php
    if($competition_data[0]->Color=="red")
    {
      ?>
      $('#comp_desc').css({
        'background-color':'#FDD6D6',
        'border':'1px ridge red'
      });
      <?php
    }
    else if($competition_data[0]->Color=="yellow")
    {
      ?>
      $('#comp_desc').css({
        'background-color':'#FCFCCD',
        'border':'1px ridge yellow'
      });
      <?php
    }
    ?>
  });

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

        <img src="<?=base_url('resource/user/image/'),$recipe_data[0]->UserImage;?>" style="height: 2.5rem;width: 2.5rem;">

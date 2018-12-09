<div class="page">
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
         <h1><?=$playlist_data[0]->PlaylistTitle?></h1>
         <h3>Recipes of this Playlist</h3>
        <?php
          foreach($playlistpost_data as $pd)
          {
        ?>
        <tr style="">
          <td style="margin-top: 2rem;border-top:none;">
            <div class="profile-brief" style="border:1px solid #eee;box-shadow: 0 0 10px rgba(0,0,0,.2);border-radius: 10px;">
              <div class="media">
                <a class="pr-20">
                  <img class="w-160" src="<?=base_url('resource/user/image/'),$pd->RecipeImage;?>" alt="..." style="height:150px;border-radius: 10px;">
                </a>
                <div class="media-body pl-20" style="padding:10px;">
                  <h3 class="mt-0 mb-5"><?=$pd->RecipeTitle;?>

                  </h3>
                  <p><b>Recipe Description: </b><?=substr($pd->RecipeDescription,0,100);?>(...)</p>
                  <p style="line-height: 0;"><b>Created Date: </b><?=$pd->RecipeCreatedDate;?></p>
                  <a href="<?=site_url('admin/Recipe/recipe_read_more/'),$pd->RecipeId;?>" class="btn btn-outline btn-inverse" style="background-color: #48C9B0;margin-top: .5rem;">READ MORE</a>
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
      $('#article_table').DataTable();
  });
</script>

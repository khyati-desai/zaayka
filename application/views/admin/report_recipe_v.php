<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
    <div class="page-header">
      <h1 class="page-title">REPORTS</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">Recipe Report Table</h2>
          
        </header>
        <div class="panel-body">
          <table class="table table-hover table-striped w-full" id="report_recipe_table">
            <thead>
              <tr>
                <th>Recipe Name</th>
                <th>Total Reports</th>
                <th>More Info</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Recipe Name</th>
                <th>Total Reports</th>
                <th>More Info</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->
<script type="text/javascript">
  $(function(){
    //alert('hello');
    $('#report_recipe_table').DataTable({
      responsive:true,
      sAjaxSource:'<?=site_url("admin/Report/get_report_recipe/");?>',
      aoColumns:[
        {data:null,render:function(data,type,row){
          var s="<?=site_url('admin/Recipe/recipe_read_more');?>";
          return '<a style="text-decoration:none;color:black;" href="'+s+'/'+data.RecipeId+'">'+data.RecipeTitle+'</a>';
        }},
        {mData:'tot_report'},
        {data:null,render:function(data,type,row){
          return '<a href="<?=site_url('/admin/Report/reported_recipe_profile/');?>'+data.RecipeId+'"><i class="icon fa-ellipsis-h" style="font-size:150%;"><i></a>';      
        }}
      ]
    });
  });
</script>
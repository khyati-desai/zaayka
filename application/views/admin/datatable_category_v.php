<?php
  $rp=base_url('resource/admin/asset');
?>
  <!-- Page -->
  <div class="page">
    <a id="back2Top" data-toggle="tooltip" title="Back to top" href="#" style=" width: 40px;line-height: 40px;z-index: 999;display: none;cursor: pointer;position: fixed;bottom: 50px;right: 5rem;">
      <button class="btn btn-floating" style="box-shadow: 0px 0px 10px 0px black;background-color: #3498DB;"><i class="icon wb-arrow-up" style="color:white;"></i></button>
    </a>
    <div class="page-header">
      <h1 class="page-title">CATEGORIES</h1>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          
          <h2 class="panel-title">Category Table
            <button class="btn" data-target="#examplePositionCenter" data-toggle="modal" type="button" style="font-size:10px;position: relative;float: right;" title="Add Category"><i class="fa fa-plus"></i></button></h2>

          <!-- Modal -->
          <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
            role="dialog" tabindex="-1">
            <div class="modal-dialog modal-simple modal-center">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="exampleModalTitle">Add Category</h4>
                </div>
                <div class="modal-body">
                  <div class="example-wrap">
                    
                    <div class="example">
                      <?=form_open_multipart('admin/Category/add_category');?>
                        <div class="form-group">
                          <label class="form-control-label" for="aCategoryName">Category Name</label>
                          <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                              <i class="icon wb-grid-4"></i>
                            </span>
                            <input type="text" class="form-control" id="aCategoryName" name="aCategoryName"
                            placeholder="Category Name" autocomplete="off" value="<?=set_value('aCategoryName');?>"/>
                          </div>
                          <font style="color:red">
                            <?php
                              echo form_error('aCategoryName');
                            ?>
                          </font>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                      <?=form_close();?>
                    </div>
                  </div>
                </div>
                <!-- <div class="modal-footer">
                </div> -->
              </div>
            </div>
          </div>
          <!-- End Modal -->
          
        </header>
        <div class="panel-body">
          <table class="table table-hover table-striped w-full" id="category_table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Status</th>
                <th>DateAndTime</th>
                <th>Added By</th>
                <th>Edit</th>
                <th>Sub Category</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Status</th>
                <th>DateAndTime</th>
                <th>Added By</th>
                <th>Edit</th>
                <th>Sub Category</th>
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
    $('#category_table').DataTable({
      responsive:true,
      sAjaxSource:'<?=site_url("admin/Category/get_category/");?>',
      aoColumns:[
        {mData:'CategoryName'},
        {data:null,render:function(data,type,row){
          var icon=data.CategoryStatus==0?'<i style="font-size:150%; color:#3498db" class="fa fa-toggle-on"></i>':'<i style="font-size:150%; color:#a6acaf" class="fa fa-toggle-off"></i>';
      
          return '<a href="#" class="toggle_status" id="'+data.CategoryId+'">'+icon+'</a>';
        }},
        {mData:'CategoryCreatedDate'},
        {mData:'AddedByAdminName'},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%;" class="fa fa-pencil"></i>';

          var site='<?=site_url("admin/Category/get_category_to_update/");?>'+data.CategoryId;
          return '<a href="'+site+'">'+editicon+'</a>';
        }},
        {data:null,render:function(data,type,row){
          var editicon='<i style="font-size:150%;" class="icon fa-ellipsis-h"></i>';

          var site='<?=site_url("admin/Subcategory/index/");?>'+data.CategoryId;
          return '<a href="'+site+'">'+editicon+'</a>';
        }}
      ],
      dom:'Bfrtip',
      buttons: [
            <?php
              echo get_icons();
            ?>
        ],
    });
  });
  $(function(){
    $('#category_table').on('click','tbody .toggle_status',function(){
      $.ajax({
        url:'<?=site_url("admin/Category/toggle_status/");?>'+$(this).attr("id"),
        success:function(result){
          $('#category_table').DataTable().ajax.reload();
        }
      })
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    <?php
    $verr=validation_errors();
    if($verr != NULL)
    {
      ?>
      $('#examplePositionCenter').modal('show');
      <?php
    }
    ?>
  });
</script>


<div class="col-md-6">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Tab 1</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tab 2</a></li>
              <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Tab 3</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1">
                <b>How to use:</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                A wonderful serenity has taken possession of my entire soul,
                like these sweet mornings of spring which I enjoy with my whole heart.
                I am alone, and feel the charm of existence in this spot,
                which was created for the bliss of souls like mine. I am so happy,
                my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                that I neglect my talents. I should be incapable of drawing a single stroke
                at the present moment; and yet I feel that I never was a greater artist than now.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>









        <script type="text/javascript">
                $(function(){
                  $('.video1').on('play',function(){
                    $.ajax({
                      url:'<?=site_url("Video/add_count/");?>'+'<?=$video_data[0]->video_id;?>',
                      success:function(result){
                      }
                    });
                  });
                });
              </script>
























              <div class="col-md-12 course-description">

                <div class="tab-content course-description-tab">
                  <div class="tab-pane active fade in" id="description">
                    <div class="row">
                      <div class="col-md-12 course-description-tab-left sub-content">
                        <h2>Video Description</h2>
                        <p><?=$video_data[0]->description;?></p>
                        <div class="col-md-12">
                          <!-- Custom Tabs -->
                          <div class="nav-tabs-custom">
                            <div class="row">
                              <div class="col-md-6">
                                <button name="button" id="prevTab" class="btn btn-md-12 btn-primary">Previous</button>
                                <button name="button" id="nextTab" class="btn btn-md-12 btn-danger">Next</button>
                              </div>
                            </div>
                            <ul class="nav nav-tabs" style="display: none">
                              <?php
                              $i=1;
                              foreach ($quiz_data as $qd)
                              {
                                if($i==1)
                                {
                                ?>
                                  <li class="tab-menu" active="true"><a href="#<?=$qd->slug;?>" data-toggle="tab" aria-expanded="false">Tab 1</a></li>
                                <?php
                                }
                                else
                                {
                                ?>
                                  <li class="tab-menu"><a href="#<?=$qd->slug;?>" data-toggle="tab" aria-expanded="false">Tab 1</a></li>
                                <?php
                                }
                                $i=$i+1;
                              }
                              ?>
                            </ul>
                            <div class="tab-content">
                              <?php
                              foreach ($quiz_data as $qd){ ?>
                              <div class="tab-pane" id="<?=$qd->slug;?>">
                                <?=$qd->question;?>
                                </div>
                                <?php }?>
                              </div>
                              <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->
                          </div>
                      </div>
                    </div>
                  </div>
                </div><!--end of tab----->
              </div>





              <button type="button" class="btn btn-large" id="prev" name="button">prev</button>
          <button type="button" class="btn btn-large" id="next" name="button">next</button>
            <script type="text/javascript">
              $(function(){
                $('#next').on('click',function(){

                });
              })
            </script>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Tab 1</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tab 2</a></li>
              <li class="active tab"><a href="#tab_3" data-toggle="tab" aria-expanded="true">Tab 3</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1">
                <b>How to use:</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                A wonderful serenity has taken possession of my entire soul,
                like these sweet mornings of spring which I enjoy with my whole heart.
                I am alone, and feel the charm of existence in this spot,
                which was created for the bliss of souls like mine. I am so happy,
                my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                that I neglect my talents. I should be incapable of drawing a single stroke
                at the present moment; and yet I feel that I never was a greater artist than now.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
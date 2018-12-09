
                      <div class="media-body pl-20" style="padding:10px;">
                        <h3 class="mt-0 mb-5">Title Here
                        </h3>
                        <p><b>Video Description: </b><?=substr('dhgggggggggggggggggggggggglsxbv',0,100);?>(...)</p>
                        <p style="line-height: 0;"><b>Uploaded On: </b>Date here</p>
                        <p  class="card-text type-link" style="font-size: 130%;">
                          <a href="#">
                            <i class="icon fa-heart" 4iaria-hidden="true" style="color: #C82A65;"></i>
                            <span>
                              <?php
                              echo $cvd->TotalLikes;
                              ?>
                            </span>
                          </a>
                        </p>
                        <p>
                          <a href="<?=site_url('admin/Competition/get_video_read_more/'),$cvd->CompetitionVideoId;?>" class="btn btn-outline btn-inverse" style="background-color: #48C9B0;margin-top: .5rem;">READ MORE</a>
                          <a href="<?=site_url('/admin/Competition/toggle_status_video/'),$cvd->CompetitionVideoId.'/'.$competition_data[0]->CompetitionId;?>">
                            <?php
                            if ($cvd->CompetitionVideoStatus==0) {
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
                        </p>
                      </div>



                      <div class="profile-brief" style="border:1px solid #eee;box-shadow: 0 0 10px rgba(0,0,0,.2);border-radius: 10px;">
                    <div class="row" style="background-color: red;">
                      <div class="col-md-4">
                      <a class="">
                        <video controls style="height: 20rem; border-radius: 10px;">
                        <source src="<?=base_url('resource/admin/image/video3.mp4');?>" type="video/mp4">
                        </video>
                      </a>
                      <div>
                      <div class="col-md-8">
                        psum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                      </div>
                      </div>
                    </div>
                  
                </div>
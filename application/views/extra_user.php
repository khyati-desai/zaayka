<section> 
  <div  style="background-color: black">
    <img src="<?=base_url('resource/user/asset/images/bg/01.jpg')?>" height="180" width="100%">
  </div>
  <!-- background-image: url(http://localhost/project2/zaayka/resource/user/asset/images/bg/01.jpg); -->
</section>
<div>
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?=base_url('resource/user/image/default.jpg');?>" alt="Los Angeles" style="width:100%; height: 30rem;">
      </div>

      <div class="item">
        <img src="<?=base_url('resource/user/image/default.jpg');?>" alt="Chicago" style="width:100%; height: 30rem;">
      </div>
    
      <div class="item">
        <img src="<?=base_url('resource/user/image/default.jpg');?>" alt="New york" style="width:100%; height: 30rem;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

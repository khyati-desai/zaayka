  <?php
  $rp=base_url('resource/admin/asset');
  ?>
  <!DOCTYPE html>
  <html class="no-js css-menubar" lang="en">

  <!-- Mirrored from getbootstrapadmin.com/remark/base/tables/datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Apr 2018 12:43:55 GMT -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>Zaayka</title>

    <link rel="apple-touch-icon" href="<?=$rp;?>/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?=$rp;?>/assets/images/zay.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?=$rp;?>/global/css/bootstrap.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/css/bootstrap-extend.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/assets/css/site.min599c.css?v4.0.2">

    <!-- Skin tools (demo site only) -->
<!--     <link rel="stylesheet" href="<?=$rp;?>/global/css/skintools.min599c.css?v4.0.2">


    <script src="<?=$rp;?>/assets/js/Plugin/skintools.min599c.js?v4.0.2"></script> -->

    <!-- Plugins -->
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/animsition/animsition.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/asscrollable/asScrollable.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/switchery/switchery.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/intro-js/introjs.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/slidepanel/slidePanel.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2">

    <!-- Plugins For This Page -->
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/datatables.net-bs4/dataTables.bootstrap4.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/assets/examples/css/pages/profile_v3.min599c.css?v4.0.2">
    <!-- Page -->
    <link rel="stylesheet" href="<?=$rp;?>/assets/examples/css/tables/datatable.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/assets/examples/css/forms/advanced.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min599c.css?v4.0.2">

    <!-- Fonts -->
    <link rel="stylesheet" href="<?=$rp;?>/global/fonts/web-icons/web-icons.min599c.css?v4.0.2">
    <link rel="stylesheet" href="<?=$rp;?>/global/fonts/brand-icons/brand-icons.min599c.css?v4.0.2">
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">

    <link rel="stylesheet" href="<?=$rp;?>/global/fonts/font-awesome/font-awesome.min599c.css?v4.0.2">

  <!--[if lt IE 9]>
  <script src="<?=$rp;?>/<?=$rp;?>/global/vendor/html5shiv/html5shiv.min.js?v4.0.2"></script>
<![endif]-->

  <!--[if lt IE 10]>
  <script src="<?=$rp;?>/global/vendor/media-match/media.match.min.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/respond/respond.min.js?v4.0.2"></script>
<![endif]-->

<!-- Scripts -->
<script src="<?=$rp;?>/global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
<script src="<?=$rp;?>/global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2"></script>
<script>
  Breakpoints();
</script>
</head>
<body class="animsition ">
  <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-expand-md"
role="navigation">

<div class="navbar-header">
  <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
  data-toggle="menubar">
  <span class="sr-only">Toggle navigation</span>
  <span class="hamburger-bar"></span>
</button>
<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
data-toggle="collapse">
<i class="icon wb-more-horizontal" aria-hidden="true"></i>
</button>
<div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
  <img class="navbar-brand-logo" src="<?=$rp;?>/assets/images/zaayka_logo_2.png" title="Zaayka" style="height:3rem;">
  <span class="navbar-brand-text hidden-xs-down"></span>
</div>
<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
data-toggle="collapse">
<span class="sr-only">Toggle Search</span>
<i class="icon wb-search" aria-hidden="true"></i>
</button>
</div>

<div class="navbar-container container-fluid">
  <!-- Navbar Collapse -->
  <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
    <!-- Navbar Toolbar -->
    <ul class="nav navbar-toolbar">
      <li class="nav-item hidden-float" id="toggleMenubar">
        <a class="nav-link" data-toggle="menubar" href="#" role="button">
          <i class="icon hamburger hamburger-arrow-left">
            <span class="sr-only">Toggle menubar</span>
            <span class="hamburger-bar"></span>
          </i>
        </a>
      </li>
      <li class="nav-item hidden-sm-down" id="toggleFullscreen">
        <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
          <span class="sr-only">Toggle fullscreen</span>
        </a>
      </li>


    </ul>
    <!-- End Navbar Toolbar -->

    <!-- Navbar Toolbar Right -->
    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

      <li class="nav-item dropdown">
        <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
        data-animation="scale-up" role="button">
        <span class="avatar avatar-online">
          <img src="<?=base_url('/resource/admin/image/').$this->ss->AdminImage;?>" alt="<?=$rp;?>.">
          <i></i>
        </span>
      </a>
      <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" href="<?=site_url('/admin/Admin/get_admin_to_update');?>" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Edit Profile</a>
        <div class="dropdown-divider" role="presentation"></div>
        <a class="dropdown-item" href="<?=site_url('/admin/Logout/');?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
      </div>
    </li>
    <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
        aria-expanded="false" data-animation="scale-up" role="button">
        <i class="icon wb-bell" aria-hidden="true"></i>
        <span class="badge badge-pill badge-danger up">5</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
        <div class="dropdown-menu-header">
          <h5>NOTIFICATIONS</h5>
          <span class="badge badge-round badge-danger">New 5</span>
        </div>

        <div class="list-group">
          <div data-role="container">
            <div data-role="content">
              <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                <div class="media">
                  <div class="pr-10">
                    <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                  </div>
                  <div class="media-body">
                    <h6 class="media-heading">A new order has been placed</h6>
                    <time class="media-meta" datetime="2018-06-12T20:50:48+08:00">5 hours ago</time>
                  </div>
                </div>
              </a>
              <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                <div class="media">
                  <div class="pr-10">
                    <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                  </div>
                  <div class="media-body">
                    <h6 class="media-heading">Completed the task</h6>
                    <time class="media-meta" datetime="2018-06-11T18:29:20+08:00">2 days ago</time>
                  </div>
                </div>
              </a>
              <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                <div class="media">
                  <div class="pr-10">
                    <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                  </div>
                  <div class="media-body">
                    <h6 class="media-heading">Settings updated</h6>
                    <time class="media-meta" datetime="2018-06-11T14:05:00+08:00">2 days ago</time>
                  </div>
                </div>
              </a>
              <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                <div class="media">
                  <div class="pr-10">
                    <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                  </div>
                  <div class="media-body">
                    <h6 class="media-heading">Event started</h6>
                    <time class="media-meta" datetime="2018-06-10T13:50:18+08:00">3 days ago</time>
                  </div>
                </div>
              </a>
              <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                <div class="media">
                  <div class="pr-10">
                    <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                  </div>
                  <div class="media-body">
                    <h6 class="media-heading">Message received</h6>
                    <time class="media-meta" datetime="2018-06-10T12:34:48+08:00">3 days ago</time>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="dropdown-menu-footer">
          <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
            <i class="icon wb-settings" aria-hidden="true"></i>
          </a>
          <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
            All notifications
          </a>
        </div>
      </div>
   </li> -->
  <!-- <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages"
    aria-expanded="false" data-animation="scale-up" role="button">
    <i class="icon wb-envelope" aria-hidden="true"></i>
    <span class="badge badge-pill badge-info up">3</span>
  </a>
  <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
    <div class="dropdown-menu-header" role="presentation">
      <h5>MESSAGES</h5>
      <span class="badge badge-round badge-info">New 3</span>
    </div>

    <div class="list-group" role="presentation">
      <div data-role="container">
        <div data-role="content">
          <a class="list-group-item" href="javascript:void(0)" role="menuitem">
            <div class="media">
              <div class="pr-10">
                <span class="avatar avatar-sm avatar-online">
                  <img src="<?=$rp;?>/global/portraits/2.jpg" alt="<?=$rp;?>." />
                  <i></i>
                </span>
              </div>
              <div class="media-body">
                <h6 class="media-heading">Mary Adams</h6>
                <div class="media-meta">
                  <time datetime="2018-06-17T20:22:05+08:00">30 minutes ago</time>
                </div>
                <div class="media-detail">Anyways, i would like just do it</div>
              </div>
            </div>
          </a>
          <a class="list-group-item" href="javascript:void(0)" role="menuitem">
            <div class="media">
              <div class="pr-10">
                <span class="avatar avatar-sm avatar-off">
                  <img src="<?=$rp;?>/global/portraits/3.jpg" alt="<?=$rp;?>." />
                  <i></i>
                </span>
              </div>
              <div class="media-body">
                <h6 class="media-heading">Caleb Richards</h6>
                <div class="media-meta">
                  <time datetime="2018-06-17T12:30:30+08:00">12 hours ago</time>
                </div>
                <div class="media-detail">I checheck the document. But there seems</div>
              </div>
            </div>
          </a>
          <a class="list-group-item" href="javascript:void(0)" role="menuitem">
            <div class="media">
              <div class="pr-10">
                <span class="avatar avatar-sm avatar-busy">
                  <img src="<?=$rp;?>/global/portraits/4.jpg" alt="<?=$rp;?>." />
                  <i></i>
                </span>
              </div>
              <div class="media-body">
                <h6 class="media-heading">June Lane</h6>
                <div class="media-meta">
                  <time datetime="2018-06-16T18:38:40+08:00">2 days ago</time>
                </div>
                <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
              </div>
            </div>
          </a>
          <a class="list-group-item" href="javascript:void(0)" role="menuitem">
            <div class="media">
              <div class="pr-10">
                <span class="avatar avatar-sm avatar-away">
                  <img src="<?=$rp;?>/global/portraits/5.jpg" alt="<?=$rp;?>." />
                  <i></i>
                </span>
              </div>
              <div class="media-body">
                <h6 class="media-heading">Edward Fletcher</h6>
                <div class="media-meta">
                  <time datetime="2018-06-15T20:34:48+08:00">3 days ago</time>
                </div>
                <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="dropdown-menu-footer" role="presentation">
      <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
        <i class="icon wb-settings" aria-hidden="true"></i>
      </a>
      <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
        See all messages
      </a>
    </div>
  </div>
</li>
 -->
</ul>
<!-- End Navbar Toolbar Right -->
</div>
<!-- End Navbar Collapse -->

<!-- Site Navbar Seach -->
<div class="collapse navbar-search-overlap" id="site-navbar-search">
  <form role="search">
    <div class="form-group">
      <div class="input-search">
        <i class="input-search-icon wb-search" aria-hidden="true"></i>
        <input type="text" class="form-control" name="site-search" placeholder="Search<?=$rp;?>.">
        <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
        data-toggle="collapse" aria-label="Close"></button>
      </div>
    </div>
  </form>
</div>
<!-- End Site Navbar Seach -->
</div>
</nav>
<div class="site-menubar">
  <div class="site-menubar-body">
    <div>
      <div>
        <ul class="site-menu" data-plugin="menu">
          <li class="site-menu-category"></li>
          <?php
            if($this->ss->AdminLevel==0)
            {
          ?>
          <li class="site-menu-item has-sub">
            <a href="<?=site_url('/admin/Admin');?>">
              <i class="site-menu-icon icon wb-user" aria-hidden="true"></i>
              <span class="site-menu-title">Admin</span>
            </a>
          </li>
          <?php
            }
          ?>
          <li class="site-menu-item has-sub">
            <a href="<?=site_url('/admin/User');?>">
              <i class="site-menu-icon icon wb-user-circle" aria-hidden="true"></i>
              <span class="site-menu-title">User</span>
            </a>
          </li>


          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
              <i class="site-menu-icon icon wb-grid-4" aria-hidden="true"></i>
              <span class="site-menu-title">Categories</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item">
                <a href="<?=site_url('/admin/Category');?>">
                  <span class="site-menu-title">Category</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="<?=site_url('/admin/Subcategory');?>">
                  <span class="site-menu-title">Sub Category</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub">
            <a href="<?=site_url('/admin/Recipe/get_recipe');?>">
              <i class="site-menu-icon fa fa-cutlery" aria-hidden="true"></i>
              <span class="site-menu-title">Recipe</span>
            </a>
          </li>

          <li class="site-menu-item has-sub">
            <a href="<?=site_url('/admin/Article/get_article');?>">
              <i class="site-menu-icon fa fa-newspaper-o" aria-hidden="true"></i>
              <span class="site-menu-title">Article</span>
            </a>
          </li>

            
          <li class="site-menu-item has-sub">
            <a href="<?=site_url('/admin/Playlist/');?>">
              <i class="site-menu-icon fa fa-play" aria-hidden="true"></i>
              <span class="site-menu-title">Playlist</span>
            </a>
          </li>

          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
              <i class="site-menu-icon icon fa-comment" aria-hidden="true"></i>
              <span class="site-menu-title">Comments</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item">
                <a href="<?=site_url('/admin/Comment/1');?>">
                  <span class="site-menu-title">Recipe Comments</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="<?=site_url('/admin/Comment/2');?>">
                  <span class="site-menu-title">Article Comments</span>
                </a>
              </li>
            </ul>
          </li>



          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
              <i class="site-menu-icon icon wb-map" aria-hidden="true"></i>
              <span class="site-menu-title">Location</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item">
                <a href="<?=site_url('/admin/State');?>">
                  <span class="site-menu-title">State</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="<?=site_url('/admin/City');?>">
                  <span class="site-menu-title">City</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
              <i class="site-menu-icon icon fa-ban" aria-hidden="true"></i>
              <span class="site-menu-title">Reports</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item">
                <a href="<?=site_url('/admin/Category');?>">
                  <span class="site-menu-title">User Report</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="<?=site_url('/admin/Subcategory');?>">
                  <span class="site-menu-title">Recipe Report</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="<?=site_url('/admin/Subcategory');?>">
                  <span class="site-menu-title">Article Report</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub">
            <a href="<?=site_url('/admin/Competition');?>">
              <i class="site-menu-icon fa fa-trophy" aria-hidden="true"></i>
              <span class="site-menu-title">Competition</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

</div>
  <!-- <div class="site-gridmenu">
  <div>
  <div>
  <ul>
  <li>
  <a href="<?=$rp;?>/apps/mailbox/mailbox.html">
  <i class="icon wb-envelope"></i>
  <span>Mailbox</span>
  </a>
  </li>
  <li>
  <a href="<?=$rp;?>/apps/calendar/calendar.html">
  <i class="icon wb-calendar"></i>
  <span>Calendar</span>
  </a>
  </li>
  <li>
  <a href="<?=$rp;?>/apps/contacts/contacts.html">
  <i class="icon wb-user"></i>
  <span>Contacts</span>
  </a>
  </li>
  <li>
  <a href="<?=$rp;?>/apps/media/overview.html">
  <i class="icon wb-camera"></i>
  <span>Media</span>
  </a>
  </li>
  <li>
  <a href="<?=$rp;?>/apps/documents/categories.html">
  <i class="icon wb-order"></i>
  <span>Documents</span>
  </a>
  </li>
  <li>
  <a href="<?=$rp;?>/apps/projects/projects.html">
  <i class="icon wb-image"></i>
  <span>Project</span>
  </a>
  </li>
  <li>
  <a href="<?=$rp;?>/apps/forum/forum.html">
  <i class="icon wb-chat-group"></i>
  <span>Forum</span>
  </a>
  </li>
  <li>
  <a href="<?=$rp;?>/index.html">
  <i class="icon wb-dashboard"></i>
  <span>Dashboard</span>
  </a>
  </li>
  </ul>
  </div>
  </div>
</div> -->


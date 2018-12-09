
<?php
  $rp=base_url('resource/admin/asset');
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<!-- Mirrored from getbootstrapadmin.com/remark/base/pages/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Apr 2018 12:41:41 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Login | Zaayka</title>

  <link rel="apple-touch-icon" href="<?=$rp;?>/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?=$rp;?>/assets/images/zay.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?=$rp;?>/global/css/bootstrap.min599c.css?v4.0.2">
  <link rel="stylesheet" href="<?=$rp;?>/global/css/bootstrap-extend.min599c.css?v4.0.2">
  <link rel="stylesheet" href="<?=$rp;?>/assets/css/site.min599c.css?v4.0.2">

  <!-- Skin tools (demo site only) -->
<!--   <link rel="stylesheet" href="<?=$rp;?>/global/css/skintools.min599c.css?v4.0.2">
  <script src="<?=$rp;?>/assets/js/Plugin/skintools.min599c.js?v4.0.2"></script>
 -->
  <!-- Plugins -->
  <link rel="stylesheet" href="<?=$rp;?>/global/vendor/animsition/animsition.min599c.css?v4.0.2">
  <link rel="stylesheet" href="<?=$rp;?>/global/vendor/asscrollable/asScrollable.min599c.css?v4.0.2">
  <link rel="stylesheet" href="<?=$rp;?>/global/vendor/switchery/switchery.min599c.css?v4.0.2">
  <link rel="stylesheet" href="<?=$rp;?>/global/vendor/intro-js/introjs.min599c.css?v4.0.2">
  <link rel="stylesheet" href="<?=$rp;?>/global/vendor/slidepanel/slidePanel.min599c.css?v4.0.2">
  <link rel="stylesheet" href="<?=$rp;?>/global/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2">

  <!-- Page -->
  <link rel="stylesheet" href="<?=$rp;?>/assets/examples/css/pages/login-v2.min599c.css?v4.0.2">

  <!-- Fonts -->
  <link rel="stylesheet" href="<?=$rp;?>/global/fonts/web-icons/web-icons.min599c.css?v4.0.2">
  <link rel="stylesheet" href="<?=$rp;?>/global/fonts/brand-icons/brand-icons.min599c.css?v4.0.2">
  <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">


  <!--[if lt IE 9]>
    <script src="<?=$rp;?>/global/vendor/html5shiv/html5shiv.min.js?v4.0.2"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="<?=$rp;?>/global/vendor/media-match/media.match.min.js?v4.0.2"></script>
    <script src="<?=$rp;?>/global/vendor/respond/respond.min.js?v4.0.2"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="<?=$rp;?>/global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="animsition page-login-v2 layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <style>
    body {
      background: transparent;
    }
  </style>
  <!-- Page -->
  <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <div class="page-brand-info">
        <div class="brand">
          <img class="brand-img" src="<?=$rp;?>/assets/images/zaayka_logo_2.png" alt="<?=$rp;?>." style="height:5rem;">
          <h2 class="brand-text font-size-40"></h2>
          <p>The Taste for Life</p>
        </div>
      </div>

      <div class="page-login-main animation-slide-right animation-duration-1">
        <div class="brand hidden-md-up">
          <img class="brand-img" src="<?=$rp;?>/assets/images/zaayka_logo_2.png" alt="<?=$rp;?>.">
          <h3 class="brand-text font-size-40"></h3>
        </div>
        <h3 class="font-size-24">Sign In</h3>
        <p>The Zayka</p>

        <form method="post" action="<?=site_url('/admin/Login/do_login/');?>">
          <div class="form-group">
            <label class="sr-only" for="sAdminEmail">Email</label>
            <input type="text" class="form-control" id="sAdminEmail" name="sAdminEmail" placeholder="Email">
            <?php
              echo form_error('sAdminEmail');
            ?>
          </div>

          <div class="form-group">
            <label class="sr-only" for="sAdminPassword">Password</label>
            <input type="password" class="form-control" id="sAdminPassword" name="sAdminPassword"
              placeholder="Password">
            <?php
              echo form_error('sAdminPassword');
            ?>
          </div>
          <div>
            <?php
            if (isset($error)) {
              echo $error;
            }
          ?>
          </div>
          <!-- <div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
              <input type="checkbox" id="rememberMe" name="rememberMe">
              <label for="rememberMe">Remember me</label>
            </div>
            <a class="float-right" href="forgot-password.html">Forgot password?</a>
          </div> -->
          <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>

      </div>

    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src="<?=$rp;?>/global/vendor/babel-external-helpers/babel-external-helpers599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/popper-js/umd/popper.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/bootstrap/bootstrap.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/animsition/animsition.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/mousewheel/jquery.mousewheel599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/asscrollbar/jquery-asScrollbar.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/asscrollable/jquery-asScrollable.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/ashoverscroll/jquery-asHoverScroll.min599c.js?v4.0.2"></script>

  <!-- Plugins -->
  <script src="<?=$rp;?>/global/vendor/switchery/switchery.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/intro-js/intro.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/screenfull/screenfull599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/vendor/slidepanel/jquery-slidePanel.min599c.js?v4.0.2"></script>

  <!-- Plugins For This Page -->
  <script src="<?=$rp;?>/global/vendor/jquery-placeholder/jquery.placeholder599c.js?v4.0.2"></script>

  <!-- Scripts -->
  <script src="<?=$rp;?>/global/js/Component.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/js/Plugin.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/js/Base.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/js/Config.min599c.js?v4.0.2"></script>

  <script src="<?=$rp;?>/assets/js/Section/Menubar.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/assets/js/Section/GridMenu.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/assets/js/Section/Sidebar.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/assets/js/Section/PageAside.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/assets/js/Plugin/menu.min599c.js?v4.0.2"></script>

  <!-- Config -->
  <script src="<?=$rp;?>/global/js/config/colors.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/assets/js/config/tour.min599c.js?v4.0.2"></script>
  <script>
    Config.set('assets', '<?=$rp;?>/assets');
  </script>

  <!-- Page -->
  <script src="<?=$rp;?>/assets/js/Site.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/js/Plugin/asscrollable.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/js/Plugin/slidepanel.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/js/Plugin/switchery.min599c.js?v4.0.2"></script>
  <script src="<?=$rp;?>/global/js/Plugin/jquery-placeholder.min599c.js?v4.0.2"></script>
  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>


  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '<?=$rp;?>/www.google-analytics.com/analytics.js',
      'ga');

    ga('create', 'UA-65522665-1', 'auto');
    ga('send', 'pageview');
  </script>
</body>


<!-- Mirrored from getbootstrapadmin.com/remark/base/pages/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Apr 2018 12:41:41 GMT -->
</html>
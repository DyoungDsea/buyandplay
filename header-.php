<header class="header-section">
    <div class="header-bottom">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <a class="site-logo site-title" href="index"><img src="assets/images/bet2.png" alt="site-logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu ml-auto">
              <li class="activev"><a href="index">Home</a></li>
              <li><a href="about">About us</a></li>
              <li class="menu_has_children"><a href="#0">blog</a>
                <ul class="sub-menu">
                  <li><a href="blog.html">Blog page</a></li>
                  <li><a href="blog-details.html">blog single</a></li>
                </ul>
              </li>
              <li><a href="contact">contact us</a></li>
              <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true ){ ?>
              <li><a href="login">Login</a></li>
              <li><a href="register">Signup</a></li>
              <?php }else{?>
                <li><a href="dashboard">Dashboard</a></li>
                <li><a href="all-tips">All Tips</a></li>
                <li><a href="logout_">Logout</a></li>
                <div class="wallet">Wallet Balance:<br> <?php echo formatNaira($wallet_); ?></div>
            <?php  } ?>

            </ul>
          </div>
        </nav>
      </div>
    </div><!-- header-bottom end -->
  </header>
<div class="custom-cursor"></div>
  <!--  header-section start  -->
  <header class="header-section">
    <div class="header-bottom">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <a class="site-logo site-title" href="home" style="margin-top:15px">
              <img style="max-width:250px" src="assets/images/buybets.png" alt="site-logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu ml-auto">
              
            <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true ){ ?> 
              <li class="activev"><a href="index">Home</a></li>
              <?php }else{?>  
                <li><a href="dashboard">Home</a></li>  
            <?php } ?>          
              <li><a href="all-avaliable-games">Tips</a></li>
              <li><a href="introduction">Introduction</a></li>
              <li><a href="how-it-works">How It Works</a></li>
              <!-- <li class="menu_has_children"><a href="#0">blog</a>
                <ul class="sub-menu">
                  <li><a href="blog">Blog page</a></li>
                  <li><a href="blog-details">blog single</a></li>
                </ul>
              </li> -->
              <!-- <li><a href="contact">contact us</a></li> -->
              
            <?php 
            $blog = $conn->query("SELECT * FROM blog ");
            if($blog->num_rows>0){
               ?>
            <li><a href="blog" target="_blank">Blog/News</a></li>
            <?php } ?> 
            <li><a href="faq">FAQ</a></li>
            <?php if(!isset($_SESSION['user']) AND @$_SESSION['user'] != true ){ ?>
              <li><a href="login">Login</a></li>
              <li><a href="register">Sign up</a></li>
              <?php }else{?>
                <li><a href="logout_">Logout</a></li>
              <?php } ?>
            </ul>
          </div>
        </nav>
      </div>
    </div><!-- header-bottom end -->
  </header>
  <?php include 'webname.php'; ?>

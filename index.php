<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');
  
    $query = $pdo->query("SELECT * FROM sermontbl ORDER BY id DESC");
    $sermon = $query->fetch(PDO::FETCH_ASSOC);

  include str_replace("\\","/",dirname(__FILE__).'/includes/head.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/nav.php');
?>
<style type="text/css">
  .home-key-areas{
    text-align: center;
    color: #d41d89;
    margin-bottom: 20px;
  }
  .home-key-areas img{
    width: 70px;
    height: 70px;
    margin-bottom: 5px;
  }
</style>
    <div class="my-jumbotron jumbotron-fluid">     
      <div class="container">  
<!--         <video class="bg-video" autoplay="true" loop="loop" preload="metadata" muted="muted">
          <source src="video/elevation-loop.mp4" type="video/mp4" />
        </video> -->                        
        <h6 class="h6">SPIRITUAL GROWTH IS NOT OPTIONAL</h6>
        <h1><?=$sermon['title'];?></h1>
        <a href="sermons-view.php?title=<?=$sermon['title'];?>" class="btn btn-md btn-custom btn-pinky"> Get Latest Sermon</a>
        <!-- <p class="intro-note"><a href="#">View our Resources</a></p> -->
      </div>
    </div>
<!--     <div class="social-intro">
        <div class="container-fluid">
          <div class="row social-intro-row">
            <div class="col-sm-8 col-md-8">
              <div class="social-intro-note">
                <p>Join the community of word believers today.</p>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="social-intro-icons">
                <a href="#"><i class="fa fa-facebook fa-2x intro-icons" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram fa-2x intro-icons" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter fa-2x intro-icons" aria-hidden="true"></i></a>
              </div>
            </div>                        
          </div>
        </div>
    </div> -->

    <!-- About Saltcity intro section -->

    <div class="container">
      <div class="home-about-flex">
        <div class="col-md-6  pusher-2">
            <h1>Saltcity Is a joyous community of Word Livers.</h1>
            <p>We are committed to the studying, teaching and application of God’s Word in all of life.
            We believe in the divine inspiration and the absolute authority of the Christian Bible. We believe the Bible is inerrant (incapable of error) in it’s content and altogether sufficient for faith (belief) and practice (behavior). 
            </p>
            <!-- <a href="" class="btn btn-md btn-custom btn-pinky"> Learn More</a> -->
        </div>        
      </div>
    </div>

    <div class="container">
      <div class="row pusher">
        <div class="col-md-4">
          <div class="home-key-areas">
            <img src="images/grow.png">
            <h5>Connect and Grow</h5>
          </div>
        </div>
        <div class="col-md-4">
          <div class="home-key-areas">
            <img src="images/involve.png">
            <h5>Partner with the vision</h5>
          </div>
        </div>
        <div class="col-md-4">
          <div class="home-key-areas">
            <img src="images/institute.png">
            <h5>Saltish Institute</h5>
          </div>
        </div>                
      </div>
    </div>


<?php
  include str_replace("\\","/",dirname(__FILE__).'/includes/sermon.php');
  // include str_replace("\\","/",dirname(__FILE__).'/includes/blog.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/prayer.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/location-times.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/foot.php');
?>
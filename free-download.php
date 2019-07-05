<?php
require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

  include str_replace("\\","/",dirname(__FILE__).'/includes/head.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/nav.php');

?>
 
<style type="text/css">

#custom-search-input .search-query{
  /*background-color: #2f3238 !important;*/
}
  /*login form*/
.flex-form{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 80vh;
  color: #ccc;
}
.myform{
  background-color:#000000a8;
  flex-direction: column;
  padding:20px 15px 35px 15px;
  color:#fff;
}
.form-pill{
  border-radius: 6.1875rem;
  padding-left: 1rem;
  padding-right: 1rem;  
}
.login-bg{
  background-color: #280a2f;
  background-image: url('images/6.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  /*background-color: #000;*/
  background-blend-mode: overlay;  
  min-height: 100vh;
}
.box-holder{
  background-color:#000000a8;
  padding:20px 15px 20px 15px;
  color:#fff;
  margin-bottom: 15px;  
}
</style>

<div class="container-fluid login-bg">
  <div class="row flex-form">
    <div class=" col-md-6 pusher-2" >
        <div class="pusher">
            <h1>Saltworship</h1>
            <p>We’ve been able to put Together an “Un-Cut Worship EP project” containing some of our songs coming out in the Album and covers of some of our favorite worship songs from other Artiste.<br><br>

            It’s a little short of an absolute professional mix, but nothing short in its proficiency to enhance and deepen your worship space.  
            </p>
            <!-- <a href="" class="btn btn-md btn-custom btn-pinky"> Learn More</a> -->
        </div>       
      <div class="row text-center">
        <div class="col-md-6">
          <div class="box-holder">
            <h2>Worship project mix</h2>
            <a class="btn btn-custom btn-pinky form-pill" href="sermon/Worship_Project.mp3" download="Worship_Project.mp3">Download</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box-holder">
            <h2>Holyghost and Fire mix</h2>            
            <a class="btn btn-custom btn-pinky form-pill" href="sermon/Holy_Ghost_and_fire.mp3" download="Holy_Ghost_and_fire.mp3">Download</a>
          </div>
        </div>          
      </div>   
    </div>
  </div>
</div>

<?php
  include str_replace("\\","/",dirname(__FILE__).'/includes/foot.php');
?>
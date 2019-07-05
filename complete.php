<?php
  include str_replace("\\","/",dirname(__FILE__).'/includes/head.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/nav.php');
?>





<style>
/*login form*/
.navbar-expand-lg{
	background: #0400EE;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #F81D89, #5C1D89);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #F81D89, #5C1D89); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.flex-form{
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 60vh;
	margin-top: 70px;
}
.myform{
	background-color:#333333;
	flex-direction: column;
	padding-top:25px;
	padding-bottom: 25px;
	color:#fff;
	text-align: center;
}
.myform .display{
	font-size: 18px;
	padding: 7px;
}

</style>
<div class="container">
  <div class="row flex-form">
    <div class=" col-md-8" >
        <div class="myform">
       <h2 class="align-center" style="margin:0px; padding:0px;">
            Payment Successful
        </h2>        	
        <!-- <p class="text-center" style="margin:7px; padding:15px;background-color:#f71d89;"><i>An Email is sent to you with an <b>invoice code</b> of completed transaction.</i></p> -->
        <h2 class="display">
        Join our social media community!.
        </h2>
              <div class="blog-view-social-icons">
		            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
		            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
		            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
		            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>    	
               <!--  <a href="#"><i class="fa fa-facebook fa-2x intro-icons" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram fa-2x intro-icons" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter fa-2x intro-icons" aria-hidden="true"></i></a> -->
              </div>
        </div>
    </div>
  </div>
</div>

<?php
// include "includes/prodAction.php";
// include "includes/counter.php";
// include "includes/testimonials.php";
include "includes/foot.php";
?>
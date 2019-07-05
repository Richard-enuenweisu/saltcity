<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');



 if (isset($_POST['submit'])) {

    $email = ((isset($_POST['email']) && $_POST['email'] != '')? sanitize($_POST['email']):'');
    $purpose = ((isset($_POST['purpose']) && $_POST['purpose'] != '')? sanitize($_POST['purpose']):'');
    $amount = ((isset($_POST['amount']) && $_POST['amount'] != '')? sanitize($_POST['amount']):''); 

    $error = array();
    $msg = 'Form Filled Successully!';
    $decision = false;

    if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
    { 
    $error[].= 'Please enter a valid email. <br>';
    }
    if (!preg_match("/^[1-9][0-9]{0,19}$/", $amount)) {
        // Error
         $error[].= 'Please enter a valid number. <br>';        
    }
    if ($purpose == '--Select--') {
        # code...
         $error[].= 'Please select payment purpose. <br>';
    }

    if (empty($error)) {
        // $msg= 'sessioned data. <br>';
        setcookie("cookieData[email]", htmlentities($email), time()+7200);  /* expire in 2 hour */
        setcookie("cookieData[purpose]", htmlentities($purpose), time()+7200);  /* expire in 2 hour */
        setcookie("cookieData[amount]", htmlentities($amount), time()+7200);  /* expire in 2 hour */

    }
}
        // after the page reloads, print them out
    // if (isset($_COOKIE['cookieData'])) {
    //     foreach ($_COOKIE['cookieData'] as $name => $value) {
    //         $name = $name;
    //         $value = $value;
    //         echo "$name : $value <br />\n";
    //     }
    // }


  include str_replace("\\","/",dirname(__FILE__).'/includes/head.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/nav.php');
?>

<style type="text/css">
/*	.navbar-expand-lg{
	background: #0400EE; 
	background: -webkit-linear-gradient(to right, #F81D89, #5C1D89); 
	background: linear-gradient(to right, #F81D89, #5C1D89); 
	}*/
.payform{
    background-color: #fff;
    margin-top:-50px;  
    border: 1px solid #dee2e6;  
}
.payform form{
    margin-top: 50px;
    padding: 15px;
}
.Partnership-flex{
    display: flex;
    height: 550px;
    flex-direction: column;
    justify-content: center;
    align-content: center;
}
</style>

<!-- hidden-xs-down = d-none d-sm-block
hidden-sm-down = d-none d-md-block
hidden-md-down = d-none d-lg-block
hidden-lg-down = d-none d-xl-block
hidden-xl-down = d-none (same as hidden)
hidden-xs (only) = d-none d-sm-block (same as hidden-xs-down)
hidden-sm (only) = d-block d-sm-none d-md-block
hidden-md (only) = d-block d-md-none d-lg-block
hidden-lg (only) = d-block d-lg-none d-xl-block
hidden-xl (only) = d-block d-xl-none -->
<div class="give-header-container">
	<div class="container">
	   <div class="row give-header">   
	      <div class="col-sm-6 col-md-6">
	      	<div class="give-head-caption">
	      		<h1>Invest in eternity!</h1>
	      		<p>
	      			Join us as we expand the kingdom of heaven here on earth. 
                    looking back on the endowment of God’s goodness in our journey so far, we can only cry ‘what’s next papa?’ We also look forward with anticipation to what He is doing next.
	      		</p>
	      	</div>
	      </div>       
	   </div>
	 </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-6 d-none d-md-block">
	        <div class="Partnership-flex pusher">
	            <h1>Partnership is a convenant.</h1>
	            <p>
	            We believe generosity is a form of worship. We love to display our gratitude and devotion to God through tithes and offerings from the blessings God has placed in our hands.

	            Your financial gift to this vision is vehicle for the spread of the gospel round the world. 

	            Give Today!
	            </p>
	        </div>        
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="payform">
                <form method="POST" action="give.php">             
                    <div class="modal-body">  
                            <h2>Give Online Today.</h2>
                                <?php if(!empty($error)){?>
                                    <div class="errorWrap">
                                    <?php
                                     echo display_errors($error); 
                                    ?> 
                                </div>
                                <?php } 
                                else if(!empty($msg)){?>
                                <?php 
                                // echo ($msg); 
                                ?> 
                                <script src="https://js.paystack.co/v1/inline.js"></script>                                
                                <button type="button" class="btn btn-success btn-custom push" href="#" onclick="payWithPayStack()">Click here to continue</button>

                                <?php }?>                                                                    
                          <div class="form-group push">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?=((isset($email))? $email:'')?>" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Purpose</label>
                            <select class="form-control" name="purpose">
                                <option><?=((isset($purpose))?$purpose:'--Select--')?></option>
                                <option>Offering</option>
                                <option>Tithe</option>
                                <option>Partnership</option>
                            </select>
                            <small id="emailHelp" class="form-text text-muted">Please Select an option.</small>    
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount" value="<?=((isset($amount))? $amount:'')?>" aria-describedby="amountHelp" placeholder="Enter Amount">
                            <small id="capamount" class="form-text text-muted">Please enter a valid amount e.g 10000.</small>
                          </div> 
                     </div>                                                                           
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-custom btn-pinky" name="submit">Continue</button>
                    </div>
                 </form> 
            </div>
        </div> 
    </div>   
</div>

<div class="give-tribe-holder pusher">
  <div class="container-fluid">
    <div class="row home-header-flex">
      <div class="col-md-8 push">
          <h1>The Salt Tribe</h1>
            <p>
              God Gives his vision to one man but all through the scripture, we see that he always sends partners to that one one man. He made this visible in the life of Jesus, Peter, and Paul. The Vision of the Salt Tribe is expressed through various platforms
            </p>
      </div>        
    </div>
    <div class="row">
    	<div class="col-sm-2 col-md-2">
    		<div class="tribe-flex">
    			<h3>Church Minstry planting</h3>
    		</div>
    	</div>
    	<div class="col-sm-2 col-md-2">
    		<div class="tribe-flex">
    			<h3>Media Outreach</h3>
    		</div>
    	</div>
    	<div class="col-sm-2 col-md-2">
    		<div class="tribe-flex">
    			<h3>Conferences and Crusades</h3>
    		</div>
    	</div>
    	<div class="col-sm-2 col-md-2">
    		<div class="tribe-flex">
    			<h3>Compus Missions</h3>
    		</div>
    	</div>
    	<div class="col-sm-2 col-md-2">
    		<div class="tribe-flex">
    			<h3>Cyber Missions</h3>
    		</div>
    	</div>
    	<div class="col-sm-2 col-md-2">
    		<div class="tribe-flex">
    			<h3>Worship Company</h3>
    		</div>
    	</div>    	    	    	    	    	
    </div>
   </div>
</div>

<div class="container">
    <div class="row projects-row home-header-flex">
      <div class="col-md-8 pusher">
          <h1>Current Project</h1>
            <p>
              Cuurently, we are working on the following
            </p>
            <div class="project-details">
            	<h3>Roof Reconstruction (urgent) - &#x20a6;2,850,000</h3>
            </div>  
            <div class="project-details">
            	<h3>Toilet and Water System - &#x20a6;550,000</h3>
            </div>  
            <div class="project-details">
            	<h3>Planting of FUPRE Church - &#x20a6;5000,000</h3>
            </div>  
            <div class="project-details">
            	<h3>50' Television for projection</h3>
            </div>  
            <div class="project-details">
            	<h3>2 Laptops for Sermon Recording and Projection</h3>
            </div>  
            <div class="project-details">
            	<h3>Radio Broadcast - &#x20a6;3000,000 Quarterly</h3>
            </div>                                                                                                                   
      </div>        
    </div>	
</div>

<?php
  include str_replace("\\","/",dirname(__FILE__).'/includes/paystack.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/foot.php');
?>
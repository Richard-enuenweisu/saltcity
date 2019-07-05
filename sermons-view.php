<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

if (isset($_GET['title'])){
    $title = trim($_GET['title']);
    $stmt = $pdo->prepare("SELECT * FROM sermontbl WHERE title =:title");
    $stmt->execute([':title' => $title]);
    $get_sermon = $stmt->fetch(PDO::FETCH_ASSOC);

   	if (is_null($get_sermon) || empty($get_sermon)) {
	# code...
	header('Location:sermon.php');
	} 

    $sermon_id = intval($get_sermon['id']);

    $msg_query = $pdo->query("SELECT * FROM messagetbl WHERE sermon_id = $sermon_id");

}
  include str_replace("\\","/",dirname(__FILE__).'/includes/head.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/nav.php');
?>

<style type="text/css">
.navbar-expand-lg{
	background: #0400EE;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #F81D89, #5C1D89);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #F81D89, #5C1D89); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
#custom-search-input .search-query{
	/*background-color: #2f3238 !important;*/
}
</style>

<div class="container">
  <div class="row">
	<div class="blog-search-flex">
	    <div class="col-md-8 pusher-3">
	        <h1>Grow as a workman</h1>
	        <p>
	        Week in, week out, we are totally sold out to seeking the face of God for his seasonal counsel for his church to equip you. We hope that these sermons help you growth. 
			</p>
    	    <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" class="search-query form-control" placeholder="Search" />
                    <span class="input-group-btn">
                        <button type="button" disabled>
                            <span class="fa fa-search"></span>
                        </button>
                    </span>
                </div>
            </div>

			<div class="row sermon-media pusher">
				<div class="col-sm-12 col-md-12">
				    <div class="row sermon-view-details">
					  <div class="col-md-4">
		                  <img src="<?=$get_sermon['image']?>">	                  
					  </div>
					  <div class="col-md-8">
						  	<div class="sermon-child-details">
							    <span class="small"><?=$get_sermon['source']?></span><br>
								<b><?=$get_sermon['title']?></b>
							</div>						
						<hr>
						<?php while($message = $msg_query->fetch(PDO::FETCH_ASSOC)) : ?>	  	
							<div class="sermon-child-details">
							  	<div class="mediPlayer">
								    <audio class="listen" preload="none" data-size="50" src="<?=$message['path']?>"></audio>
								</div>
								<div class="sermon-descriptions">
							    <div class="sermon-ellipse dropdown">
							    	<a class="my-ellipse" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true" ></i>
									</a>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								    <a class="dropdown-item" href="<?=$message['path']?>" download="<?=$message['title'];?>"><i class="fa fa-download" aria-hidden="true"></i> Download Sermon</a>
								    <a class="dropdown-item" href="contact.php"><i class="fa fa-comments-o" aria-hidden="true"></i> Send feedback</a>
								    <a class="dropdown-item" href="give.php"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Partner wih us</a>
								  </div>
								</div>								
								    <span class="small"><?=$message['sermon_by']?></span><br>
									<b><?=$message['title']?></b>
									<p><?=$message['duration']?></p>
								</div>
								<hr>					
							</div>	
					    <?php endwhile;?>			
					    <!-- <div class="media-attribution"><em>30:64</em> - </div> -->
					  </div>
					</div>			
				</div>
			</div>	            
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
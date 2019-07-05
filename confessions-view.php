<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

if (isset($_GET['title'])){
    $title = trim($_GET['title']);
    $stmt = $pdo->prepare("SELECT * FROM confessionstbl WHERE title =:title");
    $stmt->execute([':title' => $title]);
    $confessions = $stmt->fetch(PDO::FETCH_ASSOC);

	$post_date = strtotime( $confessions['post_time'] );
	$mydate = date('l jS F Y', $post_date );

	$myId = intval($confessions['id']);
	
	// views query
    $query = $pdo->query("SELECT count(confession_id) as views FROM confessionviewstbl WHERE confession_id = $myId");
    $views = $query->fetch(PDO::FETCH_ASSOC);

    // get user IP
    $user_ip = getUserIpAddr();
	$query_2 = $pdo->prepare('SELECT * FROM confessionviewstbl WHERE confession_id = ? AND user_ip = ?');
	$query_2->execute([$myId , $user_ip]);
 	$row = $query_2->rowcount();

if ($row <= 0 || is_null($row)) {
    $insert_query = $pdo->prepare("INSERT INTO confessionviewstbl (`confession_id`, `user_ip`) VALUES (:confession_id ,:uip)");
    $insert_query->execute([':confession_id' =>$myId,':uip' =>$user_ip]);
}  	

	// Confession resources query
    $find_resources = $pdo->query("SELECT * FROM confessionsrstbl WHERE confession_id = $myId");
    $resources = $find_resources->fetch(PDO::FETCH_ASSOC);


if (is_null($confessions) || empty($confessions)) {
	# code...
	header('Location:confessions.php');
}
}
elseif (!isset($_GET['title']) || $_GET['title'] = '' ) {
	# code...
	header('Location: confessions.php');
}
	// get recent confessions
	$con_query = $pdo->query("SELECT * FROM confessionstbl ORDER BY id DESC LIMIT 5");

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
	<div class="row my-row pusher">
		<div class="col-sm-8 col-md-8">
			<div class="blog-post-holder pusher-2">
				<h1><?=$confessions['title']?></h1>
				<img src="<?=$confessions['image']?>" alt="<?=$confessions['image']?>">				
				<div class="blog-post-description">
				<div class="row" style="color: #949596; padding: 5px; ">
					<div class="col-8" style="text-align: left;">
						<p class="small"><?=$confessions['posted_by']?> • <?=$mydate?></p>
					</div>
					<div class="col-4" style="text-align: right;">
						<i class="fa fa-eye"></i><span class="small"><?=$views['views'];?> Views</span>
					</div>					
				</div>					
				<p><?=$confessions['description']?></p>
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="resource-file">
							<div class="">
								<i class="fa fa-file fa-2x"></i>
								<p>Resource image</p>
								<a href="<?=(empty($resources['rs_image']))?'No Image!': $resources['rs_image']?>" download="<?=$confessions['title']?>" class="btn btn-sm"><?=(empty($resources['rs_image']))?'No Image!': 'Download Image'?></a>
							</div>							
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="resource-file">
							<div class="">
								<i class="fa fa-file fa-2x"></i>
								<p>Resource Audio</p>
								<a href="<?=(empty($resources['rs_audio']))?'#': $resources['rs_audio']?>" download="<?=$confessions['title']?>" class="btn btn-sm"><?=(empty($resources['rs_audio']))?'No Audio!': 'Download Audio'?></a>							</div>							
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="resource-file">
							<div>
							<i class="fa fa-file fa-2x"></i>
							<p>Resource PDF</p>
								<a href="<?=(empty($resources['rs_pdf']))?'#': $resources['rs_pdf']?>" download="<?=$confessions['title']?>" class="btn btn-sm"><?=(empty($resources['rs_pdf']))?'No pdf!': 'Download PDF'?></a>							
							</div>
						</div>
					</div>															
				</div>
					<div class="social-share">
						<!-- <h1 class="h1">Thank you for reading, remeber to share!</h1>
						<hr style="border-color: #ccc; width: 95%;">
						<h5>Share</h5> -->
						<div id="demo1"></div><br>
					</div>					
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-md-4">			
			<div class="row pusher">
				<div class="col-md-12 push">
					<div class="related-post-container">
						<div class="">
							<img class="img-fluid" src="images/blog-post.png">
						</div>						
						<div class="related-posts-caption">
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
					        <div class="blog-previous-post push">
								<h6 class="h6">Recent Posts</h6>
								<ul>
							      <?php while($recent = $con_query->fetch(PDO::FETCH_ASSOC)) : 
									$post_date = strtotime($recent['created_at'] );
									$mydate = date('l jS F Y', $post_date );
							      	?>
									<li><a href="confessions-view.php?title=<?=$recent['title'];?>"><?=$recent['title'];?></a><br>
										<span class="small"><?=$recent['posted_by'];?> • <?=$mydate;?></span>
									</li>
							      <?php endwhile;?> 																		
								</ul>				            	
				            </div>	
<!-- 							<div class=" blog-post-tags">
								<h6 class="h6">You Might Like:</h6>
								<div class="btn-group btn-group-sm flex-wrap" role="group" aria-label="Basic example">
								  <a href="" class=" badge-dark">Healing</a>
								  <a href="" class=" badge-dark">Salvation</a>
								  <a href="" class=" badge-dark">Miracles</a>
								  <a href="" class=" badge-dark">Love</a>
								  <a href="" class=" badge-dark">Breakthrough</a>
								  <a href="" class=" badge-dark">Word</a>
								  <a href="" class=" badge-dark">Life</a>
								  <a href="" class=" badge-dark">Save</a>
								  <a href="" class=" badge-dark">Power</a>		
								  <a href="" class=" badge-dark">Miracles</a>
								  <a href="" class=" badge-dark">Love</a>
								  <a href="" class=" badge-dark">Breakthrough</a>					  			  					  
								</div>
							</div> -->	
			              <div class="blog-view-social-icons">
			              	<h6 class="h6">Follow us:</h6>
				            <li class="list-inline-item"><a href="https://web.facebook.com/mysaltcity/?_rdc=1&_rdr">
				              <i class="fa fa-facebook"></i></a></li>
				            <li class="list-inline-item"><a href="https://twitter.com/mysaltcity"><i class="fa fa-twitter"></i></a></li>
				            <li class="list-inline-item"><a href="https://www.instagram.com/mysaltcity/"><i class="fa fa-instagram"></i></a></li>
				            <li class="list-inline-item"><a href="mailto://hello@mysaltcity.org"><i class="fa fa-google-plus"></i></a></li>
			              </div>										            					
						</div>
						<div class="">
							<img class="img-fluid" src="images/blog-post.png">
						</div>												
					</div>					
				</div>				
			</div>
		</div>		
	</div>
</div>
  <!-- Social media share script -->
<!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>   -->
<?php
$url ='http://www.thegloriousfountainministries.com';
$title = 'Sharing post';
?>
<script type="text/javascript" src="bootstrap-4.3.1-dist/js/pisocials.js"></script>
<script>
$(function(){
var param1 = {
  "services": [
    "facebookShare",
    "facebookLike",
    "twitter",
    "googleplus",
    "pocket"
  ],
  "url": "<?=$url?>",
  "title": "<?=$title?>",
  "size": "S",
  "design": "flat",
  "round": 5,
  "color": ""
}
$("#demo1").pisocials(param1);  

var param2 = {
  "services": [
    "facebookShare",
    "facebookLike",
    "twitter",
    "googleplus",
    "pocket"
  ],
  "url": "<?=$url?>",
  "title": "<?=$title?>",
  "size": "L",
  "design": "official",
  "round": 0,
  "color": ""
}
$("#demo2").pisocials(param2);
});

</script>
<!-- <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> -->

<?php
  include str_replace("\\","/",dirname(__FILE__).'/includes/foot.php');
?>
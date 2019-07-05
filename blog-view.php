<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

if (isset($_GET['title'])){
    $title = trim($_GET['title']);
    $stmt = $pdo->prepare("SELECT * FROM blogtbl WHERE title =:title");
    $stmt->execute([':title' => $title]);
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);

	$post_date = strtotime( $blog['post_time'] );
	$mydate = date('l jS F Y', $post_date );

	$myId = intval($blog['id']);
	
	$query = $pdo->query("SELECT count(blog_id) as views FROM blogviewstbl WHERE blog_id = $myId");
    $views = $query->fetch(PDO::FETCH_ASSOC);

    $user_ip = getUserIpAddr();

	$query_2 = $pdo->prepare('SELECT * FROM blogviewstbl WHERE blog_id = ? AND user_ip = ?');
	$query_2->execute([$myId , $user_ip]);
 	$row = $query_2->rowcount();
 	$result =$query_2->fetch(PDO::FETCH_ASSOC);

  if ($row <= 0 || is_null($row)) {
    $insert_query = $pdo->prepare("INSERT INTO blogviewstbl (`blog_id`, `user_ip`) VALUES (:blogid ,:uip)");
    $insert_query->execute([':blogid' =>$myId,':uip' =>$user_ip]);
}  	

	// blog tag
	$rec_query = $pdo->query("SELECT * FROM blogtbl ORDER BY id DESC LIMIT 5");
    
if (is_null($blog) || empty($blog)) {
	# code...
	header('Location:blog.php');
}

}
elseif (!isset($_GET['title']) || $_GET['title'] = '' ) {
	# code...
	header('Location: blog.php');
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
	<div class="row my-row pusher">
		<div class="col-sm-8 col-md-8">
			<div class="blog-post-holder pusher-2">
				<h1><?=$blog['title']?></h1>
				<img src="<?=$blog['image']?>" alt="blog-posts">				
				<div class="blog-post-description">
				<div class="row" style="color: #949596; padding: 5px; ">
					<div class="col-8" style="text-align: left;">
						<p class="small"><?=$blog['posted_by']?> • <?=$mydate?></p>
					</div>
					<div class="col-4" style="text-align: right;">
						<i class="fa fa-eye"></i><span class="small"><?=$views['views'];?> Views</span>
					</div>					
				</div>					
				<p><?=$blog['description']?></p>
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
							<img class="img-fluid" src="images/posts.png">
						</div>						
						<div class="related-posts-caption">
				            <div id="custom-search-input">
				                      <div class="input-group">
				                          <input type="text" class="search-query form-control" name="searcher" id="searcher" placeholder="Search" autocomplete="off" onkeyup="fetch_select(this.value);" onblur="losefocus()"/>
				                          <span class="input-group-btn">
				                              <button type="button" disabled>
				                                  <span class="fa fa-search"></span>
				                              </button>
				                          </span>
				                      </div>
				              <div class="row" id="search_holder">
				                <div id="results" style="width: 100%;">

				                </div>
				              </div>                
				            </div>	
				            <div class="blog-previous-post push">
								<h6 class="h6">Recent Posts</h6>
								<ul>
							      <?php while($recent = $rec_query->fetch(PDO::FETCH_ASSOC)) : 
									$post_date = strtotime($recent['created_at'] );
									$mydate = date('l jS F Y', $post_date );
							      	?>
									<li><a href="blog-view.php?title=<?=$recent['title'];?>"><?=$recent['title'];?></a><br>
										<span class="small"><?=$recent['posted_by'];?> • <?=$mydate;?></span>
									</li>
							      <?php endwhile;?> 																		
								</ul>				            	
				            </div>		
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
<script type="text/javascript">
function fetch_select(val)
{
 // alert("working " +val);
 $.ajax({
 type: 'post',
 url: 'load_data.php',
 data: {
  get_blog:val
 },
 success: function (response) {
 if (response == "") {
  document.getElementById("search_holder").classList.remove("scontent");
  document.getElementById("results").classList.remove("sresult");
  document.getElementById("results").innerHTML=response; 
 }else{
  document.getElementById("search_holder").classList.add("scontent");
  document.getElementById("results").classList.add("sresult");
  document.getElementById("results").innerHTML=response; 
 }
 }
 });
}
function losefocus(){
setTimeout(
  () => {
    // document.getElementById('searcher').value = "";
    // document.getElementById("search_holder").classList.remove("scontent");
    // document.getElementById("results").classList.remove("sresult");
    // document.getElementById("results").innerHTML = ""; 
  },
  0.2 * 1000
);
}
</script>

<?php
  include str_replace("\\","/",dirname(__FILE__).'/includes/foot.php');
?>
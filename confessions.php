<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

  $query = $pdo->query("SELECT * FROM confessionstbl ORDER BY id ASC LIMIT 24");
  include str_replace("\\","/",dirname(__FILE__).'/includes/head.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/nav.php');
?>
<style type="text/css">

	
</style>
<div class="container-fluid resources-header-holder">
      <div class="about-content-flex">
        <div class="col-md-6 push">
            <h1>Find Confessions</h1>
    	    <div id="custom-search-input">
                <div class="input-group">
                    <input type="text" class="search-query form-control" name="searcher" id="searcher" placeholder="Search" autocomplete="off" onkeyup="fetch_select(this.value);" onblur="losefocus()"/>
                    <span class="input-group-btn">
                        <button type="button" disabled>
                            <span class="fa fa-search"></span>
                        </button>
                    </span>
                </div>
				<div id="search_holder">
					<div id="results">

					</div>
				</div>                
            </div>
        </div>        
      </div>
</div>

<div class="container">
  <div class="row">
	<div class="home-about-flex">
	    <div class="col-md-8 pusher" id="scroller">
	        <h1>Grow as a workman</h1>
	        <p>
	        SaltCity is a joyous community of Word Livers. We are committed to the studying, teaching and application of God’s Word in all of life.
			</p>
	        <!-- <a href="" class="btn btn-md btn-custom btn-pinky"> Learn More</a> -->
	    </div>		
	</div>        
  </div>
</div>

<div class="container  pusher">
    <div class="row" id="output">
      <?php while($blog = $query->fetch(PDO::FETCH_ASSOC)) : ?>

            <input type="hidden" name="total_pages" id="total_pages" value="<?=$total_pages?>">
            <input type="hidden" name="page" id="page" value="<?=$page;?>">

            <div class="col-sm-4 col-md-4">
              <div class="grid">
                <figure class="effect-oscar">
                <a href="confessions-view.php?title=<?=$blog['title']?>">
                  <img src="<?=$blog['image']?>" alt="<?=$blog['image']?>"/>
                  <figcaption>
                    <!-- <h2>Warm <span>Oscar</span></h2> -->
                    <!-- <p>Oscar is a decent man. He used to clean porches with pleasure.</p> -->
                    <!-- <a href="#">View more</a> -->
                  </figcaption>           
                </a>    
                </figure>
              </div>
          </div> 
      <?php endwhile; ?>      
    </div>
    <div class="pusher"></div>

       
<!-- 	<div class="row blog-search-flex" style="color: #ccc">
	  <ul class="pagination pusher">
	    <li class="page-item">
	      <a class="page-link" href="#" aria-label="Previous">
	        <span aria-hidden="true">«</span>
	        <span class="sr-only">Previous</span>
	      </a>
	    </li>
	    <li class="page-item"><a class="page-link" href="#">1</a></li>
	    <li class="page-item"><a class="page-link" href="#">2</a></li>
	    <li class="page-item"><a class="page-link" href="#">3</a></li>
	    <li class="page-item">
	      <a class="page-link" href="#" aria-label="Next">
	        <span aria-hidden="true">»</span>
	        <span class="sr-only">Next</span>
	      </a>
	    </li>
	  </ul>	
	</div>   -->   
</div>

<script type="text/javascript">
function fetch_select(val)
{
 // alert("working " +val);
 $.ajax({
 type: 'post',
 url: 'load_data.php',
 data: {
  get_option:val
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
	  document.getElementById('searcher').value = "";
	  document.getElementById("search_holder").classList.remove("scontent");
	  document.getElementById("results").classList.remove("sresult");
	  document.getElementById("results").innerHTML = ""; 
  },
  0.2 * 1000
);
}
</script>

<?php
  include str_replace("\\","/",dirname(__FILE__).'/includes/foot.php');
?>
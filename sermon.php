<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

  $sermon_query = $pdo->query("SELECT * FROM sermontbl ORDER BY id DESC LIMIT 20");

  include str_replace("\\","/",dirname(__FILE__).'/includes/head.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/nav.php');
?>

<div class="container-fluid sermon-header-holder">
      <div class="about-content-flex">
        <div class="col-md-6 push">
            <h1>Get Recent Sermon</h1>
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
	<div class="blog-search-flex">
	    <div class="col-md-8 pusher">
	        <h1>Grow as a workman</h1>
	        <p>
	        Week in, week out, we are totally sold out to seeking the face of God for his seasonal counsel for his church to equip you. We hope that these sermons help you growth. 
			</p>
	        <!-- <a href="" class="btn btn-md btn-custom btn-pinky"> Learn More</a> -->
	    </div>		
	</div>        
  </div>
</div>

<!-- <div class="container custom-menu">
	<div class="row">
		<ul class="nav justify-content-center">
		  <li class="nav-item">
		    <a class="nav-link active" href="#">All</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#">Albums</a>
		  </li> 
		</ul>		
	</div>
</div>
            -->    
<div class="container sermon-media push">
    <div class="row" id="output">
      <?php while($sermon = $sermon_query->fetch(PDO::FETCH_ASSOC)) : ?>
          <div class="col-sm-6 col-md-6">
              <div class="media media-details">         
                <div class="media-left">
                        <a href="sermons-view.php?title=<?=$sermon['title']?>">
                          <img src="<?=$sermon['image']?>" alt="<?=$sermon['image']?>">
                        </a>
                </div>
                <div class="media-body">
                <a href="sermons-view.php?title=<?=$sermon['title']?>">       
                  <p><?=$sermon['source']?></p>
                <h5><?=$sermon['title']?></h5>  
                  <!-- <div class="media-attribution"><em>30:64</em> - </div> -->
                </a>
                </div>
            </div>
          </div>          
      <?php endwhile; ?> 	
    </div>
</div>

<script type="text/javascript">
function fetch_select(val)
{
 // alert("working " +val);
 $.ajax({
 type: 'post',
 url: 'load_data.php',
 data: {
  get_sermon:val
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
<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

  $query = $pdo->query("SELECT * FROM blogtbl ORDER BY id DESC LIMIT 20");

  include str_replace("\\","/",dirname(__FILE__).'/includes/head.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/nav.php');
?>
<!-- navbar navbar-expand-lg bsnav bsnav-light -->


<!-- Scroling Text Code -->
<div class="container-fluid blog-header-container">
   <div class="row blog-header-flex">
      <div class="col-md-6 pusher-2">
			<h1>
			  <a href="" class="typewrite" data-period="2000" data-type='[ "We are the Salt of the Earth", "We are the saviour of men", "Our community of word believers","A bible teaching church in Warri.","whets the appetite of the City","We are going foward" ]'>
			    <span class="wrap"></span>
			  </a>
			</h1> 
            <p>
              Here you can find clarity for important subjects about your faith, personal questions, encouragements and instructions. We hope these articles help you grow. 
            </p>
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

  <div class="row pusher-2" id="output">
      <?php while($blog = $query->fetch(PDO::FETCH_ASSOC)) : 
        $post_date = strtotime( $blog['post_time'] );
        $mydate = date('l jS F Y', $post_date );
        ?>
        <div class="col-sm-6 col-md-6">
          <div class="grid">
            <a href="blog-view.php?title=<?=$blog['title']?>">
              <figure class="effect-zoe">
                <img src="<?=$blog['image']?>" alt="<?=$blog['image']?>"/>
                <figcaption>
                  <div>
                    <span class="small"><?=$blog['posted_by']?> • <?=$mydate?></span>
                  </div>
                  <h5 class="h5"><?=$blog['title']?></h5>
                  <div class="description"><?=substr($blog['description'], 0, 89).'...'; ?></div>
                </figcaption>     
              </figure>
            </a>            
          </div>
        </div>            
      <?php endwhile;?>     
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
	</div> -->
</div>

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
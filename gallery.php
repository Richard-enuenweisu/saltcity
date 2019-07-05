<style type="text/css">
	.navbar-expand-lg{
	background: #0400EE;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #F81D89, #5C1D89);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #F81D89, #5C1D89); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
	#custom-search-input .search-query{
		background-color: #2f3238 !important;
	}
.cover-card {
	border: 2px solid white;
	background: silver;
	padding: 0px;
	margin: 0px;
	height:200px;
}
.cover-card > p {
	text-align: center;
	background-color: rgba(6,6,6,0.0);
	color: rgba(6,6,6,0.0);
	width: 100%;
	height: 100%;
	font-weight: bold;
	font-size: 20px;
}
.cover-card:hover > p {
	background-color: rgba(6,6,6,0.3);
	color: white;
	text-shadow: 3px 3px 10px #000;
}	
</style>

<div class="container-fluid">
	<div class="row text-center">
		<h3 style="color:white;font-family:verdana;">Snap Tight Image Tiles (Responisve)<br><small><a href="http://samuelobitope.000webhostapp.com/">Samuel obitope</small></h3>
	</div>
	<div class="row">
		<div class="cover-card col-sm-4" style="background: url(http://lorempixel.com/300/200/nightlife/2) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>
		<div class="cover-card col-sm-8" style="background: url(http://lorempixel.com/600/200/nightlife/3) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>
		<div class="cover-card col-sm-3" style="background: url(http://lorempixel.com/300/200/nightlife/1) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>
		<div class="cover-card col-sm-3" style="background: url(http://lorempixel.com/300/200/nightlife/4) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>
		<div class="cover-card col-sm-3" style="background: url(http://lorempixel.com/300/200/nightlife/6) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>
		<div class="cover-card col-sm-3" style="background: url(http://lorempixel.com/300/200/nightlife/) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>

		<div class="cover-card col-sm-4" style="background: url(http://lorempixel.com/600/200/city/4) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>
		<div class="cover-card col-sm-4" style="background: url(http://lorempixel.com/300/200/city/5) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>
		<div class="cover-card col-sm-4" style="background: url(http://lorempixel.com/300/200/city/6) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>
		<div class="cover-card col-sm-6" style="background: url(http://lorempixel.com/300/200/city/7) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>
		<div class="cover-card col-sm-6" style="background: url(http://lorempixel.com/300/200/city/8) no-repeat center top;background-size:cover;">
			<p>
				Text Caption
			</p>
		</div>
	</div>
</div>


<?php
  include str_replace("\\","/",dirname(__FILE__).'/includes/foot.php');
?>
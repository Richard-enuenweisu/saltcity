<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

if (!isset($_SESSION['USER_ID'])) {
  permission_error('login.php');
}

  include str_replace("\\","/",dirname(__FILE__).'/assets/include/header.php');
  include str_replace("\\","/",dirname(__FILE__).'/assets/include/headbar.php');
?>

	<main class="u-main" role="main">
			<!-- Sidebar -->
		<?php
		  include str_replace("\\","/",dirname(__FILE__).'/assets/include/nav.php');
		?>			
			<!-- End Sidebar -->
			<div class="u-content">
				<div class="u-body">
				  <div class="row">
					<!-- Success -->
					<div class="form-control alert alert-success fade show" role="alert">
						<i class="fa fa-check-circle alert-icon mr-3"></i>
						<span>Please ensure our informations are safe!.</span>
						<button type="button" class="close" aria-label="Close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<!-- End Success -->				  	
					<div class="home-about-flex">
					    <div class="col-md-8 pusher">
					        <h1>Welcome to our CMS portal</h1>
					        <p>
					        SaltCity is a joyous community of Word Livers. We are committed to the studying, teaching and application of God’s Word in all of life.
							</p>
					        <!-- <a href="" class="btn btn-md btn-custom btn-pinky"> Learn More</a> -->
					    </div>		
					</div>        
				  </div>					
					<!-- Doughnut Chart -->
					<div class="row pusher">
						<div class="col-sm-6 col-xl-6 mb-6">
							<div class="card">
								<div class="card-body media align-items-center px-xl-3">
									<div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
										<canvas class="js-doughnut-chart" width="70" height="70"
										        data-set="[65, 35]"
										        data-colors='[
                              					"#2972fa",
										        "#f6f9fc"
										        ]'>
										</canvas>
										<!-- <div class="u-doughnut__label text-info">65</div> -->
									</div>

									<div class="media-body">
										<h3 class="h3 text-muted text-uppercase mb-2">
											Total Sermons <i class="fa fa-arrow-up text-success ml-1"></i>
										</h3>
										<span class="h2 mb-0">5</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-xl-6 mb-6">
							<div class="card">
								<div class="card-body media align-items-center px-xl-3">
									<div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
										<canvas class="js-doughnut-chart" width="70" height="70"
										        data-set="[35, 65]"
										        data-colors='[
                              					"#fab633",
										         "#f6f9fc"
										        ]'></canvas>
										<!-- <div class="u-doughnut__label text-warning">35</div> -->
									</div>

									<div class="media-body">
										<h3 class="h3 text-muted text-uppercase mb-2">
											Total Confessions <i class="fa fa-arrow-down text-danger ml-1"></i>
										</h3>
										<span class="h2 mb-0">6</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-xl-6 mb-6">
							<div class="card">
								<div class="card-body media align-items-center px-xl-3">
									<div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
										<canvas class="js-doughnut-chart" width="70" height="70"
										        data-set="[60, 40]"
										        data-colors='[
                              					"#0dd157",
										        "#f6f9fc"
										        ]'></canvas>
										<!-- <div class="u-doughnut__label text-success">60</div> -->
									</div>

									<div class="media-body">
										<h3 class="h3 text-muted text-uppercase mb-2">
											Our Users <i class="fa fa-arrow-up text-success ml-1"></i>
										</h3>
										<span class="h2 mb-0">38</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-xl-6 mb-6">
							<div class="card">
								<div class="card-body media align-items-center px-xl-3">
									<div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
										<canvas class="js-doughnut-chart" width="70" height="70"
										        data-set="[25, 85]"
										        data-colors='[
                              					"#fb4143",
										        "#f6f9fc"
										        ]'></canvas>
										<!-- <div class="u-doughnut__label text-danger">25</div> -->
									</div>

									<div class="media-body">
										<h3 class="h3 text-muted text-uppercase mb-2">
											Savors <i class="fa fa-arrow-up text-danger ml-1"></i>
										</h3>
										<span class="h2 mb-0">3</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Doughnut Chart -->
								
<?php
  include str_replace("\\","/",dirname(__FILE__).'/assets/include/foot.php');
?>
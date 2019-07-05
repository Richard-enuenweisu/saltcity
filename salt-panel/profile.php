<?php
  include str_replace("\\","/",dirname(__FILE__).'/assets/include/header.php');
  include str_replace("\\","/",dirname(__FILE__).'/assets/include/headbar.php');
?>

	<main class="u-main" role="main">
			<!-- Sidebar -->
		<?php
		  include str_replace("\\","/",dirname(__FILE__).'/assets/include/nav.php');
		?>	

			<div class="u-content">
				<div class="u-body">
					<h1 class="h2 font-weight-semibold mb-4">Profile</h1>

					<div class="card mb-4">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4 border-md-right border-light text-center">
									<img class="img-fluid rounded-circle mb-3" src="./assets/img/avatars/img1.jpg" alt="Image description" width="84">

									<h2 class="mb-2">Robert Drake</h2>
									<h5 class="text-muted mb-4">Web developer</h5>

									<ul class="list-inline mb-4">
										<li class="list-inline-item mr-3">
											<a class="link-muted" href="#!">
												<i class="fab fa-facebook"></i>
											</a>
										</li>
										<li class="list-inline-item mr-3">
											<a class="link-muted" href="#!">
												<i class="fab fa-twitter"></i>
											</a>
										</li>
										<li class="list-inline-item mr-3">
											<a class="link-muted" href="#!">
												<i class="fab fa-slack"></i>
											</a>
										</li>
										<li class="list-inline-item">
											<a class="link-muted" href="#!">
												<i class="fab fa-linkedin-in"></i>
											</a>
										</li>
									</ul>

									<div class="mb-3">
										<a class="btn btn-primary mb-2" href="#!">Follow Me</a>
									</div>

									<a class="link-muted" href="#!">
										<i class="fa fa-envelope mr-2"></i> Send Message
									</a>
								</div>

								<div class="col-md-8">
									<h3 class="card-title">About me</h3>
									<p class="mb-5">In this digital generation where information can be easily obtained within seconds, business cards still have retained their importance in the achievement of increased business exposure and business sales. If your business already has a bunch of printed cards distributed to a number of potential customers and yet you do not see any improvement in your market reach, then it’s high time to revamp your old business card. Take out your business card and look at it in an objective point of view. If you were the customer, would you want to keep the card, or throw it away</p>

									<div class="row">
									<!-- 	<div class="col-lg-4 mb-5 mb-lg-0">
											<h4 class="h3 mb-3">Profile Rating</h4>
											<div class="mb-1">
												<span class="font-size-44 text-dark">4.8</span>
												<span class="h1 font-weight-light text-muted">/ 5.0</span>
											</div>
											<p class="text-muted mb-0">245 Reviews</p>
										</div> -->

										<div class="col-lg-8">
											<h4 class="h3 mb-3">Skills</h4>

											<div class="d-flex flex-wrap align-items-center">
												<span class="bg-light text-muted rounded py-2 px-3 mb-2 mr-2">Tag</span>
												<span class="bg-light text-muted rounded py-2 px-3 mb-2 mr-2">Web Design</span>
												<span class="bg-light text-muted rounded py-2 px-3 mb-2 mr-2">HTML5</span>
												<span class="bg-light text-muted rounded py-2 px-3 mb-2 mr-2">CSS</span>
												<span class="bg-light text-muted rounded py-2 px-3 mb-2 mr-2">Marketing</span>
												<span class="bg-light text-muted rounded py-2 px-3 mb-2 mr-2">JavaScript</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

<?php
  include str_replace("\\","/",dirname(__FILE__).'/assets/include/foot.php');
?>
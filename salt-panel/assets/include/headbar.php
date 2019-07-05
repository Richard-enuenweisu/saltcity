		<!-- Header (Topbar) -->
		<header class="u-header">
			<div class="u-header-left">
				<a class="u-header-logo" href="index.html">
					<img class="u-logo-desktop" src="./assets/img/salt-logo.png" width="160" alt="Saltcity CMS">
					<img class="img-fluid u-logo-mobile" src="./assets/img/salt-logo.png" width="50" alt="Saltcity CMS">
				</a>
			</div>

			<div class="u-header-middle">
				<a class="js-sidebar-invoker u-sidebar-invoker" href="#!"
				   data-is-close-all-except-this="true"
				   data-target="#sidebar">
					<i class="fa fa-bars u-sidebar-invoker__icon--open"></i>
					<i class="fa fa-times u-sidebar-invoker__icon--close"></i>
				</a>

				<div class="u-header-search"
				     data-search-mobile-invoker="#headerSearchMobileInvoker"
				     data-search-target="#headerSearch">
					<a id="headerSearchMobileInvoker" class="btn btn-link input-group-prepend u-header-search__mobile-invoker" href="#!">
						<i class="fa fa-search"></i>
					</a>

					<div id="headerSearch" class="u-header-search-form">
						<form>
							<div class="input-group">
								<button class="btn-link input-group-prepend u-header-search__btn" type="submit">
									<i class="fa fa-search"></i>
								</button>
								<input class="form-control u-header-search__field" type="search" placeholder="Type to search…">
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="u-header-right">
		  	<!-- Activities -->
				<div class="dropdown mr-4">
				  <a class="link-muted" href="#!" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
				    <span class="h3">
			    		<i class="far fa-envelope"></i>
				    </span>
				    <span class="u-indicator u-indicator-top-right u-indicator--xxs bg-secondary"></span>
				  </a>
				</div>
		  	<!-- End Activities -->


		  	<!-- Apps -->
				<div class="dropdown mr-4">
				  <a class="link-muted" href="#!" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
				    <span class="h3">
			    		<i class="far fa-circle"></i>
				    </span>
				    <span class="u-indicator u-indicator-top-right u-indicator--xxs bg-warning"></span>
				  </a>

				  <div class="dropdown-menu dropdown-menu-right border-0 py-0 mt-4" aria-labelledby="dropdownMenuLink" style="width: 360px;">
				  	<div class="card">
							<div class="card-header d-flex align-items-center py-3">
								<h2 class="h4 card-header-title">Apps</h2>
								<a class="ml-auto" href="#">Learn more</a>
							</div>

							<div class="card-body py-3">
								<div class="row">
									<!-- App -->
									<div class="col-4 px-2 mb-2">
										<a class="u-apps d-flex flex-column rounded" href="#!">
											<img class="img-fluid u-avatar--xs mx-auto mb-2" src="./assets/img/brands-sm/img1.png" alt="">
											<span class="text-center">Assana</span>
										</a>
									</div>
									<!-- End App -->

									<!-- App -->
									<div class="col-4 px-2 mb-2">
										<a class="u-apps d-flex flex-column rounded" href="#!">
											<img class="img-fluid u-avatar--xs mx-auto mb-2" src="./assets/img/brands-sm/img2.png" alt="">
											<span class="text-center">Slack</span>
										</a>
									</div>
									<!-- End App -->

									<!-- App -->
									<div class="col-4 px-2 mb-2">
										<a class="u-apps d-flex flex-column rounded" href="#!">
											<img class="img-fluid u-avatar--xs mx-auto mb-2" src="./assets/img/brands-sm/img3.png" alt="">
											<span class="text-center">Cloud</span>
										</a>
									</div>
									<!-- End App -->

									<!-- App -->
									<div class="col-4 px-2">
										<a class="u-apps d-flex flex-column rounded" href="#!">
											<img class="img-fluid u-avatar--xs mx-auto mb-2" src="./assets/img/brands-sm/img5.png" alt="">
											<span class="text-center">Facebook</span>
										</a>
									</div>
									<!-- End App -->

									<!-- App -->
									<div class="col-4 px-2">
										<a class="u-apps d-flex flex-column rounded" href="#!">
											<img class="img-fluid u-avatar--xs mx-auto mb-2" src="./assets/img/brands-sm/img4.png" alt="">
											<span class="text-center">Spotify</span>
										</a>
									</div>
									<!-- End App -->

									<!-- App -->
									<div class="col-4 px-2">
										<a class="u-apps d-flex flex-column rounded" href="#!">
											<img class="img-fluid u-avatar--xs mx-auto mb-2" src="./assets/img/brands-sm/img6.png" alt="">
											<span class="text-center">Twitter</span>
										</a>
									</div>
									<!-- End App -->
								</div>
							</div>

							<!-- <div class="card-footer py-3">
								<a class="btn btn-block btn-outline-primary" href="#">View all apps</a>
							</div> -->
				  	</div>
				  </div>
				</div>
		  	<!-- End Apps -->

		  	<!-- User Profile -->
				<div class="dropdown ml-2">
				  <a class="link-muted d-flex align-items-center" href="#!" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
				    <img class="u-avatar--xs img-fluid rounded-circle mr-2" src="./assets/img/avatars/img1.jpg" alt="User Profile">
						<span class="text-dark d-none d-sm-inline-block">
							Mysaltcity <small class="fa fa-angle-down text-muted ml-1"></small>
						</span>
				  </a>

				  <div class="dropdown-menu dropdown-menu-right border-0 py-0 mt-3" aria-labelledby="dropdownMenuLink" style="width: 260px;">
				  	<div class="card">
							<div class="card-body">
								<ul class="list-unstyled mb-0">
									<!-- <li class="mb-4">
										<a class="d-flex align-items-center link-dark" href="#!">
											<span class="h3 mb-0"><i class="far fa-user-circle text-muted mr-3"></i></span> View Profile
										</a>
									</li> -->
									<li class="mb-4">
										<a class="d-flex align-items-center link-dark" href="#!">
											<span class="h3 mb-0"><i class="far fa-list-alt text-muted mr-3"></i></span> Settings
										</a>
									</li>
									<li class="mb-4">
										<a class="d-flex align-items-center link-dark" href="#!">
											<span class="h3 mb-0"><i class="far fa-laugh-wink text-muted mr-3"></i></span> Invite your friends
										</a>
									</li>
									<li>
										<a class="d-flex align-items-center link-dark" href="logout.php">
											<span class="h3 mb-0"><i class="far fa-share-square text-muted mr-3"></i></span> Sign Out
										</a>
									</li>
								</ul>
							</div>
				  	</div>
				  </div>
				</div>
		  	<!-- End User Profile -->
			</div>
		</header>
		<!-- End Header (Topbar) -->
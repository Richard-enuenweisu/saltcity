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

			<div class="u-content">
				<div class="u-body">
					<h1 class="h2 font-weight-semibold mb-4">Unit Contributions</h1>

					<div class="card mb-4">
						<div class="card-body">
							<form method="POST">
								<div class="row">
										<div class="form-group col-md-4">
											<label for="defaultInput1">Enter Amount</label>
											<input id="defaultInput1" class="form-control form-pill" type="email" placeholder="Amount e.g 10000" aria-describedby="emailHelp">
										</div>
										<div class="form-group col-md-4">
											<label for="defaultInput1">Select Unit</label>										
											<select class="form-control form-pill" name="unit">
												<option>--Select Unit--</option>
												<option>Media Unit</option>
												<option>Chior Unit</option>
												<option>Protocol Unit</option>
												<option>Love Dimention Unit</option>
											</select>
										</div>										

										<div class="form-group col-md-4">
											<label for="defaultInput1">Continue</label>
											<button id="defaultInput1" class="form-control form-pill btn-secondary" type="submit">Continue</button>
										</div>										
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

<?php
  include str_replace("\\","/",dirname(__FILE__).'/assets/include/foot.php');
?>
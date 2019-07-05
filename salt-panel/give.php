<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

if (!isset($_SESSION['USER_ID'])) {
  permission_error('login.php');
}

  $give_query = $pdo->query("SELECT * FROM givetbl ORDER BY id DESC");

if (isset($_GET['delete'])) {
	# code...
	// $del = intval($_GET['delete']);
 // 	$insert_query = $pdo->prepare(" DELETE FROM givetbl WHERE id = :delete_id");
	// $insert_query->execute([':delete_id' =>$del]); 
	// $success = "Transaction Deleted Successfully! Refreshing in 2 secs.";
	// header("refresh:2;url=confessions.php");
}


  include str_replace("\\","/",dirname(__FILE__).'/assets/include/header.php');
  include str_replace("\\","/",dirname(__FILE__).'/assets/include/headbar.php');
?>

	<main class="u-main" role="main">
			<!-- Sidebar -->
		<?php
		  include str_replace("\\","/",dirname(__FILE__).'/assets/include/nav.php');
		?>	
<style type="text/css">
	.table-responsive img{
		width: 65px;
		height: 65px;
	}
</style>
			<div class="u-content">
				<div class=" u-body">
					<h1 class="h2 font-weight-semibold mb-4">Online Transactions</h1>

					<div class="card mb-12">
						<header class="card-header">							
							<div class="float-right">
								<!-- <a class="link-muted" href="manage_blog.php">
									<i class="fas fa-plus-square"></i> Create Blog Post
								</a> -->
<!-- 								&nbsp;&nbsp;&nbsp;&nbsp;
								<a class="link-muted" href="sermon_message.php">
									<i class="fas fa-plus-square"></i> Add Resources
								</a> -->
							</div>
							<h2 class="h3 card-header-title pusher">All Transactions</h2>
						</header>

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th scope="col"></th>
											<th scope="col">Email</th>
											<th scope="col">Purpose</th>
											<th scope="col">Amount</th>
											<th scope="col">Date</th>
											<th class="text-center" scope="col"></th>
										</tr>
									</thead>

									<tbody>
										<?php while($give = $give_query->fetch(PDO::FETCH_ASSOC)) : 

										$post_date = strtotime($give['created_at'] );
										$mydate = date('l jS F Y', $post_date );
										?>											
										<tr>
											<td>*</td>
											<td><?=$give['email']?></td>
											<td><?=$give['purpose']?></td>
											<td><?=$give['amount']?></td>			
											<td><?=$mydate?></td>			
											<td class="text-center">
												<a class="link-muted" href="blog.php?delete=<?=$give['id']?>">
													<i class="fa fa-trash"></i>
												</a>											
											</td>
										</tr>
										<?php endwhile;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php
  include str_replace("\\","/",dirname(__FILE__).'/assets/include/foot.php');
?>
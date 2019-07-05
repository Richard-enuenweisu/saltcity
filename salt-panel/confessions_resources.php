<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

if (!isset($_SESSION['USER_ID'])) {
  permission_error('login.php');
}

$con_query = $pdo->query("SELECT * FROM confessionstbl ORDER BY id DESC LIMIT 15");


if (isset($_POST['submit'])) {
  # code...
      $confession = ((isset($_POST['confession']) && $_POST['confession'] != '')?sanitize($_POST['confession']):'');
      $image = $_FILES['image']['name'];
      $audio = $_FILES['audio']['name'];
      $pdf = $_FILES['pdf']['name'];
      $errors = array();
      $success;
      // echo $image.' '.$_FILES["audio"]["size"].' '.$_FILES["image"]["size"].' '.$_FILES["pdf"]["size"]; 
      if ($confession =='--Select Title--') {
          $errors[].= "Please select confession.";
      }
      $stmt = $pdo->prepare("SELECT * FROM confessionstbl WHERE title =:title");
      $stmt->execute([':title' => $confession]);
      $get_details = $stmt->fetch(PDO::FETCH_ASSOC);
      //get sermon id
      $get_id = intval($get_details['id']);
      // validate types
      $allowed_image_extension = array(
          "jpg",
          "png",
          "jpeg",
          "mp3",
          "ogg",
          "pdf",
          "XLS"
      );
      // Get image file extension
      $image_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);    
      $audio_extension = pathinfo($_FILES["audio"]["name"], PATHINFO_EXTENSION);    
      $pdf_extension = pathinfo($_FILES["pdf"]["name"], PATHINFO_EXTENSION);    
      // Validate file input to check if is not empty
      if (empty($image)) {
          $errors[].= "Choose image file to upload.";
      }    // Validate file input to check if is with valid extension
      if (!in_array($image_extension, $allowed_image_extension)) {
          $errors[].= "Only Jpg and Png are allowed.";
      }
      if (!in_array($audio_extension, $allowed_image_extension)) {
          $errors[].= "Only Mp3 and Ogg are allowed.";
      }
      if (!in_array($pdf_extension, $allowed_image_extension)) {
          $errors[].= "Only Pdf and XLS are allowed.";
      } // Validate image file size
      if (($_FILES["image"]["size"] > 300000)) {
          $errors[].= "Image size exceeds 300KB";
      }
      if (($_FILES["audio"]["size"] > 10000000)) {
          $errors[].= "Image size exceeds 10MB";
      }
      if (($_FILES["pdf"]["size"] > 500000)) {
          $errors[].= "Image size exceeds 500KB";
      }            
      if(empty($errors)) {
          $target = "../confessions/art/" . basename($_FILES["image"]["name"]);
          $dbpath = "confessions/art/" . basename($_FILES["image"]["name"]);

          $target2 = "../confessions/audio/" . basename($_FILES["audio"]["name"]);
          $dbpath2 = "confessions/audio/" . basename($_FILES["audio"]["name"]);

          $target3 = "../confessions/pdf/" . basename($_FILES["pdf"]["name"]);
          $dbpath3 = "confessions/pdf/" . basename($_FILES["pdf"]["name"]);                    
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target) && move_uploaded_file($_FILES["audio"]["tmp_name"], $target2) && move_uploaded_file($_FILES["pdf"]["tmp_name"], $target3)) {
              $insert_query = $pdo->prepare("INSERT INTO `confessionsrstbl`(`confession_id`, `rs_image`, `rs_audio`, `rs_pdf`) VALUES (:confession_id, :rs_image, :rs_audio, :rs_pdf)");
              $insert_query->execute([':confession_id' =>$get_id, ':rs_image' =>$dbpath, ':rs_audio'=>$dbpath2, ':rs_pdf'=>$dbpath3]);            
              $success = "Uploaded successfully.";
          } else {
              $errors[].= "Problem in uploading sermon.";
          }
      }
}

if (isset($_GET['edit'])) {
  # code...
  $edit = intval($_GET['edit']);
  $edit_query = $pdo->query("SELECT * FROM confessionstbl WHERE id = $edit");
  $edit_details = $edit_query->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['edit'])) {
  # code...
      // var_dump($edit_details['id']);
      $edit_id = $edit_details['id'];

      $confession = ((isset($_POST['confession']) && $_POST['confession'] != '')?sanitize($_POST['confession']):'');
      $image = $_FILES['image']['name'];
      $audio = $_FILES['audio']['name'];
      $pdf = $_FILES['pdf']['name'];
      $errors = array();
      $success;
      // echo $image.' '.$_FILES["audio"]["size"].' '.$_FILES["image"]["size"].' '.$_FILES["pdf"]["size"]; 
      if ($confession =='--Select Title--') {
          $errors[].= "Please select confession.";
      }
      // validate types
      $allowed_image_extension = array(
          "jpg",
          "png",
          "jpeg",
          "mp3",
          "ogg",
          "pdf",
          "XLS"
      );
      // Get image file extension
      $image_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);    
      $audio_extension = pathinfo($_FILES["audio"]["name"], PATHINFO_EXTENSION);    
      $pdf_extension = pathinfo($_FILES["pdf"]["name"], PATHINFO_EXTENSION);    
      // Validate file input to check if is not empty
      if (empty($image)) {
          $errors[].= "Choose image file to upload.";
      }    // Validate file input to check if is with valid extension
      if (!in_array($image_extension, $allowed_image_extension)) {
          $errors[].= "Only Jpg and Png are allowed.";
      }
      if (!in_array($audio_extension, $allowed_image_extension)) {
          $errors[].= "Only Mp3 and Ogg are allowed.";
      }
      if (!in_array($pdf_extension, $allowed_image_extension)) {
          $errors[].= "Only Pdf and XLS are allowed.";
      } // Validate image file size
      if (($_FILES["image"]["size"] > 300000)) {
          $errors[].= "Image size exceeds 300KB";
      }
      if (($_FILES["audio"]["size"] > 10000000)) {
          $errors[].= "Image size exceeds 10MB";
      }
      if (($_FILES["pdf"]["size"] > 500000)) {
          $errors[].= "Image size exceeds 500KB";
      }            
      if(empty($errors)) {
          $target = "../confessions/art/" . basename($_FILES["image"]["name"]);
          $dbpath = "confessions/art/" . basename($_FILES["image"]["name"]);

          $target2 = "../confessions/audio/" . basename($_FILES["audio"]["name"]);
          $dbpath2 = "confessions/audio/" . basename($_FILES["audio"]["name"]);

          $target3 = "../confessions/pdf/" . basename($_FILES["pdf"]["name"]);
          $dbpath3 = "confessions/pdf/" . basename($_FILES["pdf"]["name"]);                    
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target) && move_uploaded_file($_FILES["audio"]["tmp_name"], $target2) && move_uploaded_file($_FILES["pdf"]["tmp_name"], $target3)) {
              $insert_query = $pdo->prepare("UPDATE `confessionsrstbl` SET `confession_id`=:confession_id, `rs_image`=:rs_image, `rs_audio`=:rs_audio, `rs_pdf`=:rs_pdf WHERE `confession_id` = $edit_id");
              $insert_query->execute([':confession_id' =>$edit_id, ':rs_image' =>$dbpath, ':rs_audio'=>$dbpath2, ':rs_pdf'=>$dbpath3]);            
              $success = "Edited successfully.";
          } else {
              $errors[].= "Problem in updating resources.";
          }
      }
}


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
					<h1 class="h2 font-weight-semibold mb-4"><?=(isset($_GET['edit']))?'Edit':'Add'?> Confessions Resources </h1>
					<div class="card mb-4">
						<div class="card-body">
								<div class="row">
									<div class="col-md-3"></div>
									<div class="col-md-6">
                    <form method="POST" action="confessions_resources.php<?=(isset($_GET['edit']))?'?edit='.$edit :''?>" enctype="multipart/form-data">
                      <div class="row">
                        <?php if(isset($success)){ ?>
                          <div class="form-control alert alert-success fade show" role="alert">
                            <i class="fa fa-check-circle alert-icon mr-3"></i>
                            <span> <?php echo $success; ?></span>
                            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php } else if(isset($errors)){ ?>
                            <div class="form-control alert alert-danger fade show" role="alert">
                              <i class="fa fa-minus-circle alert-icon mr-3"></i>
                              <span><?php echo display_errors($errors); ?></span>
                              <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        <?php } ?>
                      </div>

                     <?php  if (!isset($_GET['edit'])){ ?>                  
                      <div class="row pusher">
                        <label for="defaultInput1">Select Confessions</label>                    
                        <select class="form-control form-pill" name="confession">
                          <option>--Select Title--</option>
                          <?php while($confession = $con_query->fetch(PDO::FETCH_ASSOC)) : ?>
                            <option><?=$confession['title'];?></option>
                          <?php endwhile;?>
                        </select>
                        <hr>
                      </div>
                      <?php } ?>                      
                      <div class="row pusher">
                        <div class="input-image-container">  
                          <input class="input-image" id="my-file" name="image" type="file" accept="image/*">
                          <label tabindex="0" for="my-image" class="input-image-trigger">Select Image ...</label>
                        </div><br>
                        <p class="image-return"></p>                                                
                      </div>
                      <div class="row push">
                        <div class="input-audio-container">  
                          <input class="input-audio" id="my-file" name="audio" type="file" accept="audio/*">
                          <label tabindex="0" for="my-audio" class="input-audio-trigger">Select Audio...</label>
                        </div><br>
                        <p class="audio-return"></p>                                                
                      </div> 
                      <div class="row push">
                        <div class="input-pdf-container">  
                          <input class="input-pdf" id="my-file" name="pdf" type="file" accept="application/pdf, application/vnd.ms-excel"><br>
                          <label tabindex="0" for="my-audio" class="input-pdf-trigger">Select PDF...</label>
                        </div><br>
                        <p class="pdf-return"></p>                                                
                      </div>  
                      <div class="row pusher">                    
                       <!-- <div class="form-group col-md-12"> -->
                        <!-- <label for="defaultInput1">Continue</label> -->
                        <button id="defaultInput1" class="form-control  form-pill btn-secondary" name="<?=(isset($_GET['edit']))?'edit':'submit'?>" type="submit"><?=(isset($_GET['edit']))?'Edit':'Add'?> Resources
                        </button>
                      <!-- </div>                     -->
                      </div>                                                                
                    </form>                    
                  </div>	
									<div class="col-md-3"></div>																	
								</div>
						</div>
					</div>
			</div>

<script type="text/javascript">
document.querySelector("html").classList.add('js');

// first button
var fileInput1  = document.querySelector( ".input-image" ),  
    button1     = document.querySelector( ".input-image-trigger" ),
    the_return1 = document.querySelector(".image-return");
     
button1.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput1.focus();  
    }  
});
button1.addEventListener( "click", function( event ) {
   fileInput1.focus();
   return false;
});  
fileInput1.addEventListener( "change", function( event ) {  
    the_return1.innerHTML = this.value;  
}); 

// Second button
var fileInput2  = document.querySelector( ".input-audio" ),  
    button2    = document.querySelector( ".input-audio-trigger" ),
    the_return2 = document.querySelector(".audio-return");    

      
button2.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput2.focus();  
    }  
});
button2.addEventListener( "click", function( event ) {
   fileInpu2.focus();
   return false;
});  
fileInput2.addEventListener( "change", function( event ) {  
    the_return2.innerHTML = this.value;  
});  

// Third button
var fileInput3  = document.querySelector( ".input-pdf" ),  
    button3    = document.querySelector( ".input-pdf-trigger" ),
    the_return3 = document.querySelector(".pdf-return");    

      
button3.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput3.focus();  
    }  
});
button3.addEventListener( "click", function( event ) {
   fileInpu3.focus();
   return false;
});  
fileInput3.addEventListener( "change", function( event ) {  
    the_return3.innerHTML = this.value;  
});  
</script>
<?php
  include str_replace("\\","/",dirname(__FILE__).'/assets/include/foot.php');
?>
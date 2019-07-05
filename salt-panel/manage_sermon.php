<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

if (!isset($_SESSION['USER_ID'])) {
  permission_error('login.php');
}

if (isset($_POST["submit"])) {

    $title =((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
    $source =((isset($_POST['source']) && $_POST['source'] != '')?sanitize($_POST['source']):'');
    $name = $_FILES['image']['name'];

    $errors = array();
    $success;

    // echo $title.' '.$source.' '. $name = $_FILES['image']['name'].' '. $name = $_FILES['image']['tmp_name'];; 

    if (!isset($title) || empty($title)) {
      # code...
      $errors[].= "Please enter sermon title.";
    }
    if (!isset($source) || empty($source)) {
      # code...
      $errors[].= "Please enter sermon source.";
    } 
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
    // var_dump($fileinfo );
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    // Get image file extension
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);    
    // Validate file input to check if is not empty
    if (empty($name)) {
        $errors[].= "Choose image file to upload.";
    }    // Validate file input to check if is with valid extension
    if (!in_array($file_extension, $allowed_image_extension)) {
        $errors[].= "Upload valiid images. Only PNG and JPEG are allowed.";
    }    // Validate image file size
    if (($_FILES["image"]["size"] > 300000)) {
        $errors[].= "Image size exceeds 300KB";
    }    // Validate image file dimension
    if ($width > "842" || $height > "842") {
        $errors[].= "Image dimension should be within 842X842";
    }
    if(empty($errors)) {
        $target = "../sermon/art/" . basename($_FILES["image"]["name"]);
        $dbpath = "sermon/art/" . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
            $insert_query = $pdo->prepare("INSERT INTO sermontbl (`title`,`source`, `image`) VALUES (:title, :source ,:image)");
            $insert_query->execute([':title' =>$title,':source' =>$source, 'image'=>$dbpath]);            
            $success = "Sermon Added successfully.";
        } else {
            $errors[].= "Problem in adding sermon.";
        }
    }
}

if (isset($_GET['edit'])) {
  # code...
  $edit = intval($_GET['edit']);
  $sermon_query = $pdo->query("SELECT * FROM sermontbl WHERE id = $edit");
  $edit_details = $sermon_query->fetch(PDO::FETCH_ASSOC);

// Edit Sermon script
if (isset($_POST['edit'])) {
  # code...
    $edit_id = $edit_details['id'];
    // var_dump($edit_details['id']);
    $title =((isset($_POST['title']) && $_POST['title'] != '')?sanitize($_POST['title']):'');
    $source =((isset($_POST['source']) && $_POST['source'] != '')?sanitize($_POST['source']):'');
    $name = $_FILES['image']['name'];

    $errors = array();
    $success;

    // echo $title.' '.$source.' '. $name = $_FILES['image']['name'].' '. $name = $_FILES['image']['tmp_name'];; 

    if (!isset($title) || empty($title)) {
      # code...
      $errors[].= "Please enter sermon title.";
    }
    if (!isset($source) || empty($source)) {
      # code...
      $errors[].= "Please enter sermon source.";
    } 
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
    // var_dump($fileinfo );
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    // Get image file extension
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);    
    // Validate file input to check if is not empty
    if (empty($name)) {
        $errors[].= "Choose image file to upload.";
    }    // Validate file input to check if is with valid extension
    if (!in_array($file_extension, $allowed_image_extension)) {
        $errors[].= "Upload valiid images. Only PNG and JPEG are allowed.";
    }    // Validate image file size
    if (($_FILES["image"]["size"] > 200000)) {
        $errors[].= "Image size exceeds 200KB";
    }    // Validate image file dimension
    if ($width > "842" || $height > "842") {
        $errors[].= "Image dimension should be within 842X842";
    }
    if(empty($errors)) {
        $target = "../sermon/art/" . basename($_FILES["image"]["name"]);
        $dbpath = "sermon/art/" . basename($_FILES["image"]["name"]);
        // Delele the previous file
        $delete_path = '../'.$edit_details['image'];
        unlink($delete_path);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
            $insert_query = $pdo->prepare("
              UPDATE sermontbl SET `title`=:title, `source`=:source, `image`=:image WHERE `id` = $edit_id");
            $insert_query->execute([':title' =>$title, ':source' =>$source, ':image'=>$dbpath]);            
            $success = "Sermon edited successfully.";
        } else {
            $errors[].= "Problem in editting sermon.";
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
<style type="text/css">

</style>
			<div class="u-content">
				<div class="u-body">
					<h1 class="h2 font-weight-semibold mb-4"><?=(isset($_GET['edit']))?'Edit':'Add'?> Sermon </h1>

					<div class="card mb-4">
						<div class="card-body">
							<form method="POST" action="manage_sermon.php<?=(isset($_GET['edit']))?'?edit='.$edit:''?> " enctype="multipart/form-data">
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
								<div class="row">
									<div class="col-md-3"></div>
									<div class="col-md-6">
									<div class="input-container">
                  <div class="file-upload">
                    <button class="file-upload-btn form-control" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><?=(isset($_GET['edit']))?'Edit':'Add'?> Feature Image</button>

                    <div class="image-upload-wrap">
                      <input class="file-upload-input form-control" name="image" type='file' onchange="readURL(this);" accept="image/*" />
                      <div class="drag-text">
                        <h3>Drag and drop a file or select Image</h3>
                      </div>
                    </div>
                    <?php if (isset($_GET['edit'])){?>
                      <img class="img-fluid" src="../<?=(isset($_GET['edit']))? $edit_details['image']:'#'?>" alt="your image" /> 
                      <?php } ?>   
                    <div class="file-upload-content">                      
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-md-12">
                      <input id="defaultInput1" class="form-control form-pill" name="title" type="text" placeholder="Enter Sermon title" aria-describedby="emailHelp" value="<?=(isset($_GET['edit']))? $edit_details['title']:''?>">
                      </div>                                                        
                  </div>
                  <div class="row">
                      <div class="form-group col-md-12">
                        <input id="defaultInput1" class="form-control form-pill" name="source" type="text" placeholder="Enter Sermon Source" aria-describedby="emailHelp" value="<?=(isset($_GET['edit']))? $edit_details['source']:''?>">
                      </div>                                                        
                  </div>                                  										
										<div class="form-group col-md-12">
											<!-- <label for="defaultInput1">Continue</label> -->
											<button id="defaultInput1" class="form-control form-pill btn-secondary" name="<?=(isset($_GET['edit']))?'edit':'submit'?>" type="submit"><?=(isset($_GET['edit']))?'Edit':'Add'?> Sermon
											</button>
										</div>										
									</div>	
									<div class="col-md-3"></div>																	
								</div>
							</form>
						</div>
					</div>

				</div>

<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
});
</script>
<?php
  include str_replace("\\","/",dirname(__FILE__).'/assets/include/foot.php');
?>
<?php
require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');
if (isset($_POST['login'])) {
  # code...
  $email = ((isset($_POST['email']))?sanitize($_POST['email']): '');
  $pass = ((isset($_POST['pass']))?sanitize($_POST['pass']): '');
  $errors = array();

  if (empty($email) || empty($pass)) {
    $errors[].= 'Some fields are empty'.'<br>';
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[].='email is not a valid email address'.'<br>';
  }
  $stmt = $pdo->prepare('SELECT * FROM admintbl WHERE email = ? AND password = ?');
  $stmt->execute([$email , $pass]);
  $row = $stmt->rowcount();
  $result =$stmt->fetch(PDO::FETCH_ASSOC);

  if ($row < 1) {
    $errors[].='users does not exist!'.'<br>';
  }
  if (empty($errors)) {
    $u_id = intval($result['id']);
    $success = 'Logged in Successfully! '.'<br>';
    // $last_login = date('Y-m-d H:i:s');
    // $ustmt = $pdo->prepare('UPDATE users SET last_login = ? WHERE id = ?');
    // $ustmt->execute([$last_login, $u_id]);
    login($u_id);
  }
}
  include str_replace("\\","/",dirname(__FILE__).'/includes/head.php');
  include str_replace("\\","/",dirname(__FILE__).'/includes/nav.php');

?>
 
<style type="text/css">

#custom-search-input .search-query{
  /*background-color: #2f3238 !important;*/
}
  /*login form*/
.flex-form{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 80vh;
  color: #ccc;
}
.myform{
  background-color:#000000a8;
  flex-direction: column;
  padding:20px 15px 35px 15px;
  color:#fff;
}
.form-pill{
  border-radius: 6.1875rem;
  padding-left: 1rem;
  padding-right: 1rem;  
}
.login-bg{
  background-color: #280a2f;
  background-image: url('images/14.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  height: 100vh;
}
</style>

<div class="container-fluid login-bg">
  <div class="row flex-form">
    <div class=" col-md-6 pusher-2" >
      <h2 class="content-title">Please Login</h2>
      <div class="card-body">
        <form class="myform" method="post" action="login.php">
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
          <div class="myinputs push">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control form-pill" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email" value="<?=((isset($email))?$email:'');?>">
          </div>
          <div class="myinputs push">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control form-pill" type="password" name="pass" placeholder="Password" value="<?=((isset($pass))?$pass:'');?>">
          </div>
          <div class="contact-btn push">
            <button type="submit" class="btn btn-primary form-pill" name="login"><span class="ti-key"></span> Login</button>
          </div>
        </form>
        <br>
        <br>
        </div>
        <div class="text-center">
          click here to <a class="d-block small mt-3" style="color: #ccc;" data-toggle="modal" data-target="#myModal-1" href=" ">create an Account</a>
          <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
        </div>
    </div>
  </div>
</div>

<?php
  include str_replace("\\","/",dirname(__FILE__).'/includes/foot.php');
?>
<?php
  require_once  str_replace("\\","/",dirname(__FILE__). '/core/init.php');
  require_once  str_replace("\\","/",dirname(__FILE__). '/helpers/helpers.php');

        // after the page reloads, print them out
    // if (isset($_COOKIE['cookieData'])) {
    //     foreach ($_COOKIE['cookieData'] as $name => $value) {
    //         $name = $name;
    //         $value = $value;
    //         echo "$name : $value <br />\n";
    //     }
    // }

if (!isset($_GET['ref'])) {

	header('Location: give.php');
}
if (isset($_COOKIE['cookieData'])) {
$email = $_COOKIE['cookieData']['email'];
$purpose = $_COOKIE['cookieData']['purpose'];
$amount = $_COOKIE['cookieData']['amount'];

$insert_query = $pdo->prepare("INSERT INTO givetbl (`email`, `purpose`, `amount`) VALUES (:email ,:purpose, :amount)");
$insert_query->execute([':email' =>$email, ':purpose' =>$purpose, ':amount' =>$amount]);

// Send mail to client
$to = $email;
$subject = "Transaction Successful!";
$txt = 'Your payment has been made successfully!, your <b>Transaction Reference</b> is '.$ref.'. Thank you for joining us as we expand the gospel of Christ, God bless you.';
$headers = "From: hello@mysaltcity.org" . "\r\n" .
"CC: mysaltcity@gmail.com";
mail($to,$subject,$txt,$headers);	    

header('Location:complete.php');
}

?>
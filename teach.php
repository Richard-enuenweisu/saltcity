<!DOCTYPE html>
<html>
<body>

<?php
function calcs($m, $p) {
  	$rate = 0.5;
    $process = $rate * ($p * $m * ( 2 * $m));
 	return $process;
}


function soulution() {
$b = 3;
$c = 5; 
$result = calcs($b,$c);

// var_dump($result);

$ans = $result *10;

echo $ans;
}

soulution();

?>

</body>
</html>

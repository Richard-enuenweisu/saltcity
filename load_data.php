<?php
require_once  str_replace("\\","/",dirname(__FILE__). '../core/init.php');
require_once  str_replace("\\","/",dirname(__FILE__). '../helpers/helpers.php');

// fetch from confessions table ajax call

if (isset($_POST['get_option'])) {
	# code...
$title = $_POST['get_option'];
$title = '%'.$title.'%';
$stmt = $pdo->prepare("SELECT * FROM confessionstbl WHERE title LIKE :title");
$stmt->execute([':title' => $title]);
 while($confessions = $stmt->fetch(PDO::FETCH_ASSOC))
 {
 echo '<a href="confessions-view.php?title='.$confessions['title'].'"><p>'.$confessions['title'].'</p></a>';
 }
 exit;	
}

// fetch from sermon table ajax call

if (isset($_POST['get_sermon'])) {
	# code...
$title = $_POST['get_sermon'];
$title = '%'.$title.'%';
$stmt = $pdo->prepare("SELECT * FROM sermontbl WHERE title LIKE :title");
$stmt->execute([':title' => $title]);
 while($sermon = $stmt->fetch(PDO::FETCH_ASSOC))
 {
 echo '<a href="sermons-view.php?title='.$sermon['title'].'"><p>'.$sermon['title'].'</p></a>';
 }
 exit;	
}

// fetch from blog table ajax call

if (isset($_POST['get_blog'])) {
	# code...
$title = $_POST['get_blog'];
$title = '%'.$title.'%';
$stmt = $pdo->prepare("SELECT * FROM blogtbl WHERE title LIKE :title");
$stmt->execute([':title' => $title]);
 while($blog = $stmt->fetch(PDO::FETCH_ASSOC))
 {
 echo '<a href="blog-view.php?title='.$blog['title'].'"><p>'.$blog['title'].'</p></a>';
 }
 exit;	
}

?>
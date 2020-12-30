<?php
 $path = "./" . $_GET['path'];
 $newFolder = $_POST['newFolder'];

 
 if(!file_exists($path . $newFolder)) {
     mkdir($path . $newFolder);
 }
?>


<?php require_once 'create.php'; ?>
<?php require_once 'deletefile.php'; ?>
<!-- login -->
<?php 
    session_start();
    if(isset($_GET['action']) and $_GET['action'] == 'logout'){
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['logged_in']);
        print('Logged out!');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="main.css">
    <title>File manager</title>
</head>
<body>
<table class="table table-striped">
  <thead class="thead-light">
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <!-- Scandir array settle to normal array -->
 <?php
$directory = "./" . $_GET['path'];
$files =  scandir($directory);
$files = array_diff($files,array('.','..', 'create.php', 'deletefile.php', 'download.php','main.php', 'uploadFile.php', 'index.php', 'index.css', 'main.css'));
$files = array_values($files);
    
// All logic
  foreach($files as $files){
    print ('<tr>');
  if(is_dir($directory . $files)){
    print("<td>Directory</td>");
    print('<td><a href=?path=' . $_GET['path'] . urlencode($files) . '/>' . $files . '</a> </td>');
    print("<td></td>");
 
  }else if( is_file($directory . $files)){
    print("<td>File</td>");
    print('<td>' . $files . '</td>');
    print("<td>
    <div class='buttons_tbl'>
    <form action='' method='POST'>
      <input class ='delete' type='hidden' name='file_name' value='" . $_GET['path'] . $files . "'>
      <input class ='delete' type='submit' name='delete_file' value='Delete'>
    </form>
    <form class='download' action='download.php' method='POST'>
      <input class='download' type='submit' name='file_name' value='Download'>
      <input class='download' type='hidden' name='download' value='" . $_GET['path'] . $files . "'>            
    </form>
    <div>
    </td>");
  }
  print ('</tr>');
    };
?>
</tbody>
</table>
<!-- Button go back -->
<button class="back" onclick="history.go(-1);">Back </button>
 <!-- Pasidometi apie mygtuka vaikscioti atgal su $_server -->
<!-- Create new directory -->
<div class="conteiner">
 <form  class="newFolder" action="" method="POST" id="create">
    <input type="text" name="newFolder" placeholder="Name of new directory">
    <input type="submit" value="Create" name ="submit">
 </form>
<!-- Upload new file -->
 <?php require_once "uploadFile.php" ?>
 <form class="uplodeFiles"action="" method="POST" enctype="multipart/form-data" id="uploade">
    <input type="file" name="newFile" />
    <input type="submit" name = "uploadButton"/>
 </form>
</div>
<!-- Disconnect -->
Click here to <a href = "index.php?action=logout"> logout.

      <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>
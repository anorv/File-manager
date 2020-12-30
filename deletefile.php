<?php
 if (isset($_POST['delete_file'])) {
     $file_name = $_POST['file_name'];
     unlink($fullFolderPath . $file_name);
 }

?>
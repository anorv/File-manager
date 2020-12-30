<?php
 $path = "./" . $_GET['path'];
 $file_name = $_POST['newFile'];
  
    if(isset($_FILES['newFile'])){
        $errors= array();
        $file_name = $_FILES['newFile']['name'];
        $file_size = $_FILES['newFile']['size'];
        $file_tmp = $_FILES['newFile']['tmp_name'];
        $file_type = $_FILES['newFile']['type'];
        $file_ext = strtolower(end(explode('.',$_FILES['newFile']['name'])));
        $extensions = array("jpeg","jpg","png", "pdf", "doc","docx","txt","ppt","pptx","ods","xls",
        "xlsx","odt","html","htm");

        if($file_size > 2097152) {
            $errors[]='File size must be excately 2 MB';
        }
        if(empty($errors)==true) {
         move_uploaded_file($file_tmp, $path . $file_name);
       
        }else{
            print_r($errors);
        }
    }
    
 if (isset($_POST['uploadButton'])) {
    header("Refresh:1");
}

   
?>

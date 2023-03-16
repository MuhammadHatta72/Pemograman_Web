<?php
$targer_path = "./uploads/";
$targer_path = $targer_path . basename($_FILES["uploadFile"]["name"]);

if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $targer_path)){
    echo "The file ". basename($_FILES["uploadFile"]["name"]). " has been uploaded.";
} else {
    echo "There was an error uploading your file, please try again";
}

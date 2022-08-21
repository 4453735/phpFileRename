<?php
require_once 'databaseconnect.php';

$dir_old = './users_photo/';
$dir_new = './new_users/';
$f_old = scandir($dir_old);

$data = $conn->query("SELECT * FROM `b_user`")->fetchAll();

foreach ($f_old as $file){
    $fileName = substr($file, 0, strripos($file,'.'));
    $fileExtension = substr($file,strripos($file,'.')+1);
    foreach ($data as $row){
        $id = $row['ID'];
        $lastName = $row['LAST_NAME'];
        $name = $row['NAME'];
        $secondName = $row['SECOND_NAME'];

        if($fileName == $id){
            rename ($dir_old."/".$fileName.".".$fileExtension, $dir_new.$lastName."_".$name."_".$secondName.".".$fileExtension);
            echo $dir_old."/".$fileName.".".$fileExtension."succes!".$dir_new.$lastName."_".$name."_".$secondName.".".$fileExtension."<br/>";
        }
    }
}
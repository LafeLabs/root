<?php

$path = $_POST['path'];
$name = $_POST['name'];

if(strlen($path) == 0){
    mkdir($name);
    mkdir($name."/"."html");
    mkdir($name."/"."feeds");
}
else{
    mkdir($path."/".$name);
    mkdir($path."/".$name."/"."html");
    mkdir($path."/".$name."/"."feeds");
}
    
$file = fopen($path."/".$name."/"."html/wall.txt","w");// create new file with this name
fwrite($file,"new wall"); //write data to file
fclose($file);  //close file

?>
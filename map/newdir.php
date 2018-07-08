<?php

$path = $_POST['path'];
$name = $_POST['name'];

if(strlen($path) == 0){
    mkdir($name);
    mkdir($name."/"."json");
    mkdir($name."/"."maps");
    mkdir($name."/"."svg");
}
else{
    mkdir($path."/".$name);
    mkdir($path."/".$name."/"."json");
    mkdir($path."/".$name."/"."maps");
    mkdir($path."/".$name."/"."svg");
}


$decktemplate = file_get_contents("json/currentjson.txt");
if(strlen($path) == 0){
    $file = fopen($name."/"."json/currentjson.txt","w");// create new file with this name
}
else{
    $file = fopen($path."/".$name."/"."json/currentjson.txt","w");// create new file with this name
}
fwrite($file,$decktemplate); //write data to file
fclose($file);  //close file

    
?>
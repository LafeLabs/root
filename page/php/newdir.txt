<?php

$path = $_POST['path'];
$name = $_POST['name'];

if(strlen($path) == 0){
    mkdir($name);
    mkdir($name."/"."html");
    mkdir($name."/"."css");
    mkdir($name."/"."javascript");
    mkdir($name."/"."bytecode");
    mkdir($name."/"."json");
    mkdir($name."/"."pages");

    
}
else{
    mkdir($path."/".$name);
    mkdir($path."/".$name."/"."html");
    mkdir($path."/".$name."/"."css");
    mkdir($path."/".$name."/"."javascript");
    mkdir($path."/".$name."/"."json");
    mkdir($path."/".$name."/"."bytecode");
    mkdir($path."/".$name."/"."pages");
}
    
$file = fopen($path."/".$name."/"."html/page.txt","w");// create new file with this name
fwrite($file,"new page"); //write data to file
fclose($file);  //close file

?>
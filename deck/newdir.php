<?php

$path = $_POST['path'];
$name = $_POST['name'];

if(strlen($path) == 0){
    mkdir($name);
    mkdir($name."/"."bytecode");
    mkdir($name."/"."decks");
}
else{
    mkdir($path."/".$name);
    mkdir($path."/".$name."/"."bytecode");
    mkdir($path."/".$name."/"."decks");
}
    
?>
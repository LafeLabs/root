<?php

$path = $_POST['path'];
$name = $_POST['name'];

if(strlen($path) == 0){
    mkdir($name);
    mkdir($name."/"."html");
    mkdir($name."/"."decks");
}
else{
    mkdir($path."/".$name);
    mkdir($path."/".$name."/"."html");
    mkdir($path."/".$name."/"."decks");
}


$decktemplate = file_get_contents("html/decktemplate.txt");

if(strlen($path) == 0){
    $file = fopen($name."/"."html/deck.txt","w");// create new file with this name
}
else{
    $file = fopen($path."/".$name."/"."html/deck.txt","w");// create new file with this name
}
fwrite($file,$decktemplate); //write data to file
fclose($file);  //close file


?>
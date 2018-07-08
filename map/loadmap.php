<?php

if(isset($_POST['path'])){
    $path = $_POST['path'];
    $feedpath = $path."maps";   
    $jsonpath = $path."json";
}
else{
    $feedpath = "maps";
    $jsonpath = $path."json";
}

$files = scandir(getcwd()."/".$feedpath);

$latesttime = 0;

foreach($files as $value){
    if($value != "." && $value != ".." && substr($value,0,3) == "map"){
        $timestamp = substr(substr($value,3),0,-4);
        if($timestamp > $latesttime){
            $latesttime = $timestamp;
        }
    }
}

$latestfilename = $feedpath."/map".$latesttime.".txt";
$outstring =  file_get_contents($latestfilename);
echo $outstring;

$file = fopen($jsonpath."/currentjson.txt","w");// create new file with this name
fwrite($file,$outstring); //write data to file
fclose($file);  //close file


?>
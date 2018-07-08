<?php

if(isset($_GET['path'])){
    $path = $_GET['path'];
    $feedpath = $path."maps";   
}
else{
    $feedpath = "maps";
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


?>
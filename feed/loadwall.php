<?php


    if(isset($_POST['path'])){
        $path = $_POST['path'];
        $bigpath = $path."html/wall.txt";
        $feedpath = $path."feed";   
    }
    else{
        $bigpath = "html/wall.txt";
        $feedpath = "feed";
    }

$files = scandir(getcwd()."/".$feedpath);

$latesttime = 0;

foreach($files as $value){
    if($value != "." && $value != ".." && substr($value,0,4) == "wall"){
     //   echo $value."<br/>".substr(substr($value,4),0,-4)."<br/>";
        $timestamp = substr(substr($value,4),0,-4);
     //   echo gmdate("Y-m-d H:i:s", $timestamp)."<br/>";     
     //   echo intval($timestamp) - 4287;
     //   echo "<br/>";
        if($timestamp > $latesttime){
            $latesttime = $timestamp;
        }
    }
}

$latestfilename = $feedpath."/wall".$latesttime.".txt";
$outstring =  file_get_contents($latestfilename);

echo $outstring;

    if(isset($_POST['path'])){
        $file = fopen($_POST['path']."html/wall.txt","w");// create new file with this name
    }
    else{
        $file = fopen("html/wall.txt","w");// create new file with this name    
    }




fwrite($file,$outstring); //write data to file
fclose($file);  //close file

?>

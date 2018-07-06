<?php

    if(isset($_POST['path'])){
        $path = $_POST['path'];
        $bigpath = $path."html/wall.txt";
        $feedpath = $path."feed/";   
    }
    else{
        $bigpath = "html/wall.txt";
        $feedpath = "feed/";
    }
    $data = file_get_contents($bigpath);


    $filename = "wall".time().".txt";
    $timestamp = substr(substr($filename,4),0,-4);
    $file = fopen($feedpath.$filename,"w");// create new file with this name
    fwrite($file,$data); //write data to file
    fclose($file);  //close file

    $oldfeed = file_get_contents($feedpath."index.html"); 
    $file2 = fopen($feedpath."index.html","w");// create new file with this name
    fwrite($file2,"<p><a href = \"".$filename."\">".$filename."</a></p>".$oldfeed); //write data to file
    fclose($file2);  //close file
    
?>
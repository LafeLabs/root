<?php
    $name = $_POST['name'];
    $type = $_POST["type"];  
    mkdir($name);  
    $replicatorcode = file_get_contents("http://geometron.000webhostapp.com/replicators/".$type."/php/replicator.txt");
    $file = fopen($name."/replicator.php","w");// create new file with this name
    fwrite($file,$replicatorcode); //write data to file
    fclose($file);  //close file
?>

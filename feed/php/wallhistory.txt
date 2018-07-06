<!doctype html>
<html>
<head>
<title>Wall History</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

EVERYTHING IS PHYSICAL
EVERYTHING IS FRACTAL
EVERYTHING IS RECURSIVE

-->
<!--Stop Google:-->
<META NAME="robots" CONTENT="noindex,nofollow">
</head>    
<body>
<div id = "pathdiv" style = "display:none"></div>
<p>
    <a href = "walleditor.php">walleditor</a>
</p>


<?php
    $fullpath = "";
    if(isset($_GET['path'])){
        $path = $_GET['path'];
        $fullpath = getcwd()."/".$path."feed";
        $subpath = $path."feed";
        $files = array_reverse(scandir(getcwd()."/".$path."feed"));
    }
    else{
        $files = array_reverse(scandir(getcwd()."/feed"));
        $path = "";
        $fullpath = getcwd()."/feed";
        $subpath = "feed";

    }

    echo $fullpath."<br/>";
foreach($files as $value){
    if($value != "." && $value != ".." && substr($value,0,4) == "wall"){
  //      echo $value."<br/>".substr(substr($value,4),0,-4)."<br/>";
        $timestamp = substr(substr($value,4),0,-4);

        echo "<p>\n";
        echo "date and time:";
        echo gmdate("Y-m-d H:i:s", $timestamp)."\n";     
        echo ",\nfilesize=";
        echo filesize($fullpath."/".$value);
        echo "bytes";
        echo "<br/>\n";
        echo "<a href = \"".$subpath."/".$value."\">".$subpath."/".$value."</a><br/>\n";
        echo "<a href = \"index.php?url=".$subpath."/".$value."\">index.php?url=".$subpath."/".$value."</a>\n";
        echo "</p>\n";
    }
}

?>
<style>
body{
    font-size:1.5em;
    font-family:helvetica;
}
</style>
</body>
</html>

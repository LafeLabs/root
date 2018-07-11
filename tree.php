<!doctype html>
<html>
<head>
<title>Tree</title>
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

<?php

function listfiles($localpath,$root){
    $fullpath = getcwd().$root.$localpath;
    $files = scandir($fullpath);
//    echo "<span class = \"foo\">".$root."</span>";
    foreach($files as $filename){
        if($filename != ".git" && $filename != "svg" && $filename != "css" && $filename != "json" && $filename != "javascript" && $filename != "decks" && $filename != "bytecode" && $filename != "php" && $filename != "html" && $filename != "." && $filename != ".." && is_dir($fullpath."/".$filename)){
            
           $fileandpath = substr($localpath,1)."/".$filename;
           if($fileandpath[0] == "/"){
               $fileandpath = substr($fileandpath,1);
           } 
           echo  "\n<li><a href = \"".$root."index.php?path=".$fileandpath."/\">".$fileandpath."/</a></li>\n";
               $nextpath = $localpath."/".$filename;                
            echo "<ul>";
           listfiles($nextpath,$root);
            echo "</ul>";
        }
    }
}


echo "<ul>";

    echo "<li>";
        echo "<h4>page/</h4>";
        echo "<ul>\n";
            listfiles("","/page/");
        echo "</ul>\n";
    echo "</li>";

    echo "<li>";
        echo "<h4>feed</h4>";
        echo "<ul>\n";
            listfiles("","/feed/");
        echo "</ul>\n";
    echo "</li>";

    echo "<li>";
        echo "<h4>scroll/</h4>";
        echo "<ul>\n";
            listfiles("","/scroll/");
        echo "</ul>\n";
    echo "</li>";

    echo "<li>";
        echo "<h4>symbol/</h4>";
        echo "<ul>\n";
            listfiles("","/symbol/");
        echo "</ul>\n";
    echo "</li>";
    
    echo "<li>";
        echo "<h4>deck/</h4>";
        echo "<ul>\n";
            listfiles("","/deck/");
        echo "</ul>\n";
    echo "</li>";

    echo "<li>";
        echo "<h4>curve/</h4>";
        echo "<ul>\n";
            listfiles("","/curve/");
        echo "</ul>\n";
    echo "</li>";

    echo "<li>";
        echo "<h4>map/</h4>";
        echo "<ul>\n";
            listfiles("","/map/");
        echo "</ul>\n";
    echo "</li>";

echo "</ul>";

?>
<p><a href = "index.php">index.php</a></p>
<p><a href = "editor.php">editor.php</a></p>
<style>
    body{
        font-size:3em;
        background-color:white;
        font-family:Helvetica;
    }
    ul ul{
        font-size:0.7em;
        margin-left:6em;
    }
    #actioninput{
        width:1em;
    }

</style>

</body>
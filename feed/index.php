<!doctype html>
<html>
<head>
<title>Feed</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

EVERYTHING IS PHYSICAL
EVERYTHING IS FRACTAL
EVERYTHING IS RECURSIVE

-->
<!--Stop Google:-->
<META NAME="robots" CONTENT="noindex,nofollow">
<!-- links to MathJax JavaScript library, un-comment to use math-->
<!--

<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script>
	MathJax.Hub.Config({
		tex2jax: {
		inlineMath: [['$','$'], ['\\(','\\)']],
		processEscapes: true,
		processClass: "mathjax",
        ignoreClass: "no-mathjax"
		}
	});//			MathJax.Hub.Typeset();//tell Mathjax to update the math
</script>

-->
</head>
<body>
<div id = "pathdiv" style= "display:none"><?php

    if(isset($_GET['path'])){
        echo $_GET['path'];
    }

?></div>
<div id = "json"><?php

$jsonurl = "../page/physics/art/qfade/json/";


$jsonlist = explode(",",file_get_contents($jsonurl."list.txt"));
$index = 0;

echo "[";
foreach($jsonlist as $value){
  if(strlen($value) > 1 && $index < count($jsonlist) - 2){
      echo file_get_contents($jsonurl.$value).",";
  }  
  else{
      echo file_get_contents($jsonurl.$value);
  }
  $index += 1;
}
echo "]";

?></div>

<?php
    if(isset($_GET['url']) && !isset($_GET['path'])){
        echo file_get_contents($_GET['url']);
    }
    if(!isset($_GET['url']) && !isset($_GET['path'])){
        echo file_get_contents("html/feed.txt");
    }
    if(isset($_GET['path'])){
        echo file_get_contents($_GET['path']."/html/feed.txt");
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
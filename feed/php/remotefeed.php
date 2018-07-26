<!doctype html>
<html>
<head>
<title>Feed</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

EVERYTHING IS PHYSICAL
EVERYTHING IS FRACTAL
EVERYTHING IS RECURSIVE

NO MONEY
NO PROPERTY
NO MINING


-->
<!--Stop Google:-->
<META NAME="robots" CONTENT="noindex,nofollow">
<!-- links to MathJax JavaScript library, un-comment to use math-->

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
</head>
<body>
<div id = "pathdiv" style= "display:none"><?php

    if(isset($_GET['path'])){
        echo $_GET['path'];
    }

?></div>
<div id = "datadiv" style= "display:none"><?php
    
    if(isset($_GET['path'])){
        echo file_get_contents($_GET['path']."/json/feed.txt");
    }
    else{
        echo file_get_contents("json/feed.txt");
    }
    
?></div>


<script>

feeddata = JSON.parse(document.getElementById("datadiv").innerHTML);

    
</script>
</body>
</html>

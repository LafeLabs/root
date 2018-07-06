<!doctype html>
<html>
<head>
<title>Wall</title>
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
<div id = "localdatadiv" style= "display:none"><?php

    if(isset($_GET['path'])){
        echo file_get_contents($_GET['path']."/html/wall.txt");
    }
?></div>
<div style = "display:none" id = "datadiv">
<?php
if(isset($_GET['url'])){
    echo file_get_contents($_GET['url']);
}
else{
    echo file_get_contents("html/wall.txt");
}
?>
</div>
<a id = "postlink" href = "post.php">POST TO WALL</a>
<h2 id = "titleh">Wall</h2>
<a id = "editorlink" href = "walleditor.php">EDIT WALL</a>
<div id = "feedscroll"></div>
<style>
    body{
    font-size:1.5em;
    font-family:helvetica;
}
#titleh{
    position:absolute;
    z-index:-1;
    left:1em;
    top:0.1em;
    right:1em;
    text-align:center;
}
#feedscroll{
    position:absolute;
    top:3em;
    left:0px;
    right:0px;
    bottom:0px;
    overflow:scroll;
    padding:1em 1em 1em 1em;
}
#feedscroll img{
    display:block;
    margin:auto;
}
#postlink{
    position:absolute;
    top:1em;
    left:1em;
}
#editorlink{
    position:absolute;
    right:1em;
    top:1em;
}
img{
    width:50%;
    display:block;
    margin:auto;
}
</style>

<script>

pathset = false;

if(document.getElementById("pathdiv").innerHTML.length > 1){
    pathset = true;
    localdata = document.getElementById("localdatadiv").innerHTML;
    path = document.getElementById("pathdiv").innerHTML;
    document.getElementById("feedscroll").innerHTML = localdata;
    document.getElementById("editorlink").href = "walleditor.php?path=" + path;
    document.getElementById("editorlink").innerHTML = "walleditor.php?path=" + path;
    document.getElementById("postlink").href = "post.php?path=" + path;
    document.getElementById("postlink").innerHTML = "post.php?path=" + path;
}
else{
    document.getElementById("feedscroll").innerHTML = document.getElementById("datadiv").innerHTML;
}
</script>
</body>
</html>
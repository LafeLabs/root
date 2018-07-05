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
<?php
    echo file_get_contents("html/page.txt");
    echo "<style>\n";
    $data = file_get_contents("css/pagestyle.txt");
    echo $data;
    echo "</style>\n";
?>
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
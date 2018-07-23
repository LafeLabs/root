<!doctype html>
<html>
<head>
<title>Index</title>
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
<!--

<script src = "https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js"></script>


-->
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

<script id = "topfunctions">

<?php

    if(isset($_GET['path'])){
        if(file_exists($_GET['path']."javascript/topfunctions.txt")){
            echo file_get_contents($_GET['path']."javascript/topfunctions.txt");    
        }
    }
    if(!isset($_GET['path'])){
        if(file_exists("javascript/topfunctions.txt")){
            echo file_get_contents("javascript/topfunctions.txt");
        }
    }

?>

</script>
</head>
<body>
<div id = "pathdiv" style= "display:none"><?php

    if(isset($_GET['path'])){
        echo $_GET['path'];
    }

?></div>
<div id = "extdatadiv" style = "display:none"><?php
if(isset($_GET['url'])){
    echo file_get_contents($_GET['url']);
}?>
</div>
    <a id = "pageeditorlink" href = "pageeditor.php">pageeditor.php</a>
<a id = "treelink" href = "tree.php">tree.php</a>
<div id = "page">
<?php
    if(isset($_GET['path'])){
        echo file_get_contents($_GET['path']."html/page.txt");
    }
    else{
        echo file_get_contents("html/page.txt");
    }
?>
</div>
<script>
    
if(document.getElementById("extdatadiv").innerHTML.length > 10){
        document.getElementById("page").innerHTML = document.getElementById("extdatadiv").innerHTML;
}
    
pathset = false;

if(document.getElementById("pathdiv").innerHTML.length > 1){
    pathset = true;
    path = document.getElementById("pathdiv").innerHTML;
    document.getElementById("pageeditorlink").href = "pageeditor.php?path=" + path;
    document.getElementById("pageeditorlink").innerHTML = "pageeditor.php?path=" + path;
}


</script>
<style>
body{
    font-family:Helvetica;
}
h1,h2,h3,h4,h5{
    width:100%;
    text-align:center;
}
#page{
    position:absolute;
    overflow:scroll;
    text-align:justify;
    left:0.5em;
    right:0.5em;
    top:5em;
    bottom:0px;
    padding:1em 1em 1em 1em;
    font-size:24px;
}
#page img{
    width:50%;
    display:block;
    margin:auto;
}
#pageeditorlink{
    position:absolute;
    top:0.5em;
    left:2em;
    font-size:24px;
}
#treelink{
    position:absolute;
    top:0.5em;
    right:2em;
    font-size:24px;
}
</style>

</body>
</html>
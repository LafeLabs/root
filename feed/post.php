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
<div id = "localdatadiv" style= "display:none"><?php

    if(isset($_GET['path'])){
        echo file_get_contents($_GET['path']."/html/wall.txt");
    }
?></div>

<div class = "button" id = "publishbutton">PUBLISH</div>
<a id = "indexlink" href = "index.php">BACK TO WALL</a>
<a id = "editorlink" href = "walleditor.php">EDITOR</a>
<div id = "postscroll">
    <h4>Input URL of image here:</h4>
    <input id = "urlinput"/>
    <img id = "mainimage"/>
    <h4>Input text here:</h4>
    <textarea id = "textinput"></textarea>
</div>
<script>

if(document.getElementById("pathdiv").innerHTML.length > 1){

    path = document.getElementById("pathdiv").innerHTML;


    document.getElementById("indexlink").href = "index.php?path=" + path;
    document.getElementById("editorlink").href = "walleditor.php?path=" + path;

}

document.getElementById("publishbutton").onclick = function(){
    textvalue = document.getElementById("textinput").value;
    imagesrc = document.getElementById("urlinput").value;
    addedhtml = "\n";
    if(imagesrc.length > 5){
        addedhtml = "<img src = \"" + imagesrc + "\"/>\n";
    }
    addedhtml += "\n<p>" + textvalue + "</p>\n";

    path = document.getElementById("pathdiv").innerHTML;

    data = encodeURIComponent(addedhtml);
    var httpc = new XMLHttpRequest();
    var url = "posttowall.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
    if(path.length > 1){
        httpc.send("data="+data + "&path=" + path);//send text to posttowall.php
    }
    else{
        httpc.send("data="+data);//send text to posttowall.php
    }
    
    document.getElementById("textinput").value = "";
    document.getElementById("urlinput").value = "";
    document.getElementById("mainimage").src = "";

}


document.getElementById("urlinput").onchange = function(){
    document.getElementById("mainimage").src = this.value;    
}

</script>
<style>
body{
    font-family:helvetica;
    font-size:1.5em;
}
input{
    font-family:helvetica;
    font-size:1.5em;
}
textarea{
    font-family:helvetica;
    font-size:1.5em;
}
.button{
    padding:0.5em 0.5em 0.5em 0.5em;
    cursor:pointer;
    border:solid;
    border-radius:0.25em;
}
.button:hover{
    background-color:green;
}
.button:active{
    background-color:yellow;
}

#urlinput{
    width:80%;
    display:block;
    margin:auto;
    margin-top:2em;
}
#publishbutton{
    position:absolute;
    top:0px;
    left:40%;
    width:20%;
    text-align:center;
    z-index:2;
}
#textinput{
    width:80%;
    border:solid;
    display:block;
    margin:auto;
    margin-top:0.5em;
    height:25em;
}
#mainimage{
    width:80%;
    display:block;
    margin:auto;
    border:solid;
    margin-top:0.5em;
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
a{
    z-index:2;
}
#postscroll{
    position:absolute;
    top:3em;
    left:1em;
    right:1em;
    bottom:1em;
    overflow:scroll;
    
}
    
</style>
</body>
</html>
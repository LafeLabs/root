 <!doctype html>
<html>
<head>
 <!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

EVERYTHING IS PHYSICAL
EVERYTHING IS FRACTAL
EVERYTHING IS RECURSIVE
NO MONEY
NO PROPERTY
NO MINING
EGO DEATH:
    LOOK TO THE INSECTS
    LOOK TO THE FUNGI
    LANGUAGE IS HOW THE MIND PARSES REALITY
-->
<!--Stop Google:-->
<META NAME="robots" CONTENT="noindex,nofollow">
</head>
<body>
<div id = "pathdiv" style = "display:none"><?php
    if(isset($_GET['path'])){
        echo $_GET['path'];
    }
?></div>

<a href = "index.php">index.php</a>

<textarea id = "maineditor"></textarea>


<script>


currentFile = "html/wall.txt";
var httpc = new XMLHttpRequest();
httpc.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        filedata = this.responseText;
        document.getElementById("maineditor").value = filedata;
    }
};
httpc.open("GET", "fileloader.php?filename=" + currentFile, true);
httpc.send();

document.getElementById("maineditor").onkeyup = function(){
    data = encodeURIComponent(document.getElementById("maineditor").value);
    var httpc = new XMLHttpRequest();
    var url = "filesaver.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
    httpc.send("data="+data+"&filename="+currentFile);//send text to filesaver.php
}

</script>
<style>

#maineditor{
    font-family:courier;
    background-color:black;
    color:white;
    font-size:30px;
    position:absolute;
    left:0px;
    top:5%;
    height:85%;
    width:100%;
}

.button{
    padding:0.5em 0.5em 0.5em 0.5em;
    cursor:pointer;
    border:solid;
    border-radius:0.25em;
    text-align:center;
}
.button:hover{
    background-color:green;
}
.button:active{
    background-color:yellow;
}

</style>
</body>
</html>
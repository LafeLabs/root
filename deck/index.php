<!doctype html>
<html>
<head>
<title>Slide Deck</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

-->
<!--
<script src="https://hammerjs.github.io/dist/hammer.js"></script>
-->

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
<!--Stop Google:-->
<META NAME="robots" CONTENT="noindex,nofollow">
<!--ace editor::-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js" type="text/javascript" charset="utf-8"></script>

<script id = "bytecodeScript">
/*
<?php
echo file_get_contents("../symbol/bytecode/baseshapes.txt")."\n";
echo file_get_contents("bytecode/shapetable.txt")."\n";
echo file_get_contents("bytecode/font.txt")."\n";
echo file_get_contents("../symbol/bytecode/keyboard.txt")."\n";
echo file_get_contents("../symbol/bytecode/symbols013xx.txt")."\n";
echo file_get_contents("../symbol/bytecode/symbols010xx.txt")."\n";
?>
*/
</script>
<script id = "topfunctions">
<?php
echo file_get_contents("../symbol/javascript/topfunctions.txt");
?>   
</script>
<script id = "actions">
function doTheThing(localCommand){    
    if(localCommand >= 040 && localCommand <= 0176){
        currentHTML += String.fromCharCode(localCommand);
        currentWord += String.fromCharCode(localCommand);
    }
    if(localCommand >= 0200 && localCommand <= 0277){//shapes 
        if(!(localCommand == 0207 && editMode == false) ){
            drawGlyph(currentTable[localCommand]);    	    
        }
    }
    if(localCommand >= 01000 && localCommand <= 01777){//symbol glyphs
            drawGlyph(currentTable[localCommand]);    	    
    } 
    <?php
    echo file_get_contents("../symbol/javascript/actions03xx.txt");
    echo "\n";
    echo file_get_contents("../symbol/javascript/actions0xx.txt");
    echo "\n";
    ?>    
}
</script>
</head>
<body>
<div id = "stylejsondiv" style = "display:none"><?php

echo file_get_contents("json/stylejson.txt");
    
?></div>
<div id = "pathdiv" style= "display:none"><?php

    if(isset($_GET['path'])){
        echo $_GET['path'];
    }

?></div>
<div id = "datadiv"><?php

    if(isset($_GET['path'])){
        echo file_get_contents($_GET['path']."/html/deck.txt");
    }
    else{
        echo file_get_contents("html/deck.txt");
    }

?></div>    
<div id = "shadowdatadiv"  style = "display:none" class = "no-mathjax"><?php
    
    if(isset($_GET['path'])){
        echo file_get_contents($_GET['path']."/html/deck.txt");
    }
    else{
        echo file_get_contents("html/deck.txt");
    }

?></div>    
<div id = "extdatadiv" style = "display:none"><?php
if(isset($_GET['url'])){
    $urlfilename = $_GET['url'];
    echo file_get_contents($_GET['url']);
}?></div>
<div id = "pageNumberDiv" style = "display:none"><?php
 if(isset($_GET['page'])){
    $pagenumber = $_GET['page'];
    echo $pagenumber;
}   
?></div>
<div id = "mainpage">

<div id = "editmodebutton" class = "button">EDIT</div>
<div id="maineditor" contenteditable="true" spellcheck="false" class = "no-mathjax"></div>

<a  id = "editorlink" href = "deckeditor.php">deckeditor.php</a>
<a  id = "uplink" href = "../">../</a>
<a  id = "deckslink" href = "decks/">decks/</a>
<a id = "treelink" href = "tree.php">tree.php</a>

<table id = "buttontable">
    <tr>
        <td class = "button">SAVE DECK</td>
    </tr>    
    <tr>
        <td class = "button">NEW BOX</td>
    </tr>
    <tr>
        <td class = "button">NEW PAGE</td>
    </tr>

</table>

<canvas id="invisibleCanvas" style="display:none"></canvas>
<canvas id="mainCanvas"></canvas>
<table id = "controlTable">
    <tr id = "addressline" style = "display:none">
        <td>INDEX:</td><td><input/></td>
    </tr>
    <tr>
        <td>ACTION:</td><td><input/></td>
    </tr>
</table>

<input id = "glyphspellinput"/>

<div id = "backbutton" class = "button">&#x2BC7</div>
<div id = "fwdbutton" class = "button">&#x2BC8</div>


</div>
<script>
</script>
<script id = "init">
init();
function init(){
<?php
    echo file_get_contents("javascript/init.txt");
?>
}
</script>
<script id = "redraw">
redraw();
function redraw(){
<?php
    echo file_get_contents("javascript/redraw.txt");
?>
}
</script>
<script id = "pageevents">
<?php
    echo file_get_contents("javascript/pageevents.txt");
?>
</script>
<style>
#buttontable{
    position:absolute;
    left:10em;
    top:0px;
    z-index:2;
}
#datadiv{
    position:absolute;
    left:0px;
    right:0px;
    top:0px;
    bottom:0px;
}
#shadowdatadiv{
    position:absolute;
    left:0px;
    right:0px;
    top:0px;
    bottom:0px;
}
#maineditor{
    position:absolute;
    right:0px;
    top:5em;
    width:16em;
    height:30em;
    z-index:2;
    font-size:16px;
}
#mainpage{
    position:absolute;
    left:0px;
    top:0px;
    right:0px;
    bottom:0px;
}
.page{
    position:absolute;
    left:0px;
    top:0px;
    right:0px;
    bottom:0px;
}
.box{
    position:absolute;    
    border:solid;
    font-family:Helvetica;
    text-align:center;
    font-size:20px;
    z-index:2;
}
.box img{
    width:95%;
    display:block;
    text-align:center;
}
body{
    overflow:hidden;
}
.glyphdata{
    display:none;
}
.pagejson{
    display:none;
}
 #editorlink{
     position:absolute;
     left:70%;
     top:0px;
     z-index:2;
 }
  #uplink{
     position:absolute;
     left:70%;
     top:2em;
     z-index:2;
 }
#deckslink{
     position:absolute;
     left:70%;
     top:1em;
     z-index:2;
}
#treelink{
    position:absolute;
    left:50%;
    top:1em;
    z-index:2
}
#mainCanvas{
    position:absolute;
    z-index:0;
    left:0px;
    top:0px;
}
#controlTable{
    left:15px;
    top:15px;
    font-family:courier;
    font-size:18;
    position:absolute;
    z-index:2;
}
#controlTable input{
    width:3em;
    font-family:courier;
}
.button{
    padding:0.5em 0.5em 0.5em 0.5em;
    font-family:courier;
    cursor:pointer;
    border-radius:0.5em;
    z-index:2;
}
.button:hover{
    background-color:green;
}
.button:active{
    background-color:yellow;
}

#glyphspellinput{
    position:absolute;
    bottom:5px;
    left:10px;
    width:98%;
        z-index:2;

    font-family:courier;
    font-size:16px;
}

#editmodebutton{
    position:absolute;
    right:0px;
    top:0px;
    z-index:2;
}
#backbutton{
    position:absolute;
    bottom:10%;
    left:0px;
    z-index:3;
    font-size:3em;
    border-radius:1.5em;
}
#fwdbutton{
    position:absolute;
    bottom:10%;
    right:0px;
    z-index:3;
    font-size:3em;
    border-radius:1.5em;
}    
ul{
    text-align:left;
}
</style>
</body>
</html>
 <!doctype html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.6/ace.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div id = "scrolldirdiv" style = "display:none">
<?php
$scrolls = scandir(getcwd()."/scrolls");
foreach($scrolls as $value){
    if($value != "." && $value != ".."){
        echo $value."\n";
    }
}
?>
</div>
<div id = "linkscroll">
    <a href = "text2php.php">text2php.php</a>
    <a href = "index.php">index.php</a>
    <a href = "dnagenerator.php" id = "dnalink">dnagenerator.php</a>
    <a href = "makenewscroll.php">makenewscroll.php</a>
    <a href = "metacreator.php">metacreator.php</a>
    <a href = "texlist.php">texlist.php</a>
    <a href = "figurelist.php">figurelist.php</a>
    <a href = "scrolleditor.php">scrolleditor.php</a>
    <a href = "jupyter.php">jupyter.php</a>
    <div class = "button" id = "imgbutton">&ltIMG src = " "/&gt</div>
    <div class = "button" id = "pbutton">&ltP&gt  &lt/P&gt</div>

</div>
<div id = "namediv"></div>
<div id="maineditor" contenteditable="true" spellcheck="false"></div>
<div id = "filescroll">

    <div class = "php file">php/editor.txt</div>
    <div class = "php file">php/index.txt</div>
    <div class = "php file">php/scrolleditor.txt</div>
    <div class = "php file">php/replicator.txt</div>
    <div class = "php file">php/filesaver.txt</div>
    <div class = "php file">php/fileloader.txt</div>
    <div class = "php file">php/text2php.txt</div>
    <div class = "php file">php/scrollcreator.txt</div>
    <div class = "php file">php/makenewscroll.txt</div>
    <div class = "php file">php/creator.txt</div>
    <div class = "php file">php/metacreator.txt</div>
    <div class = "php file">php/dnagenerator.txt</div>
    <div class = "php file">php/texlist.txt</div>
    <div class = "php file">php/figurelist.txt</div>

    <div class = "php file">php/jupyter.txt</div>

    <div class = "json file">json/dna.txt</div>

</div>

<script>
rawscrollnames = document.getElementById("scrolldirdiv").innerHTML;
scrollnames = rawscrollnames.split("\n");

var filescrolldata = document.getElementById("filescroll").innerHTML;
for(var index = 0;index < scrollnames.length;index++){
    if(scrollnames[index].length > 1){
        filescrolldata += "\n<div class = \"scrolls file\">scrolls/" + scrollnames[index] + "</div>\n";
    }
}

document.getElementById("filescroll").innerHTML = filescrolldata;

currentFile = "php/scrolleditor.txt";
var httpc = new XMLHttpRequest();
httpc.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        filedata = this.responseText;
        editor.setValue(filedata);
    }
};
httpc.open("GET", "fileloader.php?filename=" + currentFile, true);
httpc.send();
files = document.getElementById("filescroll").getElementsByClassName("file");
for(var index = 0;index < files.length;index++){
    files[index].onclick = function(){
        currentFile = this.innerHTML;
        //use php script to load current file;
        var httpc = new XMLHttpRequest();
        httpc.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                filedata = this.responseText;
                editor.setValue(filedata);
                var fileType = currentFile.split("/")[0]; 
                var fileName = currentFile.split("/")[1];
              
            }
        };
        httpc.open("GET", "fileloader.php?filename=" + currentFile, true);
        httpc.send();
        if(this.classList[0] == "css"){
            editor.getSession().setMode("ace/mode/css");
            document.getElementById("namediv").style.color = "yellow";
            document.getElementById("namediv").style.borderColor = "yellow";
        }
        if(this.classList[0] == "html"){
            editor.getSession().setMode("ace/mode/html");
            document.getElementById("namediv").style.color = "#0000ff";
            document.getElementById("namediv").style.borderColor = "#0000ff";
        }
        if(this.classList[0] == "scrolls"){
            editor.getSession().setMode("ace/mode/html");
            document.getElementById("namediv").style.color = "#87CEEB";
            document.getElementById("namediv").style.borderColor = "#87CEEB";
        }
        if(this.classList[0] == "javascript"){
            editor.getSession().setMode("ace/mode/javascript");
            document.getElementById("namediv").style.color = "#ff0000";
            document.getElementById("namediv").style.borderColor = "#ff0000";
        }
        if(this.classList[0] == "bytecode"){
            editor.getSession().setMode("ace/mode/text");
            document.getElementById("namediv").style.color = "#654321";
            document.getElementById("namediv").style.borderColor = "#654321";
        }
        if(this.classList[0] == "php"){
            editor.getSession().setMode("ace/mode/php");
            document.getElementById("namediv").style.color = "#800080";
            document.getElementById("namediv").style.borderColor = "#800080";
        }
        if(this.classList[0] == "json"){
            editor.getSession().setMode("ace/mode/json");
            document.getElementById("namediv").style.color = "orange";
            document.getElementById("namediv").style.borderColor = "orange";
        }

        document.getElementById("namediv").innerHTML = currentFile;
    }
}
document.getElementById("namediv").innerHTML = currentFile;
document.getElementById("namediv").style.color = "#800080";
document.getElementById("namediv").style.borderColor = "#800080";

editor = ace.edit("maineditor");
editor.setTheme("ace/theme/cobalt");
editor.getSession().setMode("ace/mode/php");
editor.getSession().setUseWrapMode(true);
editor.$blockScrolling = Infinity;

document.getElementById("maineditor").onkeyup = function(){
    data = encodeURIComponent(editor.getSession().getValue());
    var httpc = new XMLHttpRequest();
    var url = "filesaver.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
    httpc.send("data="+data+"&filename="+currentFile);//send text to filesaver.php
    var fileType = currentFile.split("/")[0]; 
    var fileName = currentFile.split("/")[1];
}

</script>
<style>
#namediv{
    position:absolute;
    top:5px;
    left:20%;
    font-family:courier;
    padding:0.5em 0.5em 0.5em 0.5em;
    border:solid;
    background-color:#101010;

}
a{
    color:white;
    display:block;
    margin-bottom:0.5em;
    margin-left:0.5em;
}
body{
    background-color:#404040;
}
.html{
    color:#0000ff;
}
.css{
    color:yellow;
}
.php{
    color:#800080;
}
.javascript{
    color:#ff0000;
}
.bytecode{
    color:#654321;
}
.json{
    color:orange;
}
.scrolls{
    color:#87ceeb;
}

.file{
    cursor:pointer;
    border-radius:0.25em;
    border:solid;
    padding:0.25em 0.25em 0.25em 0.25em;
}
.files:hover{
    background-color:green;
}
.files:active{
    background-color:yellow;
}
#filescroll{
    position:absolute;
    overflow:scroll;
    top:60%;
    bottom:0%;
    right:0%;
    left:75%;
    border:solid;
    border-radius:5px;
    border-width:3px;
    background-color:#101010;
    font-family:courier;
    font-size:18px;
}
#linkscroll{
    position:absolute;
    overflow:scroll;
    top:5em;
    bottom:50%;
    right:0px;
    left:75%;
    border:solid;
    border-radius:5px;
    border-width:3px;
    background-color:#101010;
    font-family:courier;
    font-size:18px;
    
}
#maineditor{
    position:absolute;
    left:0%;
    top:5em;
    bottom:1em;
    right:30%;
}



</style>

<div style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'><a title="000webhost logo" rel="nofollow" target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_campaign=ss-footer_logo&amp;utm_medium=000_logo&amp;utm_content=website"><img src="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png" alt="000webhost logo"></a></div></body>
</html>
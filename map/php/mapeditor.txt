<!doctype html>
<html>
<head>
<title>Metamap</title>
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
<div id = "pathdiv" style= "display:none"><?php

    if(isset($_GET['path'])){
        echo $_GET['path'];
    }

?></div>



<a href = "index.php" id = "indexlink">VIEW</a>

<a href = "../symbol/shapetableeditor.php?path=../map/&amp;backlink=../map/mapeditor.php" id = "shapeslink">SHAPES</a>
<a href = "glypheditor.php" id = "glyphlink">GLYPH</a>

<a href = "tree.php" id = "treelink">TREE</a>
<a href = "editor.php" id = "editorlink">EDITOR</a>

<a href = "linkeditor.php" id = "linkslink">LINKS</a>
<a href = "imageeditor.php" id = "imageslink">IMAGES</a>

<a href = "backgroundimageeditor.php" id = "backgroundlink">BACKGROUND</a>


<script id = "init">

    path = document.getElementById("pathdiv").innerHTML;
    if(path.length>1){
        document.getElementById("indexlink").href = "index.php?path=" + path;
        document.getElementById("glyphlink").href = "glypheditor.php?path=" + path;
        document.getElementById("linkslink").href = "linkeditor.php?path=" + path;
        document.getElementById("imageslink").href = "imageeditor.php?path=" + path;
        document.getElementById("backgroundlink").href = "backgroundimageeditor.php?path=" + path;
    }

</script>
<style>
a{
    position:absolute;
    font-family:Helvetica;
    font-size:3em;
}
#indexlink{
    top:2em;
    left:50%;
}

#shapeslink{
    right:2em;
    top:25%;
}
#glyphlink{
    right:2em;
    top:75%;
}

#treelink{
    left:50%;
    top:50%;
}
#editorlink{
    left:50%;
    top:60%;
}
#linkslink{
    left:2em;
    top:75%;
}
#imageslink{
    left:2em;
    top:25%;
}

#backgroundlink{
    left:50%;
    bottom:2em;
}


</style>
</body>
</html>
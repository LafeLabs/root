 <!doctype html>
<html>
<head>
<title>Function Plotter</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

EVERYTHING IS PHYSICAL
EVERYTHING IS FRACTAL
EVERYTHING IS RECURSIVE

NO MONEY
NO MINING
NO PROPERY

LOOK AT THE FUNGI
LOOK AT THE INSECTS
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

<a id = "editorlink" href = "equationeditor.php">equationeditor.php</a>
<a id = "indexlink" href = "index.php">index.php</a>

<div id = "scroll">
<?php

    if(isset($_GET['path'])){
        $path = $_GET['path'];
        $svgpath = "/".$path."svg";
        $svgpath2 = $path."svg/";

    }
    else{
        $svgpath = "/svg";
        $svgpath2 = "svg/";
    }
 
    $svgs = scandir(getcwd().$svgpath);
    $svgs = array_reverse($svgs);
    foreach($svgs as $value){
        if($value != "." && $value != ".." && substr($value,-4) == ".svg"){
            echo "\n<p><a href = \"index.php?url=";
            echo $svgpath2.$value;
            echo "\"><img src = \"";        

            $svgcode = file_get_contents($svgpath2.$value);
            $topcode = explode("</imgurl>",$svgcode)[0];
            $outcode = explode("<imgurl>",$topcode)[1];
            if(strlen($outcode) > 4){
                $imgurl =  trim($outcode);
            }
            else{
                $imgurl = $svgpath2.$value;
            }
            echo $imgurl;
            echo "\"></a></p>\n";
        }
    }
?>
</div>
<script>
    path = document.getElementById("pathdiv").innerHTML;
    if(path.length>1){
        document.getElementById("indexlink").href = "index.php?path=" + path;
        document.getElementById("editorlink").href = "equationeditor.php?path=" + path;
    }
</script>
<style>
    
</style>
</body>
</html>
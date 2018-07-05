<!doctype html>
<html>
<head>
<title>Geometron Symbol</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.
-->
<script id = "bytecodeScript">
/*
<?php
echo file_get_contents("bytecode/baseshapes.txt")."\n";
echo file_get_contents("bytecode/shapetable.txt")."\n";
echo file_get_contents("bytecode/font.txt")."\n";
echo file_get_contents("bytecode/keyboard.txt")."\n";
echo file_get_contents("bytecode/symbols013xx.txt")."\n";
echo file_get_contents("bytecode/symbols010xx.txt")."\n";
?>
*/
</script>
<script id = "topfunctions">
<?php
echo file_get_contents("javascript/topfunctions.txt");
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
    echo file_get_contents("javascript/actions03xx.txt");
    echo "\n";
    echo file_get_contents("javascript/actions0xx.txt");
    echo "\n";
    ?>    
}
</script>
</head>
<body>
<div id = "datadiv" style = "display:none">
<?php
    echo file_get_contents("json/currentjson.txt");
?>
</div>    
<div id = "extdatadiv" style = "display:none"><?php
if(isset($_GET['url'])){
    $urlfilename = $_GET['url'];
    if(substr($urlfilename,-4) == ".svg"){
        $svgcode = file_get_contents($_GET['url']);
        $topcode = explode("</json>",$svgcode)[0];
        $jsoncode = explode("<json>",$topcode)[1];
        echo $jsoncode;
    }
    else{
        echo file_get_contents($_GET['url']);
    }
}?>
</div>
<div id = "page">
<?php
    echo file_get_contents("html/page.txt");
?>
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
<?php
    echo "<style>\n";
    echo file_get_contents("css/style.txt");
    echo "</style>\n";
?>
<div style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'><a title="000webhost logo" rel="nofollow" target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_campaign=ss-footer_logo&amp;utm_medium=000_logo&amp;utm_content=website"><img src="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png" alt="000webhost logo"></a></div><div style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'><a title="000webhost logo" rel="nofollow" target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_campaign=ss-footer_logo&amp;utm_medium=000_logo&amp;utm_content=website"><img src="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png" alt="000webhost logo"></a></div></body>
</html>
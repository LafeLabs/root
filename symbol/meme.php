<!doctype html>
<html>
<head>
<title>Geometron Meme</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.
-->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.js"></script>
</head>
<body>
<div id = "backurldata" style = "display:none"><?php

    if(isset($_GET['backlink'])){
        echo $_GET['backlink'];
    }
    

?></div>
<div id = "pathdiv" style= "display:none"><?php

    if(isset($_GET['path'])){
        echo $_GET['path'];
    }

?></div>
<div id = "datadiv" style = "display:none"><?php

    if(isset($_GET['path'])){
        $svgcode = file_get_contents($_GET['path']."currentsvg.svg");
    }
    else{
        $svgcode = file_get_contents("currentsvg.svg");
    }              
    $topcode = explode("</json>",$svgcode)[0];
    $outcode = explode("<json>",$topcode)[1];
    echo $outcode;  
?></div>
<div id = "svgdatadiv" style = "display:none"><?php
    if(isset($_GET['path'])){
        $svgcode = file_get_contents($_GET['path']."currentsvg.svg");
    }
    else{
        $svgcode = file_get_contents("currentsvg.svg");
    }              
    echo $svgcode;
?></div>
<div id = "page">
    <a href = "" id = "backlink"></a>
    <input id = "urlinput"/>
    <img id = "backimg"/>
    <img id = "svgimg" src = "currentsvg.svg"/>
</div>
<script>

var myElement = document.getElementById('page');
var mc = new Hammer(myElement);

path = document.getElementById("pathdiv").innerHTML;
if(path.length > 1){
    document.getElementById("svgimg").src = path + "currentsvg.svg";
}

currentJSON = JSON.parse(document.getElementById("datadiv").innerHTML);

document.getElementById("svgimg").style.left = (0.5*innerWidth - 0.5*currentJSON.svgwidth).toString() + "px";
document.getElementById("svgimg").style.top = (0.5*innerHeight - 0.5*currentJSON.svgheight).toString() + "px";
document.getElementById("urlinput").value = currentJSON.imgurl;
document.getElementById("backimg").src = currentJSON.imgurl;

document.getElementById("backimg").style.left = (0.5*innerWidth + currentJSON.unit*currentJSON.imgleft).toString() + "px";
document.getElementById("backimg").style.top = (0.5*innerHeight + currentJSON.unit*currentJSON.imgtop).toString() + "px";
document.getElementById("backimg").style.width = (currentJSON.unit*currentJSON.imgw).toString() + "px";

document.getElementById("urlinput").onchange = function(){
    currentJSON.imgurl = this.value;
    document.getElementById("backimg").src = currentJSON.imgurl;
}

mc.get('pan').set({ direction: Hammer.DIRECTION_ALL });
mc.get('rotate').set({ enable: true });
mc.get('pinch').set({ enable: true });


// listen to events...
mc.on("panleft panright panup pandown tap press pinch", function(ev) {
//    myElement.textContent = " deltaX = " + ev.deltaX+ ",  deltaY=" + ev.deltaY +", rotation = " + ev.angle;

  //  currentJSON.imgtop += parseInt(ev.deltaY)/currentJSON.unit;

    document.getElementById("backimg").style.left = (0.5*innerWidth + ev.deltaX + currentJSON.unit*currentJSON.imgleft).toString() + "px";

    document.getElementById("backimg").style.top = (0.5*innerHeight + ev.deltaY +  currentJSON.unit*currentJSON.imgtop).toString() + "px";

    document.getElementById("backimg").style.width = (currentJSON.unit*currentJSON.imgw*ev.scale).toString() + "px";

    if(ev.isFinal && (ev.type == "panup" || ev.type == "pandown" || ev.type == "panleft" || ev.type == "panright") ){
        currentJSON.imgleft += ev.deltaX/currentJSON.unit;
        currentJSON.imgtop += ev.deltaY/currentJSON.unit;
    }
    if(ev.isFinal && ev.type == "pinch"){
        currentJSON.imgw *= ev.scale;
    }
    
    
});

</script>
<style>
#page{
    position:absolute;
    left:0px;
    right:0px;
    top:0px;
    bottom:0px;
}
    #svgimg{
     position:absolute;   
    }
    #urlinput{
        width:90%;
        left:1em;
        font-size:2em;
        position:absolute;
        top:1em;
        border:solid;
        font-family:courier;
    }
    #backimg{
        position:absolute;
    }
</style>
</body>
</html>
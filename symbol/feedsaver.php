 <?php
/* javascript this pairs with:

document.getElementById("savesvg").onclick = function(){
    svgwidth = currentJSON.svgwidth;
    svgheight = currentJSON.svgheight;
    tempx0 = x0;
    tempy0 = y0;
    x0 -= 0.5*(innerWidth - svgwidth);
    y0 -= 0.5*(innerHeight - svgheight);
    ctx = document.getElementById("invisibleCanvas").getContext("2d");
    currentSVG = "<svg width=\"" + svgwidth.toString() + "\" height=\"" + svgheight.toString() + "\" viewbox = \"0 0 " + svgwidth.toString() + " " + svgheight.toString() + "\"  xmlns=\"http://www.w3.org/2000/svg\">\n";
    currentSVG += "\n<!--\n<json>\n" + JSON.stringify(currentJSON,null,"    ") + "\n</json>\n-->\n";
    doTheThing(0300);
    drawGlyph(cleanGlyph);
    currentSVG += "</svg>";
    document.getElementById("textIO").value = currentSVG;

    var httpc = new XMLHttpRequest();
    var url = "feedsaver.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    if(path.length > 1){
         httpc.send("data=" + encodeURIComponent(document.getElementById("textIO").value) + "&path=" + path);//send text to feedsaver.php
    }
    else{
        httpc.send("data=" + encodeURIComponent(document.getElementById("textIO").value));//send text to feedsaver.php
    }
    x0 = tempx0;
    y0 = tempy0;
    redraw();
 
}

*/

    if(isset($_POST['path'])){
        $path = $_POST['path'];
        $indexpath = $path."svg/index.html";
        $feedpath = $path."svg/";   
    }
    else{
        $indexpath = "svg/index.html";
        $feedpath = "svg/";
    }


    $data = $_POST["data"]; //get data 
    $filename = "svg".time().".svg";
    $file = fopen($feedpath.$filename,"w");// create new file with this name
    fwrite($file,$data); //write data to file
    fclose($file);  //close file
    $oldfeed = file_get_contents($indexpath); 
    $file = fopen($indexpath,"w");// create new file with this name
    fwrite($file,"<p><a href = \"".$filename."\"><img src = \"".$filename."\"></a></p>\n".$oldfeed); //write data to file
    fclose($file);  //close file
?>
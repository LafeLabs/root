 <?php
/* javascript this pairs with:

document.getElementById("savemap").onclick = function(){
    var httpc = new XMLHttpRequest();
    var url = "mapsaver.php";        
    httpc.open("POST", url, true);
    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    httpc.send("data=" + encodeURIComponent(JSON.stringify(currentJSON,null,"    ")));//send text to mapsaver.php
}

*/

    if(isset($_POST['path'])){
        $path = $_POST['path'];
        $indexpath = $path."maps/index.html";
        $feedpath = $path."maps/";   
    }
    else{
        $indexpath = "maps/index.html";
        $feedpath = "maps/";
    }

    $data = $_POST["data"]; //get data 
    $filename = "map".time().".txt";
    $file = fopen($feedpath.$filename,"w");// create new file with this name
    fwrite($file,$data); //write data to file
    fclose($file);  //close file

    $oldfeed = file_get_contents($indexpath); 
    $file = fopen($indexpath,"w");// create new file with this name
    fwrite($file,"<p><a href = \"".$filename."\">".$filename."</a></p>\n".$oldfeed); //write data to file
    fclose($file);  //close file

?>
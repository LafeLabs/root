<!doctype html>
<html>
    <head>
        <title>Meta Creator</title>
    </head>
    <body>
<div id= "page">
        <p><a id = "editlink" href = "editor.php">editor.php</a></p>
        <p><a id = "indexlink" href = "index.php">index.php</a></p>
        <table id = "inputtable">
            <tr>
                <td>name:</td>
                <td><input id = "nameinput"/></td>
            </tr>
            <tr>
                <td>type:</td>
                <td><input id = "typeinput"/></td>
            </tr>
        </table>
        <div class = "button" id = "createbutton">CREATE</div>
        <h4>Types:</h4>
        <table id = "typelist">
            <tr><td class = "button">page</td></tr>
            <tr><td class = "button">wall</td></tr>
            <tr><td class = "button">deck</td></tr>
            <tr><td class = "button">book</td></tr>
            <tr><td class = "button">symbol</td></tr>
            <tr><td class = "button">curve</td></tr>
            <tr><td class = "button">map</td></tr>
        </table>
</div>
        <script>
            types = document.getElementById("typelist").getElementsByClassName("button");
            for(var index = 0;index < types.length;index++){
                types[index].onclick = function(){
                    document.getElementById("typeinput").value = this.innerHTML;
                }
            }
            document.getElementById("createbutton").onclick = function(){
                name = document.getElementById("nameinput").value;
                type = document.getElementById("typeinput").value;
                if(name.length > 0 && type.length > 0){
                    var httpc = new XMLHttpRequest();
                    var url = "creator.php";        
                    httpc.open("POST", url, true);
                    httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
                    httpc.send("name=" + name + "&type=" + type);//send text to filesaver.php
                    document.getElementById("page").innerHTML = "<a href = \"" + name + "/\">" + name + "</a>";
                }
            }
        </script>
        <style>
            *{
                box-sizing: border-box;
                font-size:22px;
                font-family:courier;
            }
            input{
                font-size:22px;
                font-family:courier;
            }
            #createbutton{
                text-align:center;
                width:8em;
                margin-top:1em;
                margin-bottom:1em;
                border:solid;
                border-radius:0.5em;
                padding-top:0.5em;
                padding-bottom:0.5em;
            }
            .button{
                cursor:pointer;
                font-family:courier;
                font-size:22px;
            }
            .button:hover{
                background-color:green;
            }
            .button:active{
                background-color:yellow;
            }
        </style>


<div style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'><a title="000webhost logo" rel="nofollow" target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_campaign=ss-footer_logo&amp;utm_medium=000_logo&amp;utm_content=website"><img src="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png" alt="000webhost logo"></a></div></body>
</html>
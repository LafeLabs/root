<!doctype html>
<html>
<head>
<title>Fetch</title>
</head>
<body>
<input id = "fetchurl"/>
<textarea id = "codeout"></textarea>
<script>

document.getElementById("fetchurl").onchange = function(){
        currentFile = this.value;
        //use php script to load current file;
        var httpc = new XMLHttpRequest();
        httpc.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("codeout").value = this.responseText;
            }
        };
        httpc.open("GET", "fileloader.php?filename=" + currentFile, true);
        httpc.send();
}

</script>
</body>
</html>

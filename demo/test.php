<!DOCTYPE HTML>
<html>
<head>
<title>Grupo Marquez - WEB TO FLYER</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    
    function Convert() {
        convertParameter = "storefile=true&OutputFileName=TAPA_ALE&PageNo=true";
        convertParameter = convertParameter  + "&curl=http://www.webtoflyer.com/flyer/html/FLYER_TAPA_06-14-2017_1201pm.html";
        convertParameter = convertParameter  + "&ApiKey=855890385";
        convertParameter = convertParameter  + "&callback=?"
    
        document.getElementById("LabelMessage").innerHTML = '<br >Please be patient. <br></br>Depending on the trip size the PDF creation time could last up to 30 seconds.';
        document.getElementById("HyperLinkFile").innerHTML = '';

        jQuery.getJSON(serviceUrl + convertParameter , function(data){
            if (data.Result == true) {
                document.getElementById("LabelMessage").innerHTML = '';
                document.getElementById("HyperLinkFile").href = data.FileUrl;
                document.getElementById("HyperLinkFile").innerHTML = data.OutputFileName + " (" + data.FileSize +" bytes)";
            } else {
                document.getElementById("LabelMessage").innerHTML = "Error:<br />" + data.Error;
            }
        });
    }

    serviceUrl = "http://do.convertapi.com/Web2Image/json?";
    Convert();

    serviceUrl = "http://do.convertapi.com/Web2Image/json?OutputFileName=TAPA_ALE&curl=http://www.webtoflyer.com/flyer/html/FLYER_TAPA_06-14-2017_1201pm.html&ApiKey=855890385";
});
</script>
</head>
<body>
            <img src="http://do.convertapi.com/Web2Image?OutputFileName=TAPA_ALE&curl=http://www.webtoflyer.com/flyer/html/FLYER_TAPA_06-14-2017_1201pm.html?&PageWidth=796&PageHeight=1123&ApiKey=855890385">
</body>
</html>
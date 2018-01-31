<!DOCTYPE HTML>
<html>
<head>
<title>WEB TO FLYER</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="robots" content="noindex,nofollow">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        
        
    });
</script>
</head> 
<body id="login" class="interna">
    <div class="forms col-lg-offset-4 col-lg-4 col-md-offset-2 col-md-8 col-xs-12">
        <div class="header col-xs-12 text-center">
            <a href="index.php" title="Ii a Login"><img src="images/logo_marquez.png" class="img-responsive img-centered" alt=""></a>
        </div>
        <?php include("includes/conexion.php"); ?>
        <?php 
              if (isset($_SESSION['ESTADO'])) {
                  header("Location:home.php");
              }
            $id = $_POST['id'];
        ?>
        <h1 class="blancobold">Mir&aacute; este video de c&oacute;mo dise&ntilde;ar tu primer revista:</h1>     
    </div>
    
    <div class="forms col-lg-offset-3 col-lg-6 col-md-offset-1 col-md-10 col-xs-12 padding-top-0">
        <form class="form-horizontal col-xs-12" action="home.php" method="post" autocomplete="off">
            <section class="wrap-video text-center row">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/s_p8AIu7o3U?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
            </section>
             <div class="form-group text-center">
                <button class="btn btn-default" type="submit" name="btn_login" id="btn_login">Finalizar</button>
             </div>
        </form>         
    </div>


<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'db98655c3e6c648f144d70d2da5a717d56e8e076';
window.smartsupp||(function(d) {
	var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
	s=d.getElementsByTagName('script')[0];c=d.createElement('script');
	c.type='text/javascript';c.charset='utf-8';c.async=true;
	c.src='//www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
    
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
</body>
</html>
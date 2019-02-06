<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once 'vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once 'users/public/css/bootstrap.php'; ?>
    <link rel="stylesheet" href="/users/public/css/style.css">
    <script src="/users/public/js/script.js"></script>
    <title>ARAÇ KİRALAMA</title>
</head>
<body>
<?php 
    if(isset($_SESSION['ad']) && !empty($_SESSION['ad']))
        {
            echo " 
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-12 mt-5\">
                        <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
                            <a class=\"navbar-brand\" href=\"/\">Car Rental</a>
                            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarText\" aria-controls=\"navbarText\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                            <span class=\"navbar-toggler-icon\"></span>
                            </button>
                        <div class=\"collapse navbar-collapse\" id=\"navbarText\">
                            <ul class=\"navbar-nav mr-auto\">
                                
                               
                                
                            </ul>
                            <span class=\"navbar-text text-dark\">
                               Hoşgeldin <b class=\"text-success\"> $_SESSION[ad] </b>
                            </span>
                            &emsp;&emsp;
                            <span class=\"navbar-text text-dark\">
                                <a href=\"/cikisController\" class=\"text-success font-weight-bold\">[ ÇIKIŞ ]</a>
                            </span>
                        </div>
                        </nav>
                    </div>
                </div>
            </div>
            ";
            
        }else{
            echo "
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-12 mt-5\">
                        <nav class=\"navbar navbar-expand-lg navbar-primary bg-light\">
                            <a class=\"navbar-brand border-right border-primary\"  href=\"/\">Car Rental &nbsp;</a>
                            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNavAltMarkup\" aria-controls=\"navbarNavAltMarkup\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                                <span class=\"navbar-toggler-icon\"></span>
                            </button>
            
                            <div class=\"collapse navbar-collapse\" id=\"navbarNavAltMarkup\">
                                <div class=\"navbar-nav\">
                                    <a class=\"nav-item nav-link\" href=\"/kayitController/kayitOl\">Kayıt Ol</a>
                                    <a class=\"nav-item nav-link\" href=\"/girisController/girisPage\">Giriş Yap</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>";
        }
?>

<?php

    $uri=$_SERVER['REQUEST_URI'];
    switch($uri){
        case '/':
        header('location:/indexController/listele');
               
    }
    
    $reqData=url(htmlspecialchars($uri));
    $classname=@$reqData[0]; 

    $getClass=@$reqData[1];
    $findClassQuery=query($getClass);
    $classmethod=$findClassQuery[0];

    #urlden girilen get parametrelerini verir
    $query=@$findClassQuery[1];
    
    $classname='Controllers\\'.$classname;

    $controller = new $classname(); 

    $data=@call_user_func(array($controller, $classmethod));





    
    function url($uri){
        $exploded=explode('/',substr($uri,1));
        return $exploded;
    };
    function query($uri){
        $query=explode('?',$uri);
        return $query;
    };
   
?>

</body>
</html>
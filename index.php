<?php 
session_start();
ob_start();
?>
<?php
date_default_timezone_set('Europe/Istanbul');
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once 'vendor/autoload.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/" >
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
if (!isset($_GET['sayfa'])){
    $_GET['sayfa'] = '/';
}
if (!isset($_GET['sayfa'])){
    $_GET['sayfa'] = 'index';
}

Switch ($_GET['sayfa']){

    case '/':
        $data=array('indexController','listele');
    break;

    case 'profilim':
        $data=array('profilController','profilim');
    break;

    case 'araclar/araclar-detay':
        $data=array('indexController','DetayListele');
    break;

    case 'arac-kirala/kirala-form':
        $data=array('kiralaController','kiralaForm');
    break;


   
}
 

 $reqData=@$data;
 var_dump($reqData);
 $classname=@$reqData[0]; 
 $userController=['cikisController','girisController','indexController','kayitController','kiralaController','profilController','yorumController','sifreUnuttumController'];
 $adminController=['adminLoginController','adminIndexController','adminCikisController','aracEkleController','rezerveAraclarController','kiralananAraclarController','butunAraclarController','kiralanabilirAraclarController'];
 
    if( in_array($classname,$userController) && isset($_SESSION['ad']) && !empty($_SESSION['ad']))
        {
            echo " 
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-12 mt-5\">
                        <nav class=\"navbar navbar-expand-lg navbar-primary bg-light\">
                            <a class=\"navbar-brand border-right border-primary\" href=\"/\">Car Rental &nbsp;</a>
                            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarText\" aria-controls=\"navbarText\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                            <span class=\"navbar-toggler-icon\"></span>
                            </button>
                        <div class=\"collapse navbar-collapse\" id=\"navbarText\">
                            <ul class=\"navbar-nav mr-auto\">
                                
                               
                                
                            </ul>
                                <div class=\"btn-group\">
                                <button type=\"button\" class=\"btn btn-outline-info dropdown-toggle \" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                 <b class=\"\">". ucwords($_SESSION['ad']) ."</b>
                                </button>
                                <div class=\"dropdown-menu drop-menu\">
                                    <a class=\"dropdown-item\" href=\"/profilim\">Profilim</a>
                                    <div class=\"dropdown-divider\"></div>
                                    <a href=\"/cikisController/cikis\" class=\"text-danger text-center dropdown-item font-weight-bold\">[ ÇIKIŞ ]</a>
                                </div>
                                </div>
                        </div>
                        </nav>
                    </div>
                </div>
            </div>
            ";
            
        }elseif(in_array($classname,$adminController) && isset($_SESSION['yonetici_id']) ){
            echo " 
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-12 mt-5\">
                        <nav class=\"navbar navbar-expand-lg navbar-primary bg-light\">
                            <a class=\"navbar-brand border-right border-primary\" href=\"/adminIndexController/index\">Car Rental &nbsp;</a>
                            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarText\" aria-controls=\"navbarText\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                            <span class=\"navbar-toggler-icon\"></span>
                            </button>
                        <div class=\"collapse navbar-collapse\" id=\"navbarText\">
                            <ul class=\"navbar-nav mr-auto\">
                                <li class=\"nav-item \">
                                <a class=\"nav-link text-danger\" href=\"/kiralananAraclarController/kiralananAraclar\">Kiralanan Araçlar  <span class=\"sr-only\">(current)</span></a>
                                </li>     
                                <li class=\"nav-item \">
                                    <a class=\"nav-link text-danger\" href=\"/rezerveAraclarController/rezerveAraclar\">Rezerve Araçlar</a>
                                </li>    
                                <li class=\"nav-item \">
                                    <a class=\"nav-link text-danger\" href=\"/kiralanabilirAraclarController/listele\">Kiralanabilir Araçlar </a>
                                </li>  
                                <li class=\"nav-item \">
                                    <a class=\"nav-link text-danger\" href=\"/butunAraclarController/tumAraclar\">Bütün Araçlar</a>
                                </li>  
                                <li class=\"nav-item \">
                                    <a class=\"nav-link text-danger\" href=\"/aracEkleController/aracEkleForm\">Araç Ekle </a>
                                </li>
                               
                                
                            </ul>
                                <div class=\"btn-group\">
                                <button type=\"button\" class=\"btn btn-outline-info dropdown-toggle \" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                 <b class=\"\">". ucwords($_SESSION['yonetici_ad']) ."  </b>
                                </button>
                                <div class=\"dropdown-menu drop-menu\">
                                    <!--<a class=\"dropdown-item\" href=\"/profilController/profilim\">Profilim</a>
                                    <div class=\"dropdown-divider\"></div>-->
                                    <a href=\"/adminCikisController/cikis\" class=\"text-danger text-center dropdown-item font-weight-bold\">[ ÇIKIŞ ]</a>
                                </div>
                                </div>
                        </div>
                        </nav>
                    </div>
                </div>
            </div>
            ";

        }elseif(in_array($classname,$userController) && !isset($_SESSION['ad'])){
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
   
    $a;
    if(in_array($classname,$userController))
    {   
        $a='Controllers';  
    }elseif(in_array($classname,$adminController))
    {
        $a='AdminControllers';
    }


    $getClass=@$reqData[1];
    $findClassQuery=query($getClass);
    $classmethod=$findClassQuery[0];

    if(isset($a) && !empty($a)){
        
    }else{
        echo $a;
    }

    #urlden girilen get parametrelerini verir
    $query=@$findClassQuery[1];

    $classname=$a.'\\'.$classname;

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
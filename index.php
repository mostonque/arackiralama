<?php
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

    $data=call_user_func(array($controller, $classmethod));
    
    





    
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
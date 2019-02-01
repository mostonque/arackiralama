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
    function parcala($uri){
        $exploded=explode('/',substr($uri,1));
        return $exploded;
    };
    
    $reqData=parcala($uri);
    $classname=@$reqData[0]; 
    $classmethod=@$reqData[1];

    $classname='Controllers\\'.$classname;

    $controller = new $classname(); 

    $data=call_user_func(array($controller, "$classmethod"));
    
?>



    
</body>
</html>
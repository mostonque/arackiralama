<?php
$config=array(
$host='localhost',
$dbname="arackiralama",
$username='serhat',
$password='A4techviole.,'
);



function base_url($page="",$time=0){
    $baseUrl='http://localhost/app';
    if(isset($page)&&!empty($page))
    {
        header("Refresh:$time; url=$baseUrl/$page");
    }
   
}
?>
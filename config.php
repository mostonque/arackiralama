<?php
return $config=array(
$host='localhost',
$dbname="arackiralama",
$username='root',
$password=''
);



function base_url($page="",$time=0){
    $baseUrl='http://localhost/app';
    if(isset($page)&&!empty($page))
    {
        header("Refresh:$time; url=$baseUrl/$page");
    }
   
}
?>
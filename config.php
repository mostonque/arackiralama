<?php
return $config=array(
$username='root',
$password='',
$host='localhost',
$dbname="arac_kiralama"
);



function base_url($page="",$time=0){
    $baseUrl='http://localhost/app';
    if(isset($page)&&!empty($page))
    {
        header("Refresh:$time; url=$baseUrl/$page");
    }
   
}
?>
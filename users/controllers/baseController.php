<?php
namespace Controllers;

use Philo\Blade\Blade;

class baseController{
    
    private $views;
    public $cache;
    private $blade;

    function __construct(){
      
        $this->views = $_SERVER['DOCUMENT_ROOT'] . '/users/view';
        $this->cache = $_SERVER['DOCUMENT_ROOT']. '/users/cache';
        $this->blade = new Blade($this->views, $this->cache);
    }

    public function view($view,$degiskenAdi,$degisken)
    {
        echo $this->blade->view()->make($view)->with($degiskenAdi, $degisken)->render();
    }
}
?>
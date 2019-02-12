<?php
namespace AdminControllers;

use Philo\Blade\Blade;

class adminBaseController{
    
    private $views;
    public $cache;
    private $blade;

    function __construct(){
      
        $this->views = $_SERVER['DOCUMENT_ROOT'] . '/admins/views';
        $this->cache = $_SERVER['DOCUMENT_ROOT']. '/cache';
        $this->blade = new Blade($this->views, $this->cache);
    }

    public function view($view,$degiskenAdi=NULL,$degisken=NULL)
    {
        echo $this->blade->view()->make($view)->with($degiskenAdi, $degisken)->render();
    }
}
?>
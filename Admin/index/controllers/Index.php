<?php
class Index extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    function Index(){
        $this->display('index.php');
    }
}


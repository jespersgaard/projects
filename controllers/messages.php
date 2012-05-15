<?php
class Messages extends Controller{
    function index(){
        $this->rows = $this->Messages->find('all');
    }
}

?>

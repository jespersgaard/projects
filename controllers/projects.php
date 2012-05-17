<?php

require_once '../utils.php';

class Projects extends Controller {
    function index(){
        $this->rows = $this->Projects->find('all');
        for ($i = 0; $i < sizeof($this->rows); $i++) {
            $this->rows[$i]['short'] = shortenString($this->rows[$i]['description'], 50);
        }
    }
    
    function view($id){
        $this->rows = $this->Projects->find('id',$id);
    }
    
    function add(){        
        if (isset($this->data)){
            $this->success = $this->Projects->add($this->data);
        }
    }

    public function pre() {
        
    }
}
?>

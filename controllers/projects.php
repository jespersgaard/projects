<?php
class Projects extends Controller {
    function index(){
        $this->rows = $this->Projects->find('all');
    }
    
    function view($id){
        $this->rows = $this->Projects->find('id',$id);
    }
    
    function add(){        
        if (isset($this->data)){
            $this->success = $this->Projects->add($this->data);
        }
    }
}
?>

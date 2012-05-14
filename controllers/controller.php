<?php
/**
 *   Conntroller parent-class
 */
abstract class Controller {
    protected $params = null;
    protected $data = null;


    /**
     * Sets the parameters for function call
     * @param array $params 
     */
    public function setParams(array $params){
        $this->params = $params;
    }
    
    /**
     * Sets the Controller data
     * @param array $data 
     */
    public function setData(array $data){
        $this->data = $data;
    }
    
    /**
     * renders the funtion-view
     * @param type $method 
     */
    public function render($method = 'index'){
        $filename = '../views/'.strtolower(get_class($this)).'/'.$method.'.html';
        if (file_exists($filename)){
            require_once $filename;
        }
        else{
            require_once '../views/templateNotFound.html';
        }
    }
}

?>

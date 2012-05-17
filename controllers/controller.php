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
            echo '<div id="content">';
            require_once $filename;
            echo '</div>';
        }
//        else{
//            require_once '../views/templateNotFound.html';
//        };
    }
    
    public static function redirect($page){
        echo '<div id="redirect">'.$page.'</div>';
        //exit(1);
    }
    
    public static function alert($text, $type){
        echo '<div class="alert alert-'.$type.' hide fade in"><button class="close" data-dismiss="alert">×</button>'.$text.'</div>';
    }

    abstract public function pre();
}

?>

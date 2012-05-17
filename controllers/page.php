<?php
require_once '../settings.php';
require_once 'controller.php';
require_once '../models/model.php';

ob_start();

$data = $_POST;
$page = $data['page'];
$url = explode("/", $page);
$defaultClass = 'Dashboard';
$defaultFile = "dashboard.php";
$classFile = $url[0].'.php';
$class = ucwords($url[0]);
$method = $url[1];
$params = array_slice($url, 2);
unset ($data['page']);


echo '<div id="data">';

if ($class == ''){
    Controller::redirect($mainPage);
}
if ($method == ''){
        $method = 'index';
}
if (file_exists($classFile)){
    
    
    $modelFile = '../models/'.strtolower($class).'Model.php';
    $model = $class.'Model';
    
    require_once $classFile;
    $object = new $class;
    $object->pre();
    
    if (file_exists($modelFile)){
        require_once $modelFile;
        $object->$class = new $model;
        
    }
//    else {
//        require_once '../views/notFound.html';
//    }
    
    if (!empty ($data)){
            $object->setData($data);        
    }

    if (method_exists($class, $method)){
        include_once '../views/breadcrumb.html';

        $object->setParams($params);
        if (count($params) > 0){
            $object->$method($params[0]);
        }
        else {
            $object->$method();
        }
        $object->render($method);
    }
    else {
        echo '<div id="content">';
        require_once '../views/notFound.html';
        echo '</div>';
    }

}
else {
    echo '<div id="content">';
    require_once '../views/notFound.html';
    echo '</div>';
}

echo '</div>';
ob_end_flush();
<?php
require_once '../settings.php';
require_once 'controller.php';
require_once '../models/model.php';

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


if ($class == ''){
    $class = $defaultClass;
    $classFile = $defaultFile;
}
if ($method == ''){
        $method = 'index';
}
if (file_exists($classFile)){
    
    $modelFile = '../models/'.strtolower($class).'Model.php';
    $model = $class.'Model';
    if (file_exists($modelFile)){
        require_once $classFile;
        require_once $modelFile;
        $object = new $class;
        $object->$class = new $model;
        if (!empty ($data)){
            $object->setData($data);        
        }

        if (method_exists($class, $method)){
            include '../views/breadcrumb.html';

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
            require_once '../views/notFound.html';
        }
    }
    else {
        require_once '../views/notFound.html';
    }

}
else {
    require_once '../views/notFound.html';
}
<?php
require_once 'vendor/autoload.php';

//ENCAMINHADOR, RECEBE E REDIRECIONA TODAS AS REQUISIÇÕES

$controller = new App\Mvc\Controller();

if(isset($_GET['action'])){
    $action = $_GET['action'];
    $params = isset($_GET['params'])?$_GET['params']:'';
    $label = isset($_GET['label'])?$_GET['label']:'';
    switch ($action){
        case 'index':$controller->index();break;
        case 'Bairro':$controller->bairro();break;
        case 'Rota':$controller->rota();break;
        case 'viewCreate':$controller->viewCreate($params);break;
        case 'createNode':$controller->createNode($label,$_POST['Node']);break;
        case 'createRel':$controller->createRel($_POST['node1'],$_POST['node2'],$_POST['Propriedades']);break;
        case 'Busca':$controller->viewBusca();break;
        case 'melhorCaminho':$controller->melhorCaminho($_POST['de'],$_POST['para']);break;
    }
}else{
    $controller->index();
}

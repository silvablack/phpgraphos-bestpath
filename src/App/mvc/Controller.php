<?php
namespace App\mvc;

/*NÃO FOI APLICADO NENHUM TRATAMENTO DE ERRO DESCENTE ATÉ ESSA VERSÃO DO PROJETO*/

class Controller{

    public function index(){
        $view = new View('index');
    }

    public function neighborhood(){
        $model = new Model();
        $view = new View('neighborhood.view',['model'=>$model->getAllNodes('Neighborhood')]);
    }

    public function viewCreate($type){
        //VERIFICA QUAL O TIPO DE REQUISICAO, SE É BAIRRO OU ROTA PARA ENCAMINHAR A VIEW CORRESPONDENTE
            if($type == 'Neighborhood'){
                $view = new View('neighborhood.create');
            }else if($type == 'ROUTE'){
                $model = new Model();
                $view = new View('route.create',['model'=>$model->getAllNodes('Neighborhood')]);
            }
    }

    public function createNode($label,$params){
        //CONTROLADOR PARA TRATAR OS DADOS E CHAMAR A FUNCAO CREATE NODE NO MODEL
        $model = new Model();
        $model->newNode($label,$params);
        $view = new View('neighborhood.view',['model'=>$model->getAllNodes('Neighborhood')]);
    }
    public function createRel($node1,$node2,$params){
        //CONTROLADOR PARA TRATAR OS DADOS E CHAMAR A FUNCAO CREATE RELATIONALSHIP NO MODEL
        $model = new Model();
        $model->newRelationalship($node1,$node2,$params);
        $model->newRelationalship($node2,$node1,$params);
        $view = new View('route.view',['model'=>$model->getAllRelationalships()]);
    }

    public function route(){
        //VISUALIZAR AS ROTAS
        $model = new Model();
        $view = new View('route.view',['model'=>$model->getAllRelationalships()]);
    }
    public function viewSearch(){
        $model = new Model();
        $view = new View('search.view',['model'=>$model->getAllNodes('Neighborhood')]);
    }

    public function bestPath($from,$to){
        //DIFERENCIAR ORIGENS
        if($from <> $to){
        $model = new Model();
        $view = new View('bestpath.view',['model'=>$model->bestPath($from,$to),'from'=>$from,'to'=>$to]);
        }else{
            Exception('BAD REQUEST',404);
        }
    }

}

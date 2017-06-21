<?php
namespace App\mvc;
use Everyman\Neo4j\Client;
use Everyman\Neo4j\Transport;
use Everyman\Neo4j\Batch;
use Everyman\Neo4j\Cypher;

class Model{

    public function conn(){
        //CONEXÃO COM O BANCO DE DADOS
        $client = new Client('localhost', 7474);
        $client->getTransport()
            ->setAuth('user', 'password');
        return $client;
    }

    public function newNode($label,$nodeProperty = []){
        $client = $this->conn();
        //CRIA UMA LABEL
        $l = $client->makeLabel($label);
        //CRIA UM NÓ
        $node = $client->makeNode();
        foreach($nodeProperty as $key => $value){
            $node->setProperty($key,$value);
        }
        //SALVA O NÓ
        $node->save();
        //ATRIBUI O LABEL AO NÓ
        $node->addLabels(array($l));
        return $node;
    }
    public function newRelationalship($node1,$node2,$relProperty = []){
        $client = $this->conn();
        $n1 = $client->getNode($node1);
        $n2 = $client->getNode($node2);
        //CRIA UM RELACIONAMENTO
        $distancia = $client->makeRelationship();
        //PROPRIEDADES DO RELACIONAMENTO
        $distancia->setStartNode($n1)
            ->setEndNode($n2)
            ->setType('DISTANCE');
        foreach($relProperty as $key => $value){
            $distancia->setProperty($key, $value);
        }

        $distancia->save();
        return $distancia;
    }

    public function getAllNodes($label){
        $client = $this->conn();
        //CONSULTA TODOS OS BAIRROS (NÓS)
        $queryString =
            "MATCH (x:".$label.")".
            "RETURN x";
        $query = new Cypher\Query($client, $queryString);
        return $query->getResultSet();
    }

    public function getAllRelationalships(){
        $client = $this->conn();
        //CONSULTA TODOS OS RELACIONAMENTOS
        $queryString =
            "MATCH (from:Neighborhood)-[r:DISTANCE]->(to:Neighborhood)".
            "RETURN from,r,to";
        $query = new Cypher\Query($client, $queryString);
        return $query->getResultSet();
    }

    public function bestPath($node1,$node2){
        $client = $this->conn();
        $node1 = (int)$node1; // BAIRRO 1 PARA CONSULTA
        $node2 = (int)$node2; // BAIRRO 2 PARA CONSULTA
        $queryString = "START de = node({$node1}), para = node ({$node2})".
            "MATCH  (from:Neighborhood), (to:Neighborhood), paths = (from)-[r:DISTANCE*]->(to) ".
            "RETURN paths AS bestPath, reduce(km = 0, path in relationships(paths) | km + TOINT(path.km)) AS totalKm".
            " ORDER BY totalKm ASC LIMIT 3"; // CYPHER QUERY PARA BUSCAR O MELHOR CAMINHO LEVANDO EM CONSIDEREÇÃO A DISTÂNCIA
        $query = new Cypher\Query($client, $queryString);
        //RETORNA O DADOS
        return $query->getResultSet();
    }
}

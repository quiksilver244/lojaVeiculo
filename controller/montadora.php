<?php
require_once 'model/Montadora.php';
require_once 'view/montadora.php';

array_shift($url);

function get($consulta, $valor=''){
    $montadora = new Montadora();
    $viewMontadora = new ViewMontadora();
    if($consulta == "id"){
        $montadora = $montadora->consultarPorId($valor);
        $viewMontadora->exibirMontadora($montadora);        
    }
    elseif($consulta == "nome"){
        $montadoras = $montadora->consultar($valor);
        $viewMontadora->exibirMontadoras($montadoras);
    }
    else{
        $montadoras = $montadora->consultar();
        $viewMontadora->exibirMontadoras($montadoras);
    }
} 

function post($dados_montadora){
    $montadora = new Montadora();
    $viewMontadora = new ViewMontadora();
    $montadora->nome             = $dados_montadora->nome;
    $montadora->logotipo         = $dados_montadora->logotipo;
   
    $viewMontadora->exibirMontadora($montadora->cadastrar());
}

switch($method){    
    case "GET":get(@$url[0],@$url[1]);
    break;
    case "POST":post($dadosRecebidos);
    break;
    case "PUT":{
        echo json_encode(["method"=>"PUT"]);
    }
    break;
    case "DELETE":{
        echo json_encode(["method"=>"DELETE"]);
    }
    break;
    default:{
        echo json_encode(["method"=>"ERRO"]);
    }
    break;
}
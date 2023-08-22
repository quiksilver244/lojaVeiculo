<?php
require_once 'model/Veiculo.php';
require_once 'view/Veiculo.php';

# Removendo 'veiculo' da array $url;
array_shift($url);

function get($consulta, $valor=''){
    $veiculo = new Veiculo();
    $viewVeiculo = new ViewVeiculo();
    if($consulta == "id"){
        $veiculo = $veiculo->consultarPorId($valor);
        $viewVeiculo->exibirVeiculo($veiculo);        
    }
    elseif($consulta == "modelo"){
        $veiculos = $veiculo->consultar($valor);
        $viewVeiculo->exibirVeiculos($veiculos);
    }
    else{
        $veiculos = $veiculo->consultar();
        $viewVeiculo->exibirVeiculos($veiculos);
    }
} 

function post($dados_veiculo){
    $veiculo = new Veiculo();
    $viewVeiculo = new ViewVeiculo();
    $veiculo->modelo            = $dados_veiculo->modelo;
    $veiculo->ano_fabricacao    = $dados_veiculo->ano_fabricacao;
    $veiculo->ano_modelo        = $dados_veiculo->ano_modelo;
    $veiculo->cor               = $dados_veiculo->cor;
    $veiculo->num_portas        = $dados_veiculo->num_portas;
    $veiculo->foto              = $dados_veiculo->foto;
    $veiculo->categoria_id      = $dados_veiculo->categoria_id;
    $veiculo->montadora_id      = $dados_veiculo->montadora_id;
    $veiculo->tipo_cambio       = $dados_veiculo->tipo_cambio;
    $veiculo->tipo_direcao      = $dados_veiculo->tipo_direcao;    
    $viewVeiculo->exibirVeiculo($veiculo->cadastrar());
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
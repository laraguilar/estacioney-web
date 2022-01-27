<?php

function get_endereco($cep){

    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";

    $xml = simplexml_load_file($url);
    return $xml;
}
$endereco = (get_endereco(29161700));

echo "Rua: $endereco -> logradouro";
echo "Bairro: $endereco -> bairro";
echo "Cidade: $endereco -> localidade";
echo "Estado: $endereco -> uf";
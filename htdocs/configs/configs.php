<?php
function dadosSGDB(){
    $DADOS['HOST']="link ou ip do servidor"; #ex.: 192.168.0.1 ou service.mysql.provedor.com
    $DADOS['DBNAME']="nome da base de dados"; 
    $DADOS['ZE_MANE']="usuario da base de dados"; 
    $DADOS['XFILEX']="senha da base de dados";
    $DADOS['PORT']="porta do servidor";

    return $DADOS;
}
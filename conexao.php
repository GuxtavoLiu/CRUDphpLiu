<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//VERIFICA SE O POST acao EXISTE
if (isset($_POST["acao"])) {
//verifica qual a acao do post acao
    if ($_POST["acao"] == "inserir") {
        inserirPessoa();
    }if ($_POST["acao"] == "alterar") {
        alterarPessoa();
    }
    if ($_POST["acao"] == "excluir") {
        excluirPessoa();
    }
}

function abrirBanco() {
    $conexao = new mysqli("localhost", "root", "mysql", "phpcrud");
    return $conexao;
}

function inserirPessoa() {
    $banco = abrirBanco();

    $sql = "INSERT INTO pessoa(nome, nascimento, endereco, telefone)"
            . " VALUES ('{$_POST["nome"]}','{$_POST["nascimento"]}','{$_POST["endereco"]}','{$_POST["telefone"]}')";

    $banco->query($sql);
    $banco->close();
    voltarIndex();
}

function alterarPessoa() {
    $banco = abrirBanco();

    $sql = "UPDATE pessoa SET"
            . " nome = '{$_POST["nome"]}'"
            . ", nascimento = '{$_POST["nascimento"]}'"
            . ", endereco = '{$_POST["endereco"]}'"
            . ", telefone = '{$_POST["telefone"]}'"
            . " WHERE id = '{$_POST["id"]}'";

    $banco->query($sql);
    $banco->close();
    voltarIndex();
}

function excluirPessoa() {
    $banco = abrirBanco();

    $sql = "DELETE FROM pessoa WHERE id ='{$_POST["id"]}' ";

    $banco->query($sql);
    $banco->close();
    voltarIndex();
}

function selectAllPessoa() {
    $banco = abrirBanco();
    $sql = "SELECT * FROM pessoa ORDER BY nome";
    $resultado = $banco->query($sql);
    //mysql_fetch_array separa por linha todas as informações que recebeu do banco
    while ($row = mysqli_fetch_array($resultado)) {
        $grupo[] = $row;
    }
    return $grupo;
}

function selectId($id) {
    $banco = abrirBanco();
    $sql = "SELECT * FROM pessoa WHERE id =" . $id;
    $resultado = $banco->query($sql);
    //mysql_fetch_array separa por linha todas as informações que recebeu do banco
    $pessoa = mysqli_fetch_assoc($resultado);
    return $pessoa;
}

function voltarIndex() {
    header("Location:index.php");
}

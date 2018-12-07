<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ("conexao.php");
$pessoa = selectId($_POST["id"]); // é o id que recebe la embaixo pelo methodo post
?>

<html>
    <head>
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/jquery.mask.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#tel").mask("(00)00000-0000");
            })
        </script>
        <meta charset="UTF-8">
    </head>
    <body>
        <!--COMEÇO NAVBAR-->

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">AgenSys</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">


                    <a href="inserir.php" >
                        <button type="button" class="btn btn-outline-primary" >Cadastrar Contato</button>
                    </a>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Sua pesquisa..." aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>
        <!--FIM NAVBAR-->

        <div class="alert alert-primary text-center" role="alert">
            <h1 class=""> Agenda de Contatos</h1>
        </div>

        <form name="dadosPessoa" action="conexao.php" method="POST">
            <table border="1" class="table table-dark container">

                <tbody>
                    <tr>
                        <td>Nome:</td>
                        <td><div class="col-5"><input class="form-control" type="text" name="nome" value="<?= $pessoa["nome"] ?>" size="20"  /></div></td>
                    </tr>
                    <tr>
                        <td>Nascimento:</td>
                        <td><div class="col-5"><input class="form-control" type="date" name="nascimento" value="<?= $pessoa["nascimento"] ?>" /></div></td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td><div class="col-5"><input id="tel" class="form-control" type="text" name="telefone" value="<?= $pessoa["telefone"] ?>" size="20" /></div></td>
                    </tr>
                    <tr>
                        <td>Endereço:</td>
                        <td><div class="col-5"><input class="form-control" type="text" name="endereco" value="<?= $pessoa["endereco"] ?>" size="20" /></div></td>
                    </tr>
                    <tr>
                        <td><div class="col-5"><input class="form-control" type="hidden" name="acao" value="alterar" />
                                <div class="col-5"><input class="form-control" type="hidden" name="id" value="<?= $pessoa["id"] ?>" /></div>
                        </td> <!-- ALTERAR PARA ALTERAR -->
                        <td><div class="col-5"><input class="btn btn-lg btn-success" type="submit" value="Alterar" name="Enviar" /></td>
                    </tr>
                </tbody>
            </table>

        </form>

    </body>
</html>
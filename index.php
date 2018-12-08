<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
include("conexao.php");
$grupo = selectAllPessoa();
?>

<html>
    <head>
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




        <meta charset="UTF-8">
        <title></title>
        <script src="https://use.fontawesome.com/c0dc2a271d.js"></script>
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




        <br/>

        <!--TABELA PESSOAS-->
        <div class="container-fluid">
            <table border="1" class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Endereco</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (!empty($grupo)) {
                        ?>


                        <?php foreach ($grupo as $pessoa) { ?>


                            <tr>
                                <td><?= $pessoa["nome"] ?></td>
                                <td><?= formatarData($pessoa["nascimento"]) ?></td>
                                <!--trocar pela linha debaixo-->
                                <!--formatarData($pessoa["nascimento"]) -->
                                <td><?= $pessoa["telefone"] ?></td>
                                <td><?= $pessoa["endereco"] ?></td>
                                <td>
                                    <form name="alterar" action="alterar.php" method="POST">
                                        <input type="hidden" name="id" value=<?= $pessoa["id"] ?> />
                                        <div class="text-center">
                                            <button type="submit" value="Editar" name="editar" class="btn btn-warning text-center " >Editar <i class="fa fa-edit" aria-hidden="true"></i> </button>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <form name="excluir" action="conexao.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $pessoa["id"] ?>" />
                                        <input type="hidden" name="acao" value="excluir" />
                                        <!--botao excluir--> 
                                        <div class="text-center">
                                            <button  type="submit" value="Excluir " name="excluir" class="btn btn-danger text-center">Excluir <i class="fa fa-trash" aria-hidden="true"></i></Button>
                                        </div>

                                    </form>

                                </td>
                            </tr>

                        <?php }
                        ?>
                    <?php } ?>


                </tbody>
            </table>
        </div>



        <?php

// put your code 
        function formatarData($data) {
            $array = explode("-", $data);
            // $data = 2017-04-14
            // $array 
            $novaData = $array[2] . "/" . $array["1"] . "/" . $array[0];
            return $novaData;
        }
        ?>
    </body>
</html>
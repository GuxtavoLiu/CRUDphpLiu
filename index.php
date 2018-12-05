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
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Agenda Pessoa</h1>
        <a href="inserir.php">Add Pessoa</a>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>Telefone</th>
                    <th>Endereco</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($grupo as $pessoa) { ?>


                    <tr>
                        <td><?= $pessoa["nome"] ?></td>
                        <td><?= $pessoa["nascimento"] ?></td>
                        <!--trocar pela linha debaixo-->
                        <!--formatarData($pessoa["nascimento"]) -->
                        <td><?= $pessoa["telefone"] ?></td>
                        <td><?= $pessoa["endereco"] ?></td>
                        <td>Editar</td>
                        <td>Excluir</td>
                    </tr>

                <?php }
                ?>

            </tbody>
        </table>




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

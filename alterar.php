<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ("conexao.php");
$pessoa = selectId($_POST["id"]); // é o id que recebe la embaixo pelo methodo post
?>


<meta charset="UTF-8">
<form name="dadosPessoa" action="conexao.php" method="POST">
    <table border="1">

        <tbody>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="<?= $pessoa["nome"] ?>" size="20"  /></td>
            </tr>
            <tr>
                <td>Nascimento:</td>
                <td><input type="date" name="nascimento" value="<?= $pessoa["nascimento"] ?>" /></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="text" name="telefone" value="<?= $pessoa["telefone"] ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Endereço:</td>
                <td><input type="text" name="endereco" value="<?= $pessoa["endereco"] ?>" size="20" /></td>
            </tr>
            <tr>
                <td><input type="hidden" name="acao" value="alterar" />
                    <input type="hidden" name="id" value="<?= $pessoa["id"] ?>" />
                </td> <!-- ALTERAR PARA ALTERAR -->
                <td><input type="submit" value="Enviar" name="Enviar" /></td>
            </tr>
        </tbody>
    </table>

</form>


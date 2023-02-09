<?php
#ABRE INSTRUÇÃO COM O BANCO DE DADOS 
include("conectadb.php");

#PASSA A INSTRUÇÃO PARA O BANCO DE DADOS 
#FUNÇÃO DA INSTRUÇÃO: LISTAR TODOS OS CONTEÚDOS DA TABELA USUARIOS
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($link, $sql);
#
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA USUARIOS</title>
    <link rel="stylesheet" href="estilo.css">

</head>

<body>
    <a href="homesistema.html"><input type="button" id="menuhome" value="HOME SISTEMA"></a>
    <div class="container">
        <table border="1">
            <tr>
                <th>NOME</th>
                <th>ALTERAR DADOS</th>
                <th>EXCLUIR USUARIOS</th>
            </tr>
            <?php
            while ($tbl = mysqli_fetch_array($resultado)) {
                ?>
                <tr>
                    <td><?= $tbl[1] ?></td> <!--- TRAZ SOMENTE A COLUNA NOME PARA APRESENTAR NA TABELA--->
                    <!--- AO CLICAR NO BOTÃO ELE JÁ TRARÁ O ID DO USUARIO PARA A PAGINA DO ALTERAR-->
                    <td><a href="alterarusuario.php?id=<?= $tbl[0]?>"><input type="button" value="ALTERAR"></td>
                    <!-- AO CLICAR NO BOTÃO ELE JÁ TRARÁ O ID DO USUÁRIO PARA A PÁGINA DO EXCLUIR -->
                    <!--<td><a href="excluirusuario.php?id=<//?= $tbl[0]?>"><input type="button" value="EXCLUIR"></td>-->
                    <td><?=$tbl[3]?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
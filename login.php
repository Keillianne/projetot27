<?php
//
#
#CAPTUTA VARIÁVEIS UTILIZANDO O MÉTODO POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome']; #CAPTURA VARIÁVEL QUE ESTÁ NO NAME="NOME" HTML
    $password = $_POST['password']; #CAPTURA VARIÁVEL QUE ESTÁ NO NAME="PASSWORD" HTML
    include("conectadb.php"); #INCLUDE CHAMA A CONEXÃO COM A CONEXÃO COM O BANCO DE DADOS NO SCRIPT CONECTADB.PHP

    #CONSULTA SQL PARA VERIFICAR O USUARIO CADASTRADO
    #INSTRUÇÃO DE COMUNICAÇÃO COM O BANCO DE DADOS 
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome='nome' AND usu_senha= 'password'";
    $resultado = mysqli_query($link, $sql);

    #COLETA O VALOR DA CONSULTA E CRIA UM ARRAY PARA ARMAZENAR
    while ($tbl = mysqli_fetch_array($resultado)) {
        $cont = $tbl[0]; #ARMAZENA O  VALOR DA COLUNA NO CASO A [0]
    }
    #VERIFICA SE O RESULTADO DO CONT É 0 OU 1
    #SE 0 O USUÁRIO OU SENHA ESTÃO INCORRETOS
    if ($cont == 1) {
        header("Location:homesistema.html"); #SE O USUÁRIO E SENHA CORRETOS, VÁ PARA HOME SISTEMA
    } else { #SE INCORRETO APRESENTA ERRO
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN USUARIOS</title>
    <link rel="stylesheet" href="./stylecadastra.css">
</head>

<body>
    <div class="container">
        <!-- script para mostrar senha-->
        <script>
            function mostrarsenha() {
                var tipo = document.getElementById("senha");
                if (tipo.type == "password") {
                    tipo.type = "text";
                }
                else {
                    tipo.type = "password";
                }
            }
        </script>
        <!--fim do script para mostrar senha--->

        <form action="login.php" method="POST">
            <h1>LOGIN DE USUARIO</H1>
            <input type="text" name="nome" id="nome" placeholder="Nome">
            <p></p>
            <input type="password" id="senha" name="password" placeholder="Senha">
            <!-- ABAIXO ESTÁ A FUNÇÃO ONCLICK CHAMADO O SCRIPT DE JAVASCRIPT IL VVVVVVVVV  -->
            <img id="olinho" onclick="mostrarsenha()" src="assets/eye.svg">
            <p></p>
            <input type="submit" name="login" value="LOGIN">
        </form>

    </div>
</body>

</html>
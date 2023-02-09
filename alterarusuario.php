<?php
##conexão do banco
include('conectadb.php');

#coleta de variaveis dos campos de texto HTML
if ($_SERVER('REQUEST_METHOD') == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $ativo = $_POST['ativo'];
    #INSTRUÇÃO SQL PARA ATUALIZAÇÃO DE USUARIO E SENHA 
    $sql = "UPDATE usuarios SET usu_senha='$senha', usu_nome='$nome' WHERE usu_id = $id";
    mysqli_query($link, $sql);
    header("Location:listauruario.php");
    echo "<script>alert('USUARIO ALTERADO COM SUCESSO!');</script>";
    exit();
}

#Coletando ID via link (URL) exemplo alterausuario.php?id
$id = $_GET['id'];
$sql = "SELECT*FROM usuarios WHERE usu_id=$id";
$resultado = mysqli_query($link, $sql);
while ($tbl = mysqli_fetch_array($resultado)) {
    $nome = $tbl[1];
    $senha = $tbl[2];
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALTERAR USUARIO</title>
</head>

<body>
    <div>
        <form action="alterarusuario.php" method="post">
            <input type="hidden" value="<?= $id ?>" name="id"> <!-- COLETA ID AO CARREGAR A PAGINA DE FORMA OCULTA -->
            <label>NOME</label>
            <input type="text" name="nome" id="nome" value="<?= $nome ?>"><!-- COLETA O OME DO USUARIO E PREENCHE A TXTBOX-->
            <label>SENHA</label>
            <input type="password" name="senha" value="<?= $senha ?>"><!-- COLETA A SENHA DO USUARIO E PREENCHE A TXTBOX-->
            <br></br>
            <label>Status:<?=$check=($ativo=='s')?"ATIVO":"INATIVO";?></label>
            <br></br>
            <label>DESATIVAR</label>
            <input type="radio" name="ativo" value="s">ATIVAR<br>
            <input type="radio" name="ativo" value="n">DESATIVAR<br>
            <input type="submit" value="SALVAR">

        </form>
    </div>
</body>

</html>
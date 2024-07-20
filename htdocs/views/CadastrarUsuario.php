<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
    <script type="text/javascript" src="../public/javascript/script.js"></script>
</head>
<?php
    require_once '../models/UsuarioModel.php';

    session_start();
    
    if(['esta_logado']!==true || $_SESSION['id_tipo_usuario']!==1){
        header('Location:Login.php');
        exit();

    }
?>
<body>
    <header>
        <?php
        require_once '../public/MenuAdmin.html'; ?>

        <h1>Cadastrar Usuario</h1>
    </header>
    <main>
        <form action="../routers/UsuarioRouter.php" method="post"onsubmit="return validarCamposCadastrarUsuario(event);">
        <br>
        <select name="id_tipo_usuario" id="id_tipo_usuario">
            <option value="0">Selecione</option>
            <?php foreach($usuarios as $usuario):?>
                <option value="<?=$usuario->id_tipo_usuario; ?>"><?=$usuario->nome; ?></option>
       <?php endforeach; ?>
       </select>
       <br>
       <label for="nome">Nome</label><br>
            <input type="text" id="nome" name="nome" required>
            <br>
            <label for="email">Email</label>
            <br>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="senha">Senha</label
            ><br>
            <input type="password" id="senha" name="senha" required>
            <br>
            <br>
            <input type="submit" value="Cadastrar">
        </form>
     </main>
</body>
</html>
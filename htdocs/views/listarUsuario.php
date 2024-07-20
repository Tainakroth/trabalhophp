<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuario</title>
</head>
<?php 
require_once '../models/UsuarioModel.php';

session_start();

if($_SESSION['esta_logado']!==true || $_SESSION['id_tipo_usuario'] !=1){
    header('Location:Login.php');
    exit();
}

$UsuarioModel = new UsuarioModel();

$usuarios = $UsuarioModel->buscarUsuarios();
?>
<header>
    <?php require_once '../public/html/menuAdmin.html'; ?>
    <h1>Listar Usuario</h1>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $usuario) :?>
                <tr>
                <td><?= $usuario->nome; ?></td>
                <td>
                <a href="editarTipoUsuario.php?idUsuario=<?= $usuario->idTipoUsuario; ?>">Editar</a>
                <form action="../routers/UsuarioRouter.php" method="post">
                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?=$usuario->idTipoUsuario; ?>">
                    <input type="hidden" name="rota" id="rota" value="excluir">
                    <input type="submit" value="Excluir">
                </form>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</header>
<body>
</body>
</html>
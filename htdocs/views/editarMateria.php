<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia</title>
</head>
<?php
    require_once '../models/MateriaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }
    
    $MateriaModel = new MateriaModel();

    $idMateria = intval($_GET['idMateria']);

    $Materias = $MateriaModel ->buscarMaterias()

    
    
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar Materia</h1>
    </header>
    <main>
    <form action="../routers/MateriaRouter.php" method="post" onsubmit="return validarCamposCadastrarMateria(event);">
            <label for="idMateria">Materia</label>
            <br>
            <select name="idMateria" id="idMateria">
                <option value="0">Selecione</option>
                <?php foreach ($Materias as $Materia) :?>
                    <?php if ($Materia->idMateria == $Materia->idMateria) :?>
                        <option value="<?= $Materia->idMateria; ?>" selected><?= $Materia->descricao; ?></option>
                    <?php else :?>
                        <option value="<?= $Materia->idMateria; ?>"><?= $Materia->descricao; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="descricao">Descricao Materia</label>
            <input type="text" name="descricao" id="descricao" value="<?= $Materia->descricao; ?>" required>
            <br>
            <input type="hidden" name="idMateria" id="idMateria" value="<?= $idMateria; ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>
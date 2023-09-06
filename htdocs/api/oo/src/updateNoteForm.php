<?php require './header.php' ?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de nota</title>
</head>
<body>
    <form method="POST" action="crud/updateNote/index.php">
        <header>
            <h1>Atualize sua nota:</h1>
        </header>
        <label>
            Título
        </label>
        <input type="text" name="title" placeholder="Título da anotação"/>
        <label>
            Descrição
        </label>
        <input type="text" name="body" placeholder="Texto da anotação"/>
        <input type="submit" value="Enviar" />
    </form>
</body>
</html>
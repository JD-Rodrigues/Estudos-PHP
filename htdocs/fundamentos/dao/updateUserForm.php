<?php
    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    require('header.html');

    if(filter_input(INPUT_GET,'id')) {
        $id = filter_input(INPUT_GET,'id');

        $userToCheck = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $userToCheck->bindValue(':id', $id);
        $userToCheck->execute();

        if($userToCheck->rowCount() === 1) {
            $user = $userToCheck->fetch(PDO::FETCH_ASSOC);
        }
        
    }
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update form</title>
</head>
<body>
    <Header>
        <h1>Atualizar usuário</h1>
    </Header>
    <form method="POST" action="updateUser.php?id=<?=$id?>">
        <label>E-mail</label>
        <input type="email" name="email" value="<?= $user['email']?>" />
        <label>Senha</label>
        <input type="password" name="password"/>
        <input type="submit" value="Salvar"/>
    </form>
</body>
</html>
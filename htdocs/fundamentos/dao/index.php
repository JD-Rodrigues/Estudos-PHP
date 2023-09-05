<?php
    
    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    require 'header.html';   
    require 'dao/UserDaoMySQL.php';
    
    $userDaoMSQL = new UserDaoMySQL($pdo);
    $users = $userDaoMSQL->findAll();
    
?>
<h1 style="text-align: center">Usuários</h1>
<table border='1' width='50%' style="margin: auto;">
    <tr>
        <th>EMAIL</th>
        <th>SENHA</th>
    </tr>

    <?php foreach($users as $user): ?>
        <tr>
            <td><?=$user->getEmail()?></td>
            <td><?=$user->getPassword()?></td>
            <td><a href="updateUserForm.php?id=<?=$user->getId()?>">Editar</a></td>
            <td><a href="delUser.php?id=<?=$user->getId()?>">Remover</a></td>
        </tr>
    <?php endforeach; ?>
</table>
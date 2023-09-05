<?php
    
    require 'displayErrorsConfig.php';
    require 'dbconfig.php';
    require 'header.html';   
    require 'dao/UserDaoMySQL.php';
    
    $userDaoMySQL = new UserDaoMySQL($pdo);
    $users = $userDaoMySQL->findAll();
    
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
            <td><a href="updateUserForm.php?id=<?=$user->getId()?>">[Editar]</a></td>
            <td><a href="delUser.php?id=<?=$user->getId()?>" onclick="return confirm('Tem certeza que deseja excluir?')">[Remover]</a></td>
        </tr>
    <?php endforeach; ?>
</table>
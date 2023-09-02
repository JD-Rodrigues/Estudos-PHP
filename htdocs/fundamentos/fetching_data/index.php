<?php
    
    require 'displayErrorsConfig.php';
    require 'getUsers.php';
    require 'header.html';

    $users = $preparedUsers->fetchAll(PDO::FETCH_ASSOC);  
    
?>
<h1 style="text-align: center">Usuários</h1>
<table border='1' width='50%' style="margin: auto;">
    <tr>
        <th>EMAIL</th>
        <th>SENHA</th>
    </tr>

    <?php foreach($users as $user): ?>
        <tr>
            <td><?=$user['email']?></td>
            <td><?=$user['senha']?></td>
            <td><a href="updateUserForm.php?id=<?=$user['id']?>">Editar</a></td>
            <td><a href="delUser.php?id=<?=$user['id']?>">Remover</a></td>
        </tr>
    <?php endforeach; ?>
</table>
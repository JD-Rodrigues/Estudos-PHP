<?php $render('header'); ?>
<h1>Adicionar usuário</h1>

<form method="POST" action="<?=$base;?>/add">
    <label>
        E-mail
    </label>
    <input type="email" name="email" />
    <label>
        Senha
    </label>
    <input type="password" name="password" />
    <input type="submit"/>
</form>


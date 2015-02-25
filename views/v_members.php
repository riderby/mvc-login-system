<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="views/style.css"/>
</head>
<body>
<h1>Админка</h1>

<div id="content">
    <?php echo $this->getData('name'); ?>
    <?php
    $alerts = $this->getAlerts();
    if ($alerts != ''){ echo '<ul class="alerts">' . $alerts . '</ul>';}
    ?>

    <p>Вы в админке</p>
    <a href="register.php">Регистрация</a>
    <a href="change_password.php">Изменить пароль</a>
    <a href="logout.php">Выйти</a>

</div>

</body>
</html>
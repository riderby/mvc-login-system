<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="views/style.css"/>
</head>
<body>
<h1>Регистрация</h1>

<div id="content">

    <form action=""method="post">
        <div>

            <?php echo $this->getData('name'); ?>
            <?php
            $alerts = $this->getAlerts();
            if ($alerts != ''){ echo '<ul class="alerts">' . $alerts . '</ul>';}
            ?>
            <div class="row">
                <label for="username">Username: </label>
                <input type="text" name="username" value="<?php echo
                $this->getData('input_user'); ?>"/>
                <div class="error"><? echo $this->getData('error_user'); ?></div>
            </div>

            <div class="row">
                <label for="email">Email: *</label>
                <input type="text" name="email" value="<?php echo
                $this->getData('input_email'); ?>"/>
                <div class="error"><? echo $this->getData('error_email'); ?></div>
            </div>

            <div class="row">
                <label for="password">Password: *</label>
                <input type="password" name="password" value="<?php echo
                $this->getData('input_pass'); ?>"/>
                <div class="error"><? echo $this->getData('error_pass'); ?></div>
            </div>

            <div class="row">
                <label for="password2">Password again: *</label>
                <input type="password" name="password2" value="<?php echo
                $this->getData('input_pass2'); ?>"/>
                <div class="error"><? echo $this->getData('error_pass'); ?></div>
            </div>


            <div class="row">

                <p class="required">* обязательно</p>
                <input type="submit" name="submit" class="submit" value="ОК"/>
                <p><a href="change_password.php">Изменить пароль</a></p>
                <p> <a href="logout.php">Выйти</a> </p>


            </div>

        </div>
    </form>


    <div class="row">

    </div>


</div>

</body>
</html>
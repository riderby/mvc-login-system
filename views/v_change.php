<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="views/style.css"/>
</head>
<body>
<h1>Смена пароля</h1>

<div id="content">

    <form action="" method="post">
        <div>

            <?php echo $this->getData('name'); ?>
            <?php
            $alerts = $this->getAlerts();
            if ($alerts != ''){ echo '<ul class="alerts">' . $alerts . '</ul>';}
            ?>
            <div class="row">
                <label for="username">Логин: </label>
                <input type="text" name="name" value="<?php echo
                $this->getData('input_name'); ?>"/>
                <div class="error"><? echo $this->getData('error_user'); ?></div>
            </div>


            <div class="row">
                <label for="current_pass">Текущий пароль: </label>
                <input type="password" name="current_pass" value="<?php echo
                $this->getData('inputCurrent'); ?>"/>
                <div class="error"><? echo $this->getData('error_current'); ?></div>
            </div>

            <div class="row">
                <label for="password">Новый пароль: *</label>
                <input type="password" name="password" value="<?php echo
                $this->getData('input_pass'); ?>"/>
                <div class="error"><? echo $this->getData('error_pass'); ?></div>
            </div>

            <div class="row">
                <label for="password2">Повторить пароль *</label>
                <input type="password" name="password2" value="<?php echo
                $this->getData('input_pass2'); ?>"/>
                <div class="error"><? echo $this->getData('error_pass2'); ?></div>
            </div>


            <div class="row">

                <p class="required">* обязательно</p>
                <input type="submit" name="submit" class="submit" value="ОК"/>
                <p> <a href="logout.php">Выйти</a> </p>


            </div>

        </div>
    </form>


    <div class="row">

    </div>


</div>

</body>
</html>
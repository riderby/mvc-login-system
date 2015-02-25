<!DOCTYPE html>
<html>
    <head>
    <title>Login</title>
        <link rel="stylesheet" href="views/style.css"/>
    </head>
        <body>
        <h1>LOG IN OOP + MVC</h1>

        <div id="content">
            <form action="" method="post">
                <div>

                    <?php echo $this->getData('name'); ?>
                    <?php
                    $alerts = $this->getAlerts();
                    if ($alerts != ''){ echo '<ul class="alerts">' . $alerts . '</ul>';}
                    ?>
                    <div class="row">
                        <label for="username">Username: *</label>
                        <input type="text" name="username" value="<?php echo
                        $this->getData('input_user'); ?>"/>
                        <div class="error"><? echo $this->getData('error_user'); ?></div>
                    </div>

                    <div class="row">
                        <label for="password">Password: *</label>
                        <input type="password" name="password" value="<?php echo
                        $this->getData('input_pass'); ?>"/>
                        <div class="error"><? echo $this->getData('error_pass'); ?></div>
                    </div>
 <div class="row">
<a href="../files/my_source.zip">Скачать мои исходники</a>
</div>
                    <div class="row">

                        <p class="required">для доступа использовать логин - 'temp' пароль 'temp' </p>
                        <input type="submit" name="submit" class="submit" value="Log In"/>

                    </div>

                </div>
            </form>

            
       </div>



        </body>
</html>
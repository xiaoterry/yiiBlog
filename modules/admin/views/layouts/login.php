<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/7/8
 * Time: 16:11
 */
use app\assets\LoginAsset;

LoginAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="#" type="image/png">
        <?php $this->head() ?>
        <title>Login</title>
    
    </head>
    
    <body class="login-body">
        <?php $this->beginBody() ?>
        
            <div class="container">
            
                <?= $content ?>
            
            </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

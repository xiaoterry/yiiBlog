 <?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
$this->context->layout = false;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title><?= Html::encode($this->title) ?></title>

    <link href="/plus2016/web/adminx/css/style.css" rel="stylesheet">
    <link href="/plus2016/web/adminx/css/style-responsive.css" rel="stylesheet">

     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!--[if lt IE 9]>
    <script src="/plus2016/web/adminx/js/html5shiv.js"></script>
    <script src="/plus2016/web/adminx/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="error-page">

<section>
    <div class="container ">

        <section class="error-wrapper text-center">
<!--             <h1><img alt="" src="images/500-error.png"></h1>-->
            <h2>OOOPS!!!</h2>
            <h2><?= Html::encode($this->title) ?></h2>
            <h3>Something went wrong.</h3>
            <p class="nrml-txt"><?= Html::encode($message) ?></p>
            <a class="back-btn" href="<?= Url::toRoute(['admin/index/index']) ?>"> Back To Home</a>
        </section>

    </div>
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/plus2016/web/adminx/js/jquery-1.10.2.min.js"></script>
<script src="/plus2016/web/adminx/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/plus2016/web/adminx/js/bootstrap.min.js"></script>
<script src="/plus2016/web/adminx/js/modernizr.min.js"></script>


<!--common scripts for all pages-->
<!--<script src="js/scripts.js"></script>-->

</body>
</html>

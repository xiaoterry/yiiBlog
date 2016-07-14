<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="sticky-header">
<?php $this->beginBody() ?>

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index.html"><img src="/plus2016/web/adminx/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="/plus2016/web/adminx/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="/plus2016/web/adminx/images/photos/user-avatar.png" class="media-object">
                    <div class="media-body">
                        <h4><a href="#">John Doe</a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="menu-list <?php if ($this->context->id == 'admin' || $this->context->id == 'role') echo 'nav-active' ?>"><a href=""><i class="fa fa-laptop"></i> <span>管理员设置</span></a>
                    <ul class="sub-menu-list">
                        <li class="<?php if ($this->context->id == 'admin' && in_array($this->context->action->id, ['admin-list', 'admin-edit'])) echo 'active' ?>"><a href="<?= Url::toRoute(['admin/admin-list']) ?>"> 管理员管理 </a></li>
                        <li class="<?php if ($this->context->id == 'role' && in_array($this->context->action->id, ['role-list', 'role-edit', 'role-priv', 'admin-list'])) echo 'active' ?>"><a href="<?=Url::toRoute('//admin/role/role-list')?>"> 角色管理 </a></li>
                    </ul>
                </li>
            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                            <i class="fa fa-tasks"></i>
                            <span class="badge">8</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <h5 class="title">You have 8 pending task</h5>
                            <ul class="dropdown-list user-list">
                                <li class="new">
                                    <a href="#">
                                        <div class="task-info">
                                            <div>Database update</div>
                                        </div>
                                        <div class="progress progress-striped">
                                            <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
                                                <span class="">40%</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="new"><a href="">See All Pending Task</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
<!--                            <img src="/plus2016/web/plus2016/web/adminx/images/photos/user-avatar.png" alt="" />-->
                            <?php echo Yii::$app->user->identity->username ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i>  Settings</a></li>
                            <li><a href="<?php echo Url::toRoute('login/logout') ?>"><i class="fa fa-sign-out"></i> 退出</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <?= Breadcrumbs::widget([
                'homeLink' => [
                    'label' => '专题系统',
                    'url' => ['index/index'],
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
            <?= $content ?>
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer>
            2014 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

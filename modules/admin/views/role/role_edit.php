<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/7/6
 * Time: 14:08
 */

use yii\helpers\Html;
use yii\helpers\Url;
use app\common\Alert;

$this->title = '添加/编辑角色';
$this->params['breadcrumbs'][] = ['label' => '角色列表', 'url' => ['role-list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                添加角色
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="<?=Url::toRoute(['//admin/role/role-edit','rolename' => $role->name])?>">
                        <input type="hidden" name="<?= \Yii::$app->request->csrfParam ?>" value="<?= \Yii::$app->request->getCsrfToken() ?>">
                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-2">角色名</label>
                            <div class="col-lg-10">
                                <input class="form-control" value="<?=$role->name?>" id="rolename" name="rolename" type="text" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-2">角色描述</label>
                            <div class="col-lg-10">
                                <textarea class="form-control " name="roledesc"><?=$role->description?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit" name="submit" value="submit">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

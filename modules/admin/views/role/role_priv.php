<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/8
 * Time: 15:05
 */
use yii\helpers\Url;
?>
<div class="panel">
    <div class="panel-heading">
        权限设置
        <span class="tools pull-right">
            <a class="fa fa-chevron-down" href="javascript:;"></a>
            <a class="fa fa-times" href="javascript:;"></a>
        </span>
    </div>
    <div class="panel-body">
        <form action="<?=Url::toRoute('//admin/role/role-priv')?>" method="post">
            <input type="hidden" value="<?=$rolename?>" name="rolename">
            <div id="FlatTree4" class="tree tree-solid-line">
                <?php echo $this->context->showPrivTree($menus,$rolename) ?>
            </div>
            <input type="hidden" name="<?= \Yii::$app->request->csrfParam ?>" value="<?= \Yii::$app->request->getCsrfToken() ?>">
            <input type="submit" name="submit" class="btn btn-primary" value="提交">
        </form>

    </div>
</div>

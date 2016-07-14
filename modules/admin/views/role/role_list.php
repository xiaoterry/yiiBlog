<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/7/6
 * Time: 12:08
 */
use yii\helpers\Url;
use app\common\Alert;

$this->title = '角色列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php  Alert::begin();?>
<?php  Alert::end();?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                角色列表
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="clearfix">
                    <div class="btn-group">
                        <a href="<?=Url::toRoute('//admin/role/role-edit')?>" id="editable-sample_new" class="btn btn-primary">
                            添加角色 <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <table class="table  table-hover general-table">
                    <thead>
                        <tr>
                            <th>角色名</th>
                            <th class="hidden-phone">角色描述</th>
                            <th>管理操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($role_list as $role){?>
                        <tr>
                            <td class="hidden-phone"><?=$role->name?></td>
                            <td><?=$role->description?> </td>
                            <td>
                                <a href="<?=Url::toRoute(['//admin/role/role-priv','rolename' => $role->name])?>"><button class="btn btn-info btn-xs" type="button">权限设置</button></a>
                                <a href="<?=Url::toRoute(['//admin/role/admin-list','rolename' => $role->name])?>"><button class="btn btn-success btn-xs" type="button">成员列表</button></a>
                                <a href="<?=Url::toRoute(['//admin/role/role-edit','rolename' => $role->name])?>"><button class="btn btn-primary btn-xs" type="button">编辑</button></a>
                                <a href="<?=Url::toRoute(['//admin/role/role-delete','rolename' => $role->name])?>"><button class="btn btn-danger btn-xs" type="button">删除</button></a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

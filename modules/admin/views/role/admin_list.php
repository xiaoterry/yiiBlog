<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/7/6
 * Time: 12:08
 */
use yii\helpers\Url;
use app\common\Alert;

$this->title = '<'.$rolename.'>成员列表';
$this->params['breadcrumbs'][] = ['label' => '角色列表', 'url' => ['role-list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php  Alert::begin();?>
<?php  Alert::end();?>

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                成员列表
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">

                <table class="table  table-hover general-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>所属角色</th>
                        <th>邮箱地址</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($admin_list as $admin){?>
                        <tr>
                            <td class="hidden-phone"><?=$admin->id?></td>
                            <td><?=$admin->username?> </td>
                            <td><?=$rolename?> </td>
                            <td><?=$admin->email?> </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

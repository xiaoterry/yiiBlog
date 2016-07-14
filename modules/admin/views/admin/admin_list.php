<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/7/6
 * Time: 12:08
 */
use app\common\Alert;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = '管理员列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php  Alert::begin();?>
<?php  Alert::end();?>

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                管理员列表
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="clearfix">
                    <div class="btn-group">
                        <a href="<?php echo Url::toRoute('admin/admin-edit') ?>">
                            <button id="editable-sample_new" class="btn btn-primary">
                                添加管理员 <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <table class="table  table-hover general-table">
                    <tbody>
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>用户名</th>
                                <th>所属角色</th>
                                <th>Email</th>
                                <th>管理操作</th>
                            </tr>
                        </thead>
                        <?php foreach ($admins as $v) {?>
                            <tr>
                                <td><?= $v['id'] ?></td>
                                <td><?= $v['username'] ?></td>
                                <td><?= $v['authItem']['description'] ?></td>
                                <td><?= $v['email'] ?></td>
                                <td>
                                    <a href="<?php echo Url::toRoute(['admin/admin-edit', 'id' => $v['id']])?>"><button class="btn btn-info btn-xs" type="button">修改</button></a>
                                    <a href="<?php echo Url::toRoute(['admin/admin-delete', 'id' => $v['id']])?>"><button class="btn btn-danger btn-xs" type="button">删除</button></a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
                <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                        'firstPageLabel' => '首页',
                        'prevPageLabel' => '<',
                        'nextPageLabel' => '>',
                        'lastPageLabel' => '末页',
                    ]);
                ?>
            </div>
        </section>
    </div>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: Terry
 * Date: 16/7/30
 * Time: 下午7:52
 */
use app\common\Alert;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = '标签列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php  Alert::begin();?>
<?php  Alert::end();?>

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                分类列表
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="clearfix">
                    <div class="btn-group">
                        <a href="<?php echo Url::toRoute('tag/tag-edit') ?>">
                            <button id="editable-sample_new" class="btn btn-primary">
                                添加标签 <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <table class="table  table-hover general-table">
                    <tbody>
                    <thead>
                        <tr>
                            <th>序号</th>
                            <th>标签名称</th>
                            <th>管理操作</th>
                        </tr>
                    </thead>
                    <?php if (isset($tagsList)) :?>
                        <?php foreach ($tagsList as $v) {?>
                            <tr>
                                <td><?= $v['id'] ?></td>
                                <td><?= $v['name'] ?></td>
                                <td>
                                    <a href="<?php echo Url::toRoute(['tag/tag-edit', 'id' => $v['id']])?>"><button class="btn btn-info btn-xs" type="button">修改</button></a>
                                    <a href="<?php echo Url::toRoute(['tag/tag-delete', 'id' => $v['id']])?>"><button class="btn btn-danger btn-xs" type="button" onclick="return del();">删除</button></a>
                                </td>
                            </tr>
                        <?php }?>
                    <?php endif;?>
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
<script>
    function del(){
        if (confirm("确认删除吗")){
            return true;
        } else {
            return false;
        }
    }
</script>
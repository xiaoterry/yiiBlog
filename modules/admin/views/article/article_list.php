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

$this->title = '文章列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php  Alert::begin();?>
<?php  Alert::end();?>

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                文章列表
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th></th>
                                <th>标题名</th>
                                <th class="numeric">创建时间</th>
                                <th class="numeric">更新时间</th>
                                <th class="numeric">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articles as $v) :?>
                                <tr>
                                    <td></td>
                                    <td><?= $v['title'] ?></td>
                                    <td class="numeric"><?= date('Y-m-d H:i:s', $v['created_at']) ?></td>
                                    <td class="numeric"><?= date('Y-m-d H:i:s', $v['updated_at']) ?></td>
                                    <td class="">
                                        <a href="<?php echo Url::toRoute(['article/article-edit', 'id' => $v['id']])?>"><button class="btn btn-info btn-xs" type="button">修改</button></a>
                                        <a href="<?php echo Url::toRoute(['article/article-delete', 'id' => $v['id']])?>"><button class="btn btn-danger btn-xs" type="button">删除</button></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
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
                </section>
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
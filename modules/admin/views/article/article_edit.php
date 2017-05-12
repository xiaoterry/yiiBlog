<?php
/**
 * Created by PhpStorm.
 * User: Terry
 * Date: 16/7/31
 * Time: 下午11:05
 */

use yii\helpers\Html;
use app\common\Alert;
use yii\helpers\Url;
use yii\redactor\widgets\Redactor;
use yii\widgets\ActiveForm;

$this->title = '添加/编辑文章';
$this->params['breadcrumbs'][] = ['label' => '文章列表', 'url' => ['article-list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php  Alert::begin();?>
<?php  Alert::end();?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                添加文章
            </header>
            <div class="panel-body">
                <div class="form">
                    <?php $form = ActiveForm::begin([
                        'id' => 'edit-form',
                        'options'=>['class' => 'cmxform form-horizontal adminex-form'],
                        'enableAjaxValidation' => false,
                    ]);
                    ?>
                    <div class="form-group ">
                        <label for="username" class="control-label col-lg-2">文章标题</label>
                        <div class="col-sm-10">
                            <?= $form->field($article, 'title')->label(false)->input('text', ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">内容</label>
                        <div class="col-sm-10">
<!--                            <textarea rows="6" class="form-control"></textarea>-->
                            <?= $form->field($article, 'content')->label(false)->widget(Redactor::className(),[
                                'clientOptions' => [
                                    'imageManagerJson' => ['/redactor/upload/image-json'],
                                    'imageUpload' => ['/redactor/upload/image'],
                                    'fileUpload' => ['/redactor/upload/file'],
                                    'lang' => 'zh_cn',
                                    'plugins' => ['clips', 'fontcolor', 'imagemanager', 'fontsize', 'fontfamily', 'fullscreen', 'table'],
                                ],
                            ]) ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="email" class="control-label col-lg-2">所属分类</label>
                        <div class="col-lg-10">
                            <?= $form->field($article, 'cat_id')->label(false)->dropDownList($categories, ['class' => 'form-control m-bot15']) ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="tag_id" class="control-label col-lg-2 col-sm-3">标签</label>
                        <div class="col-lg-10">
                            <?= $form->field($article, 'tag_id')->label(false)->checkboxList($tags, ['class' => 'checkbox form-control']) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'value' => 'submit']); ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </section>
    </div>
</div>
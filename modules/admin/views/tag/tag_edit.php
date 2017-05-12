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
use yii\widgets\ActiveForm;

$this->title = '添加/编辑标签';
$this->params['breadcrumbs'][] = ['label' => '标签列表', 'url' => ['tag-list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php  Alert::begin();?>
<?php  Alert::end();?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                添加标签
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
                        <label for="username" class="control-label col-lg-2">标签名</label>
                        <div class="col-lg-10">
                            <?= $form->field($tag, 'name')->label(false)->input('text', ['class' => 'form-control']) ?>
                            <!--                                <input class="form-control " id="username" name="username" type="text" />-->
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
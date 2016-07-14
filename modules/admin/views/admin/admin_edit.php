<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/7/6
 * Time: 14:08
 */

use yii\helpers\Html;
use app\common\Alert;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = '添加/编辑管理员';
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['admin-list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php  Alert::begin();?>
<?php  Alert::end();?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                添加管理员
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
                            <label for="username" class="control-label col-lg-2">用户名</label>
                            <div class="col-lg-10">
                                <?= $form->field($admin, 'username')->label(false)->input('text', ['class' => 'form-control']) ?>
<!--                                <input class="form-control " id="username" name="username" type="text" />-->
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-2">密码</label>
                            <div class="col-lg-10">
                                <?= $form->field($admin, 'password')->label(false)->passwordInput(['class' => 'form-control']) ?>
<!--                                <input class="form-control " id="password" name="password" type="password" />-->
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password_repeat" class="control-label col-lg-2">确认密码</label>
                            <div class="col-lg-10">
                                <?= $form->field($admin, 'password_repeat')->label(false)->passwordInput(['class' => 'form-control']) ?>
<!--                                <input class="form-control " id="password_repeat" name="password_repeat" type="password" />-->
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">Email</label>
                            <div class="col-lg-10">
                                <?= $form->field($admin, 'email')->label(false)->input('email', ['class' => 'form-control']) ?>
<!--                                <input class="form-control " id="email" name="email" type="email" />-->
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">所属角色</label>
                            <div class="col-lg-10">
                                <?= $form->field($admin, 'role')->label(false)->dropDownList($roles, ['class' => 'form-control m-bot15']) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
<!--                                <button class="btn btn-primary" type="submit" name="submit" value="submit">提交</button>-->
                                <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'value' => 'submit']); ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </section>
    </div>
</div>

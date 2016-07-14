<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/7/8
 * Time: 16:03
 */
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => [
        'class' => 'form-signin',
    ]
]) ?>
    <div class="form-signin-heading text-center">
        <h1 class="sign-title">后台登录</h1>
        <img src="/plus2016/web/adminx/images/login-logo.png" alt=""/>
    </div>
    <div class="login-wrap">
        <?= $form->field($loginform, 'username')->label(false)->textInput(['class' => 'form-control', 'placeholder' => '用户名', 'autofocus' => true]) ?>
<!--        <input type="text" class="form-control" placeholder="用户名" autofocus>-->
        <?= $form->field($loginform, 'password')->label(false)->passwordInput(['class' => 'form-control', 'placeholder' => '密码']) ?>
<!--        <input type="password" class="form-control" placeholder="密码">-->

        <button class="btn btn-lg btn-login btn-block" type="submit">
            <i class="fa fa-check"></i>
        </button>

        <div class="registration">
            Not a member yet?
            <a class="" href="registration.html">
                Signup
            </a>
        </div>
        <label class="checkbox">
<!--            --><?//= $form->field($loginform, 'rememberMe')->checkbox() ?>
            <input type="checkbox" name="LoginForm[rememberMe]" value="1"> 记住我
        </label>

    </div>

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">忘记密码?</h4>
                </div>
                <div class="modal-body">
                    <p>Enter your e-mail address below to reset your password.</p>
                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-primary" type="button">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
<!--</form>-->
<?php ActiveForm::end()?>

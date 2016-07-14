<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 2016/7/8
 * Time: 17:51
 */
namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use app\modules\admin\models\Admin;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required', 'message' => '不能为空！'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'rememberMe' => '记住我',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $admin = Admin::findByUsername($this->username);

            if ($admin) {
                if (!$admin->validatePassword($this->password)) {
                    $this->addError($attribute, '用户名或密码错误！');
                }
            } else {
                $this->addError($attribute, '没有该管理员，请确认用户名是否正确！');
            }
        }
    }

}


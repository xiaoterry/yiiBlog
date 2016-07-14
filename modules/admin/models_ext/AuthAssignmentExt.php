<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/7
 * Time: 16:40
 */
namespace app\modules\admin\models_ext;
use Yii;
use app\modules\admin\models\AuthAssignment;
use app\modules\admin\models\Admin;

class AuthAssignmentExt extends AuthAssignment{

    /**
     * 根据角色名获取该角色的所有成员
     */
    public function getAssignmentByRole($rolename){
        $admin_ids = self::find()->where(['item_name' => $rolename])->select(['user_id'])->asArray()->all();

        return Admin::find()->where(['id' => array_column($admin_ids,'user_id')])->all();
    }
}
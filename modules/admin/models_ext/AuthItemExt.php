<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/8
 * Time: 12:01
 */

namespace app\modules\admin\models_ext;

use Yii;
use app\modules\admin\models\AuthItem;

class AuthItemExt extends AuthItem{


    public function getMenusAndPriv(){

        $menus = self::find()->where(['type' => 0])->select(['name','description'])->asArray()->all();

        $this->_menus($menus);

        return $menus;

    }

    private function _menus(&$menus){

        $auth = Yii::$app->authManager;

        foreach($menus as $key => $menu){

            $children = $auth->getChildren($menu['name']);
            $menus_tmp = [];
            if($children){
                foreach($children as $child){
                    $m['name'] = $child->name;
                    $m['description'] = $child->description;
                    $menus_tmp[] = $m;
                }
                $this->_menus($menus_tmp);
            }
            $menus[$key]['child'] = $menus_tmp;
        }
    }

}
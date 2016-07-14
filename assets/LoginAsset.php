<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'adminx/css/style.css',
        'adminx/css/style-responsive.css',
    ];
    
    public $js = [

        // Placed js at the end of the document so the pages load faster
        'adminx/js/jquery-1.10.2.min.js',
        'adminx/js/bootstrap.min.js',
        'adminx/js/modernizr.min.js',
        'adminx/js/yii/yii.activeForm.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}

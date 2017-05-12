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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'adminx/css/clndr.css',
        'adminx/js/fuelux/css/tree-style.css',
        'adminx/js/morris-chart/morris.css',
        'adminx/css/style.css',
        'adminx/css/style-responsive.css',
        'adminx/js/iCheck/skins/minimal/minimal.css',
        'adminx/js/iCheck/skins/square/square.css',
        'adminx/js/iCheck/skins/square/red.css',
        'adminx/js/iCheck/skins/square/blue.css',
    ];
    
    public $js = [

        // Placed js at the end of the document so the pages load faster
//        'adminx/js/jquery-1.10.2.min.js',
        'adminx/js/jquery-ui-1.9.2.custom.min.js',
        'adminx/js/jquery-migrate-1.2.1.min.js',
        'adminx/js/bootstrap.min.js',
        'adminx/js/modernizr.min.js',
        'adminx/js/jquery.nicescroll.js',

        // easy pie chart
        'adminx/js/easypiechart/jquery.easypiechart.js',
        'adminx/js/easypiechart/easypiechart-init.js',

        // Sparkline Chart
        'adminx/js/sparkline/jquery.sparkline.js',
        'adminx/js/sparkline/sparkline-init.js',

        // icheck
        'adminx/js/iCheck/jquery.icheck.js',
        'adminx/js/icheck-init.js',

        // jQuery Flot Chart
        'adminx/js/flot-chart/jquery.flot.js',
        'adminx/js/flot-chart/jquery.flot.tooltip.js',
        'adminx/js/flot-chart/jquery.flot.resize.js',


        // Morris Chart
        'adminx/js/morris-chart/morris.js',
        'adminx/js/morris-chart/raphael-min.js',

        // Calendar
        'adminx/js/calendar/clndr.js',
        'adminx/js/calendar/evnt.calendar.init.js',
        'adminx/js/calendar/moment-2.2.1.js',
        "http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js",

        "adminx/js/fuelux/js/tree.min.js",
        "adminx/js/tree-init.js",

        // common scripts for all pages
        'adminx/js/scripts.js',

        // Dashboard Charts
        'adminx/js/dashboard-chart-init.js',

        'adminx/js/html5shiv.js',
        'adminx/js/respond.min.js',

        'adminx/js/yii/yii.activeForm.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}

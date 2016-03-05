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
        'css/custom.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'css/morris.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
    ];
    public $js = [
        //'js/hrmain.js',
        'js/Chart.min.js',
        //'js/dashboard2.js',
        'js/morris.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

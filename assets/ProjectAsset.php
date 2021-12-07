<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ProjectAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/assets/css/bootstrap.min.css',
        'web/assets/css/font-awesome.min.css',
        'web/assets/css/bootstrap-theme.css',
        'web/assets/css/style.css',
        'web/assets/css/camera.css'
    ];
    public $js = [
        'web/assets/js/modernizr-latest.js',
        'web/assets/js/jquery.min.js',
        'web/assets/js/fancybox/jquery.fancybox.pack.js',
        'web/assets/js/jquery.mobile.customized.min.js',
        'web/assets/js/jquery.easing.1.3.js',
        'web/assets/js/camera.min.js',
        'web/assets/js/bootstrap.min.js',
        'web/assets/js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapAsset',
    ];
}

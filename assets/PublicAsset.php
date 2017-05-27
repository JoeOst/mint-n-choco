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
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/css/bootstrap.css',
        'public/css/book-main.css',
    ];
    public $js = [
        "public/js/jquery.js",
        "public/js/bootstrap.min.js",
        "public/js/blog-home.js",
    ];
    public $depends = [

    ];
}

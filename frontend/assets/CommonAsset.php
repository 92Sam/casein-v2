<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CommonAsset extends AssetBundle
{
    public $sourcePath = '@common/theme';

    public $css = [
        #<!-- Theme styles BEGIN -->
        'assets/frontend/global/css/components.css',
        'assets/frontend/onepage/css/style.css',
        'assets/frontend/onepage/css/style-responsive.css',
        'assets/frontend/onepage/css/custom.css',
        #<!-- Theme styles END -->

        #<!-- Global styles BEGIN -->
        'assets/frontend/global/plugins/bootstrap.css',
        'assets/frontend/global/plugins/font-awesome/css/font-awesome.min.css',
        'assets/frontend/global/plugins/revolution_slider/css/rs-style.css',
        'assets/frontend/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css',
        #<!-- Global styles END -->
        
        #<!-- Page level plugin styles BEGIN -->
        'assets/frontend/global/plugins/fancybox/source/jquery.fancybox.css',
        #<!-- Page level plugin styles END -->
    ];
    public $js = [
        'assets/frontend/onepage/scripts/layout.js',
        'assets/frontend/onepage/scripts/jquery.nav.js',

        #<!-- BEGIN RevolutionSlider -->
        'assets/frontend/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js',
        'assets/frontend/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js',
        'assets/frontend/onepage/scripts/revo-ini.js',
        #<!-- END RevolutionSlider -->
    ];

}

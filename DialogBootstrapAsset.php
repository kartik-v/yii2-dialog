<?php

/**
 * @package   yii2-dialog
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2015 - 2016
 * @version   1.0.0
 */

namespace kartik\dialog;

use kartik\base\AssetBundle;

/**
 * Asset bundle for Bootstrap 3 Dialog
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class DialogBootstrapAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'kartik\base\PluginAssetBundle'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath('@bower/bootstrap3-dialog');
        $this->setupAssets('js', ['dist/js/bootstrap-dialog']);
        $this->setupAssets('css', ['dist/css/bootstrap-dialog']);
        parent::init();
    }
}

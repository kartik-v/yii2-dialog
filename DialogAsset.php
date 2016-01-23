<?php

/**
 * @package   yii2-bootstrap-dialog
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
class DialogAsset extends AssetBundle
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
        $this->setupAssets('js', ['js/bootstrap-dialog']);
        $this->setupAssets('css', ['css/bootstrap-dialog']);
        parent::init();
    }
}

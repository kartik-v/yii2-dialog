<?php

/**
 * @package   yii2-dialog
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2015 - 2016
 * @version   1.0.3
 */

namespace kartik\dialog;

use yii\web\View;
use kartik\base\AssetBundle;

/**
 * Asset bundle that overrides Yii's default confirm dialog
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class DialogYiiAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\YiiAsset',
        'kartik\dialog\DialogAsset',
    ];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/dialog-yii']);
        parent::init();
    }
}

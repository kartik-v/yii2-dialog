<?php

/**
 * @package   yii2-dialog
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2016
 * @version   1.0.0
 */

namespace kartik\dialog;

use Yii;
use kartik\base\Widget;
use yii\helpers\Json;
use yii\web\View;

/**
 * Widget to easily configure and initialize the dialog settings and provide a polyfill for native javascript alert,
 * confirm, and prompt dialog boxes.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class Dialog extends Widget
{
    // Krajee JS dialog library
    const LIBRARY = 'krajeeDialog';

    // icons
    const ICON_OK = 'glyphicon glyphicon-ok';
    const ICON_CANCEL = 'glyphicon glyphicon-ban-circle';
    const ICON_SPINNER = 'glyphicon glyphicon-asterisk';

    // dialog methods
    const DIALOG_ALERT = 'alert';
    const DIALOG_CONFIRM = 'confirm';
    const DIALOG_PROMPT = 'prompt';
    const DIALOG_OTHER = 'dialog';

    // bootstrap contextual types
    const TYPE_DEFAULT = 'type-default';
    const TYPE_INFO = 'type-info';
    const TYPE_PRIMARY = 'type-primary';
    const TYPE_SUCCESS = 'type-success';
    const TYPE_WARNING = 'type-warning';
    const TYPE_DANGER = 'type-danger';

    // bootstrap sizes
    const SIZE_NORMAL = 'size-normal';
    const SIZE_SMALL = 'size-small';
    const SIZE_WIDE = 'size-wide'; // size-wide is equal to modal-lg
    const SIZE_LARGE = 'size-large';

    /**
     * @var bool whether to use the native javascript dialog for rendering the popup prompts. If set to `false`, the
     *     bootstrap3-dialog library will be used for rendering the prompts as a modal dialog
     */
    public $useNative = false;

    /**
     * @var bool whether to show a draggable cursor for draggable dialog boxes when dragging
     */
    public $showDraggable = true;

    /**
     * @var string the identifying name of the public javascript id that will hold the settings for KrajeeDialog
     *     javascript object instance. Defaults to `krajeeDialog`.
     */
    public $libName = self::LIBRARY;

    /**
     * @var array the configuration options for the bootstrap dialog (applicable when `useNative` is `false`). You can
     *     set the configuration settings as key value pairs that can be recognized by the BootstrapDialog plugin.
     * ```
     * // Example 1
     * echo Dialog::widget([
     *    'libName' => 'krajeeDialog',
     *    'options => [], // default options
     * ]);
     *
     * // Example 2
     * echo Dialog::widget([
     *    'libName' => 'krajeeDialogCust',
     *    'options => ['draggable' => true, 'closable' => true], // custom options
     * ]);
     * ```
     *
     * Then you can use your own javascript as shown below to render your alert, confirm, and prompt boxes:
     *
     * ```
     *      // use krajeeDialog object instance
     *      $('#btn-1').on('click', function() {
     *          krajeeDialog.alert('An alert');
     *          // or show a confirm
     *          krajeeDialog.confirm('Are you sure', function(out){
     *              if(out) {
     *                  alert('Yes'); // or do something on confirmation
     *              }
     *          });
     *
     *      });
     *
     *      // use krajeeDialogCust object instance
     *      $('#btn-2').on('click', function() {
     *          krajeeDialogCust.alert('An alert');
     *          // or show a prompt
     *          krajeeDialogCust.prompt({label:'Provide reason', placeholder:'Upto 30 characters...'}, function(out){
     *              if (out) {
     *                  alert('Yes'); // or do something based on the value of out
     *              }
     *          });
     *
     *      });
     * ```
     *
     */
    public $options = [];

    /**
     * @var array the default dialog settings for alert, confirm, and prompt
     */
    public $dialogDefaults = [];

    /**
     * @inheritdoc
     */
    protected $_msgCat = 'kvdialog';

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->initI18N();
        $this->initOptions();
        $this->registerAssets();
    }

    /**
     * Initialize the buttons
     */
    public function initOptions()
    {
        $ok = Yii::t('kvdialog', 'Ok');
        $cancel = Yii::t('kvdialog', 'Cancel');
        $info = Yii::t('kvdialog', 'Information');
        $okLabel = '<span class="' . self::ICON_OK . '"></span> ' . $ok;
        $cancelLabel = '<span class="' . self::ICON_CANCEL . '"></span> ' . $cancel;
        $promptDialog = $otherDialog = [
            'draggable' => false,
            'title' => $info,
            'buttons' => [
                ['label' => $cancel, 'icon' => self::ICON_CANCEL],
                ['label' => $ok, 'icon' => self::ICON_OK, 'class' => 'btn-primary'],
            ]
        ];
        $otherDialog['draggable'] = true;
        $promptDialog['closable'] = false;
        $this->dialogDefaults = array_replace_recursive([
            self::DIALOG_ALERT => [
                'type' => self::TYPE_INFO,
                'title' => $info,
                'buttonLabel' => $okLabel
            ],
            self::DIALOG_CONFIRM => [
                'type' => self::TYPE_WARNING,
                'title' => Yii::t('kvdialog', 'Confirmation'),
                'btnOKClass' => 'btn-warning',
                'btnOKLabel' => $okLabel,
                'btnCancelLabel' => $cancelLabel
            ],
            self::DIALOG_PROMPT => $promptDialog,
            self::DIALOG_OTHER => $otherDialog
        ], $this->dialogDefaults);
    }

    /**
     * Registers the dialog client assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        if (!$this->useNative) {
            DialogBootstrapAsset::register($view);
        }
        DialogAsset::register($view);
        if ($this->showDraggable) {
            $view->registerCss('.bootstrap-dialog .modal-header.bootstrap-dialog-draggable{cursor:move}');
        }
        $flag = $this->useNative ? 'false' : 'true';
        $opts = Json::encode($this->options);
        $optsVar = self::LIBRARY . '_' . hash('crc32', $opts);
        $defaults = Json::encode($this->dialogDefaults);
        $defaultsVar = self::LIBRARY . 'Defaults_' . hash('crc32', $defaults);
        $view->registerJs("var {$optsVar}={$opts};", View::POS_HEAD);
        $view->registerJs("var {$defaultsVar}={$defaults};", View::POS_HEAD);
        $view->registerJs("var {$this->libName}=new KrajeeDialog({$flag},{$optsVar},{$defaultsVar});", View::POS_HEAD);
    }
}

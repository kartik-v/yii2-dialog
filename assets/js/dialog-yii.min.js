/*!
 * @package   yii2-dialog
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2017
 * @version   1.0.3
 *
 * Override Yii confirmation dialog with Krajee Dialog.
 *
 * Author: Kartik Visweswaran
 * Copyright: 2015, Kartik Visweswaran, Krajee.com
 * For more JQuery plugins visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */var krajeeYiiConfirm;!function(){"use strict";krajeeYiiConfirm=function(i){i=i||"krajeeDialog";var n=window[i]||"";n&&(yii.confirm=function(i,o,r){n.confirm(i,function(i){i?!o||o():!r||r()})})}}();
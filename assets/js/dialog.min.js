/*!
 * @package   yii2-dialog
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2017
 * @version   1.0.3
 *
 * Provides a polyfill for javascript native alert, confirm, and prompt boxes. The BootstrapDialog will be used if
 * available or needed, else the javascript native dialogs will be rendered.
 *
 * Author: Kartik Visweswaran
 * Copyright: 2015, Kartik Visweswaran, Krajee.com
 * For more JQuery plugins visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */var KrajeeDialog;!function(){"use strict";var t,o;t=function(t,o){try{return window[t](o)}catch(e){return"confirm"===t?!0:null}},o=function(t){return"object"==typeof t?t:{}},KrajeeDialog=function(t,e,a){var n=this;a=a||{},n.useBsDialog=t,n.options=o(e),n.defaults=o(a)},KrajeeDialog.prototype={constructor:KrajeeDialog,usePlugin:function(){return this.useBsDialog&&!!window.BootstrapDialog},getOpts:function(t){var o=this;return window.jQuery.extend(!0,{},o.defaults[t],o.options)},_dialog:function(o,e,a){var n,i,l=this;if("function"!=typeof a)throw"Invalid callback passed for KrajeeDialog."+o;return l.usePlugin()?"prompt"===o?void l.bdPrompt(e,a):(n=l.getOpts(o),n.message=e,void("confirm"===o?(n.callback=a,window.BootstrapDialog.confirm(n)):window.BootstrapDialog.show(n))):(i=t(o,e),void(i&&a(i)))},alert:function(t,o){var e=this,a=e.getOpts("alert");e.usePlugin()?(a.message=t,a.callback=o,window.BootstrapDialog.alert(a)):window.alert(t)},confirm:function(t,o){this._dialog("confirm",t,o)},prompt:function(t,o){this._dialog("prompt",t,o)},dialog:function(t,o){this._dialog("dialog",t,o)},bdPrompt:function(t,o){var e,a,n,i,l,r,s,c=this,u="",d=c.getOpts("prompt");for(e=function(t){var e,a=t.getModalBody();e=a.find("input")[0].value||"",o(e),t.close()},a=function(t){t.close(),o(null)},n=[{id:"btn-cancel",label:"Cancel",cssClass:"btn btn-default",action:a},{id:"btn-ok",label:"Ok",cssClass:"btn btn-primary",action:e}],i=d.buttons||[],"object"==typeof t?(l=$(document.createElement("div")),r=$(document.createElement("input")),void 0===t.name&&r.attr("name","krajee-dialog-prompt"),void 0===t.type&&r.attr("type","text"),void 0===t["class"]&&r.addClass("form-control"),$.each(t,function(t,o){"label"!==t&&r.attr(t,o)}),void 0!==t.label&&(u='<label for="'+r.attr("name")+'" class="control-label">'+t.label+"</label>"),l.append(r),u+=l.html(),r.remove(),l.remove()):u=t,d.message=u,s=0;s<n.length;s++)i[s]=window.jQuery.extend(!0,{},n[s],i[s]);d.buttons=i,window.BootstrapDialog.show(d)}}}();
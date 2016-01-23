yii2-bootstrap-dialog
=====================

[![Latest Stable Version](https://poser.pugx.org/kartik-v/yii2-bootstrap-dialog/v/stable)](https://packagist.org/packages/kartik-v/yii2-bootstrap-dialog)
[![License](https://poser.pugx.org/kartik-v/yii2-bootstrap-dialog/license)](https://packagist.org/packages/kartik-v/yii2-bootstrap-dialog)
[![Total Downloads](https://poser.pugx.org/kartik-v/yii2-bootstrap-dialog/downloads)](https://packagist.org/packages/kartik-v/yii2-bootstrap-dialog)
[![Monthly Downloads](https://poser.pugx.org/kartik-v/yii2-bootstrap-dialog/d/monthly)](https://packagist.org/packages/kartik-v/yii2-bootstrap-dialog)
[![Daily Downloads](https://poser.pugx.org/kartik-v/yii2-bootstrap-dialog/d/daily)](https://packagist.org/packages/kartik-v/yii2-bootstrap-dialog)

An asset bundle for [bootstrap3-dialog](http://nakupanda.github.io/bootstrap3-dialog/) for Yii Framework 2.0. Refer the [bootstrap3-dialog repo](https://github.com/nakupanda/bootstrap3-dialog) or [bootstrap3-dialog examples](http://nakupanda.github.io/bootstrap3-dialog/) for details.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

### Pre-requisites
> Note: Check the [composer.json](https://github.com/kartik-v/yii2-dropdown-x/blob/master/composer.json) for this extension's requirements and dependencies. 
You must set the `minimum-stability` to `dev` in the **composer.json** file in your application root folder before installation of this extension OR
if your `minimum-stability` is set to any other value other than `dev`, then set the following in the require section of your composer.json file

```
kartik-v/yii2-bootstrap-dialog: "@dev"
```

Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

### Install

Either run

```
$ php composer.phar require kartik-v/yii2-bootstrap-dialog "@dev"
```

or add

```
"kartik-v/yii2-bootstrap-dialog": "@dev"
```

to the ```require``` section of your `composer.json` file.

## Usage

In your view you can load the asset bundle and render the javascript to load the bootstrap 3 modal dialog.

```php
// view.php
use kartik\dialog\DialogAsset;
DialogAsset::register($this);
$this->registerJs("\$('#your-btn-id').on('click', function(){BootstrapDialog.alert('I want banana!');});");
```

## License

**yii2-bootstrap-dialog** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
# Yii2 Google Tag Manager

**Google Tag Manager widget for Yii2 applications**

[![Latest Stable Version](https://poser.pugx.org/hiqdev/yii2-google-tag-manager/v/stable)](https://packagist.org/packages/hiqdev/yii2-google-tag-manager)
[![Total Downloads](https://poser.pugx.org/hiqdev/yii2-google-tag-manager/downloads)](https://packagist.org/packages/hiqdev/yii2-google-tag-manager)
[![Build Status](https://img.shields.io/travis/hiqdev/yii2-google-tag-manager.svg)](https://travis-ci.org/hiqdev/yii2-google-tag-manager)
[![Scrutinizer Code Coverage](https://img.shields.io/scrutinizer/coverage/g/hiqdev/yii2-google-tag-manager.svg)](https://scrutinizer-ci.com/g/hiqdev/yii2-google-tag-manager/)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/hiqdev/yii2-google-tag-manager.svg)](https://scrutinizer-ci.com/g/hiqdev/yii2-google-tag-manager/)

Provides really easy adding [Google Tag Manager] snippet to a site.
Even easier then adding a widget into a site layout.

Works by adding Behavior to the Application View.
Behavior listens to [EVENT_BEGIN_BODY] and echos the snippet.

[Google Tag Manager]: https://tagmanager.google.com/
[EVENT_BEGIN_BODY]: http://www.yiiframework.com/doc-2.0/yii-web-view.html#EVENT_BEGIN_BODY-detail

## Installation

The preferred way to install this yii2-extension is through [composer](http://getcomposer.org/download/).

Either run

```sh
php composer.phar require "hiqdev/yii2-google-tag-manager"
```

or add

```json
"hiqdev/yii2-google-tag-manager": "*"
```

to the require section of your composer.json.

## Configuration

This extension is supposed to be used with [composer-config-plugin].

Else look [config/web.php] for cofiguration example.

Available configuration parameters:

- `GoogleTagManager.id`

For more details please see [config/params.php].

[composer-config-plugin]:   https://github.com/hiqdev/composer-config-plugin
[config/web.php]:           config/web.php
[config/params.php]:        config/params.php

Simple notification widget for Yii2
=================================
Noty widget for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist rsmike/yii2-noty "*"
```

or add

```
"rsmike/yii2-noty": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your layout file like this:

```php
<?= NotyWidget::widget([
    'typeOptions' => [
        'success' => ['timeout' => 3000],
        'info' => ['timeout' => 3000],
    ],
    'options' => [
        'progressBar' => true,
        'timeout' => false,
        'layout' => 'topCenter',
        'dismissQueue' => true,
        'theme' => 'relax'
    ],
]) ?>
```

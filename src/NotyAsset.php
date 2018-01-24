<?php

namespace rsmike\noty;

use yii\web\AssetBundle;

class NotyAsset extends AssetBundle
{
    public $sourcePath = '@vendor/needim/noty/lib';

    public $js = [
        'noty.js'
    ];

    public $css = [
        'noty.css',
    ];

}
<?php

namespace rsmike\noty;

use Yii;
use yii\base\Widget;
use yii\helpers\Json;

class NotyWidget extends Widget
{
    private $typeMap = [
        'alert' => 'alert',
        'success' => 'success',
        'warning' => 'warning',
        'danger' => 'error',
        'error' => 'error',
        'info' => 'info',
    ];

    public $typeOptions = [];

    public $options = [
        'progressBar' => true,
        'timeout' => false,
        'layout' => 'topRight',
        'dismissQueue' => true,
        'theme' => 'relax',
    ];

    public function init()
    {
        parent::init();
        NotyAsset::register($this->view);
    }

    public function run()
    {
        $session = Yii::$app->session;
        $flashes = $session->getAllFlashes();

        foreach ($flashes as $type => $flash) {
            if (!isset($this->typeMap[$type])) {
                continue;
            }
            $typeAlert = $this->typeMap[$type];
            $options = array_merge($this->options, $this->typeOptions[$typeAlert] ?? []);

            foreach ((array)$flash as $i => $message) {
                $options['type'] = $typeAlert;
                $options['text'] = $message;
                $options = Json::encode($options);
                $this->view->registerJs("new Noty($options).show();");
                echo('HEY');
            }
            $session->removeFlash($type);
        }
    }
}
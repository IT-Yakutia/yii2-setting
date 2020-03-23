<?php


namespace ityakutia\setting;


use yii\base\BootstrapInterface;


class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->setModule('setting', 'ityakutia\setting\Module');
    }
}
<?php

namespace app\modules;

use yii\base\BootstrapInterface;

/**
 * Class Bootstrap
 *
 * @package app\modules
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritDoc
     */
    public function bootstrap($app)
    {
        \Yii::$container->set(
            'app\presenters\UserPresenter',
            'app\modules\presenters\UserPresenter'
        );
    }
}

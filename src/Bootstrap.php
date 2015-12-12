<?php

namespace frostealth\yii2\presenter;

use yii\base\BootstrapInterface;

/**
 * Class Bootstrap
 *
 * @package frostealth\yii2\presenter
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritDoc
     */
    public function bootstrap($app)
    {
        \Yii::$container->setSingleton(
            'frostealth\presenter\interfaces\DecoratorInterface',
            'frostealth\yii2\presenter\Decorator'
        );
    }
}

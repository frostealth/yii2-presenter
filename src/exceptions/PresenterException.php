<?php

namespace frostealth\yii2\presenter\exceptions;

use yii\base\Exception;

/**
 * Class PresenterException
 *
 * @package frostealth\yii2\presenter\exceptions
 */
class PresenterException extends Exception
{
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'Presenter Exception';
    }
}

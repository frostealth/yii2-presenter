<?php

namespace frostealth\yii2\presenter\traits;

use frostealth\presenter\interfaces\PresenterInterface;
use frostealth\yii2\presenter\exceptions\PresenterException;

/**
 * Trait PresentableTrait
 *
 * @package frostealth\yii2\presenter\traits
 */
trait PresentableTrait
{
    /** @var PresenterInterface */
    protected $presenterInstance;

    /**
     * @return PresenterInterface
     * @throws PresenterException
     * @throws \yii\base\InvalidConfigException
     */
    public function presenter()
    {
        if (empty($this->presenterInstance)) {
            $this->presenterInstance = $this->buildPresenter();
        }

        return $this->presenterInstance;
    }

    /**
     * @return PresenterInterface
     * @throws PresenterException
     * @throws \yii\base\InvalidConfigException
     */
    protected function buildPresenter()
    {
        $presenter = $this->getPresenterClass();
        $presenter = is_string($presenter) ? ['class' => $presenter] : (array)$presenter;
        $presenter = \Yii::createObject($presenter, [$this]);

        if (!$presenter instanceof PresenterInterface) {
            throw new PresenterException(strtr(
                '"{{class}}" must implement "frostealth\presenter\interfaces\PresenterInterface".',
                ['{{class}}' => get_class($presenter)]
            ));
        }

        return $presenter;
    }

    /**
     * @return string|array
     */
    abstract protected function getPresenterClass();
}

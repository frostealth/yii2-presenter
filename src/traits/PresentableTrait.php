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
        if (empty($this->presenter)) {
            throw new PresenterException(strtr(
                'Please set the {{class}}::$presenter property for creating your presenter.',
                ['{{class}}' => get_called_class()]
            ));
        }

        $presenter = $this->presenter;
        $presenter = is_string($presenter) ? ['class' => $presenter] : (array)$presenter;
        $presenter = \Yii::createObject($presenter, [$this]);

        if (!$presenter instanceof PresenterInterface) {
            throw new PresenterException(strtr(
                '"{{class}}" must implement "{{interface}}".',
                ['{{class}}' => get_class($presenter), '{{interface}}' => PresenterInterface::class]
            ));
        }

        return $presenter;
    }
}

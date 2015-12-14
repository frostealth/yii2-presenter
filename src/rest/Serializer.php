<?php

namespace frostealth\yii2\presenter\rest;

use yii\rest\Serializer as BaseSerializer;

/**
 * Class Serializer
 *
 * @package frostealth\yii2\presenter\rest
 */
class Serializer extends BaseSerializer
{
    /** @var string|array the configuration for creating the decorator. */
    public $decorator = 'frostealth\presenter\interfaces\DecoratorInterface';

    /**
     * @inheritDoc
     */
    protected function serializeModel($model)
    {
        $model = $this->decorate($model);

        return parent::serializeModel($model);
    }

    /**
     * @inheritDoc
     */
    protected function serializeModels(array $models)
    {
        $models = $this->decorate($models);

        return parent::serializeModels($models);
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    protected function decorate($value)
    {
        return \Yii::createObject($this->decorator)->decorate($value);
    }
}

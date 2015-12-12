<?php

namespace frostealth\yii2\presenter;

use frostealth\presenter\Presenter as BasePresenter;
use yii\base\Arrayable;
use yii\base\ArrayableTrait;

/**
 * Class Presenter
 *
 * @package frostealth\yii2\presenter
 */
abstract class Presenter extends BasePresenter implements Arrayable
{
    use ArrayableTrait;

    /**
     * @inheritDoc
     */
    public function fields()
    {
        if ($this->entity instanceof Arrayable) {
            return $this->entity->fields();
        }

        $fields = is_array($this->entity) ? $this->entity : \Yii::getObjectVars($this->entity);
        $fields = array_keys($fields);
        $fields = array_combine($fields, $fields);

        return $fields;
    }

    /**
     * @inheritDoc
     */
    public function extraFields()
    {
        if ($this->entity instanceof Arrayable) {
            return $this->entity->extraFields();
        }

        return [];
    }
}

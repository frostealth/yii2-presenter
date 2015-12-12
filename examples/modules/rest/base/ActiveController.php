<?php

namespace app\modules\rest\base;

/**
 * Class ActiveController
 *
 * @package app\modules\rest\base
 */
class ActiveController extends \yii\rest\ActiveController
{
    /** @inheritdoc */
    public $serializer = 'frostealth\yii2\presenter\rest\Serializer';
}

<?php

namespace app\presenters;

use app\models\User;
use frostealth\yii2\presenter\Presenter;
use yii\helpers\ArrayHelper;

/**
 * Class UserPresenter
 *
 * @property User $entity
 *
 * @property-read int    $id
 * @property-read string $firstName
 * @property-read string $lastName
 * @property-read string $fullName
 * @property-read string $birthDate
 * @property-read string $createdAt
 * @property-read string $city
 *
 * @property-read UserPresenter $father
 *
 * @package app\presenters
 */
class UserPresenter extends Presenter
{
    /**
     * @return string
     */
    public function getFullName()
    {
        return implode(' ', [$this->firstName, $this->lastName]);
    }

    /**
     * @return string
     */
    public function getBirthDate()
    {
        return date('y.M.d', $this->entity->birthDate);
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return ArrayHelper::getValue($this->entity, 'city.name');
    }
}

<?php

namespace app\models;

use app\presenters\UserPresenter;
use frostealth\presenter\interfaces\PresentableInterface;
use frostealth\yii2\presenter\traits\PresentableTrait;
use yii\db\ActiveRecord;

/**
 * Class User
 *
 * @property int    $id
 * @property int    $cityId
 * @property int    $fatherId
 * @property string $firstName
 * @property string $lastName
 * @property string $birthDate
 * @property string $passwordHash
 * @property string $passwordResetToken
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property City $city
 * @property User $father
 *
 * @method UserPresenter presenter()
 *
 * @package app\models
 */
class User extends ActiveRecord implements PresentableInterface
{
    use PresentableTrait;

    /** @var string */
    protected $presenter = 'app\presenters\UserPresenter';

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'cityId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFather()
    {
        return $this->hasOne(get_called_class(), ['id' => 'fatherId']);
    }
}

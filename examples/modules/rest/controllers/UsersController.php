<?php

namespace app\modules\rest\controllers;

use app\modules\rest\base\ActiveController;

/**
 * Class UsersController
 *
 * @package app\modules\rest\controllers
 */
class UsersController extends ActiveController
{
    /** @inheritdoc */
    protected $className = 'app\models\User';
}

<?php

namespace app\controllers;

use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class UsersController
 *
 * @package app\controllers
 */
class UsersController extends Controller
{
    /**
     * @param string $id
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        /** @var User $model */
        $model = User::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException();
        }

        return $this->render('view', ['presenter' => $model->presenter()]);
    }
}

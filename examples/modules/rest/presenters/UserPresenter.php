<?php

namespace app\modules\rest\presenters;

/**
 * Class UserPresenter
 *
 * @package app\modules\rest\presenters
 */
class UserPresenter extends \app\presenters\UserPresenter
{
    /**
     * @inheritDoc
     */
    public function fields()
    {
        return ['id', 'fullName', 'birthDate', 'city'];
    }

    /**
     * @inheritDoc
     */
    public function extraFields()
    {
        return ['father'];
    }
}

<?php
/** @var \yii\web\View $this */
/** @var \app\presenters\UserPresenter $presenter */

$this->title = 'User #' . $presenter->id;
?>

<div class="user-container">
    <dl>
        <dt>ID</dt>
        <dd><?= $presenter->id ?></dd>

        <dt>Name</dt>
        <dd><?= $presenter->fullName ?></dd>

        <dt>Birth Date</dt>
        <dd><?= $presenter->birthDate ?></dd>

        <dt>City</dt>
        <dd><?= $presenter->city ?></dd>

        <dt>Father</dt>
        <dd><?= $presenter->father->fullName ?></dd>

        <dt>Created At</dt>
        <dd><?= $presenter->createdAt ?></dd>
    </dl>
</div>

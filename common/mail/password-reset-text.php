<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['signup/password-reset', 'token' => $user->password_reset_token]);
?>
Здравствуйте, <?= $user->username ?>!

Перейдите по ссылке, чтобы поменять пароль:

<?= $resetLink ?>

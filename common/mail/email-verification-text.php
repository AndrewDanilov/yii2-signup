<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['signup/email-verification', 'token' => $user->verification_token]);
?>
Здравствуйте, <?= $user->username ?>!

Перейдите по ссылке, чтобы подтвердить ваш e-mail:

<?= $verifyLink ?>

<?php

/* @var $this View */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Восстановление пароля';

$lk_link = '//lk.' . Yii::$app->params['siteHost'];
?>

<section class="section">
    <div class="container">
        <h2 class="section-title"><?= Html::encode($this->title) ?></h2>
        <p>Пароль успешно изменен. Теперь вы можете авторизоваться с новым паролем
            в <a href="<?= $lk_link ?>" target="_blank">личном кабинете</a>.</p>
    </div>
</section>
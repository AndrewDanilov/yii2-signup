<?php

/* @var $this View */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Успешная регистрация';

$lk_link = '//lk.' . Yii::$app->params['siteHost'];
?>

<section class="section">
    <div class="container">
        <h2 class="section-title"><?= Html::encode($this->title) ?></h2>
        <p>Ваш e-mail успешно подтвержден! Теперь вы можете войти в
            <a href="<?= $lk_link ?>" target="_blank">личный кабинет</a> под своим логином или e-mail'ом.</p>
    </div>
</section>
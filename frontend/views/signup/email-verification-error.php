<?php

/* @var $this View */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Ошибка верификации';
?>

<section class="section">
    <div class="container">
        <h2 class="section-title"><?= Html::encode($this->title) ?></h2>
        <p>Мы не можем подтвердить ваш e-mail. Возможно вы использовали некорректную или
            устаревшую ссылку для подтверждения.</p>
    </div>
</section>
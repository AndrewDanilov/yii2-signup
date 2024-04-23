<?php

/* @var $this View */
/* @var $model \frontend\models\EmailVerificationForm */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Ошибка верификации';
?>

<section class="section">
    <div class="container">
        <h2 class="section-title"><?= Html::encode($this->title) ?></h2>
        <?php if ($model->hasErrors()) { ?>
            <div class="form-errors">
                <?= '<p>' . implode('</p><p>', $model->firstErrors) . '</p>'; ?>
            </div>
        <?php } ?>
        <p>Возможно вы использовали некорректную или устаревшую ссылку для подтверждения.</p>
    </div>
</section>
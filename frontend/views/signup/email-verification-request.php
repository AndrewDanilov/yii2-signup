<?php

/** @var yii\web\View$this  */
/** @var \frontend\models\EmailVerificationRequestForm $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Повторная отправка подтверждения';
?>
<section class="section">
    <div class="container">
        <h2 class="section-title"><?= Html::encode($this->title) ?></h2>
        <p>Пожалуйста, укажите ваш e-mail. На него будет выслано письмо со ссылкой для подтверждения аккаунта.</p>
        <div class="form-wrapper">
            <?php if ($model->hasErrors()) { ?>
                <div class="form-errors">
                    <?= '<p>' . implode('</p><p>', $model->firstErrors) . '</p>'; ?>
                </div>
            <?php } ?>
            <form action="<?= Url::to(['signup/email-verification-request']) ?>" method="post">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                <div class="input-wrapper">
                    <input type="text" id="input1" name="email" required>
                    <label for="input1">E-mail *</label>
                </div>
                <div class="button-wrapper">
                    <button>Отправить</button>
                </div>
            </form>
        </div>
    </div>
</section>
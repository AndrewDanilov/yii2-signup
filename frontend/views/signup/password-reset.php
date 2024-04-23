<?php

/** @var yii\web\View $this */
/** @var \frontend\models\PasswordResetForm $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Восстановление пароля';
?>
<section class="section">
    <div class="container">
        <h2 class="section-title h1"><?= Html::encode($this->title) ?></h2>
        <p>Пожалуйста, выберите новый пароль</p>
        <div class="form-wrapper">
            <?php if ($model->hasErrors()) { ?>
                <div class="form-errors">
                    <?= '<p>' . implode('</p><p>', $model->firstErrors) . '</p>'; ?>
                </div>
            <?php } ?>
            <form action="<?= Url::to(['signup/password-reset', 'token' => $model->token]) ?>" method="post">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                <div class="input-wrapper">
                    <input type="password" id="input1" name="password" required>
                    <label for="input1">Новый пароль *</label>
                </div>
                <div class="button-wrapper">
                    <button>Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php

/** @var yii\web\View $this */
/** @var \frontend\models\SignupForm $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Регистрация';
?>
<section class="section">
    <div class="container">
        <h2 class="section-title h1"><?= Html::encode($this->title) ?></h2>
        <div class="form-wrapper">
            <?php if ($model->hasErrors()) { ?>
                <div class="form-errors">
                    <?= '<p>' . implode('</p><p>', $model->firstErrors) . '</p>'; ?>
                </div>
            <?php } ?>
            <form action="<?= Url::to(['signup/signup']) ?>" method="post">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                <div class="input-wrapper">
                    <input type="text" id="input1" name="username" value="<?= $model->username ?>" required>
                    <label for="input1">Логин *</label>
                </div>
                <div class="input-wrapper">
                    <input type="text" id="input2" name="email" value="<?= $model->email ?>" required>
                    <label for="input2">E-mail *</label>
                </div>
                <div class="input-wrapper">
                    <input type="password" id="input3" name="password" required>
                    <label for="input3">Пароль *</label>
                </div>
                <div class="input-wrapper">
                    <span class="policy-text">Отправляя форму, я принимаю <a href="#">условия</a> и <a href="#">политику конфеденциальности</a></span>
                </div>
                <div class="button-wrapper">
                    <button>Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php

/* @var $this View */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Восстановление пароля';
?>

<section class="section">
    <div class="container">
        <h2 class="section-title"><?= Html::encode($this->title) ?></h2>
        <p>Мы выслали на вашу электронную почту письмо, содержащее
            инструкцию для восстановления пароля.
            Если письмо не приходит, проверьте папку спам.</p>
    </div>
</section>
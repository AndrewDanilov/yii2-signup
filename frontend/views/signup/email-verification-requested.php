<?php

/* @var $this View */

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Подтвердите e-mail';
?>

<section class="section">
    <div class="container">
        <h2 class="section-title"><?= Html::encode($this->title) ?></h2>
        <p>Мы повторно выслали на вашу электронную
            почту письмо, содержащее ссылку для подтверждения и дальнейшие инструкции.
            Если письмо не приходит, проверьте папку спам.</p>
    </div>
</section>